<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\PayloadFactory;
use Tymon\JWTAuth\JWTManager as JWT;   

class ContactsController extends Controller
{
    //
    public function getIDContactWith($user_id)
    {
        

        $u = Message::select(\DB::raw('`from` as user_id'))
        ->where('to', $user_id)
       
        ->groupBy('from')
        ->get();
        $u2 = Message::select(\DB::raw('`to` as user_id'))
        ->where('from', $user_id)
       
        ->groupBy('to')
        ->get();
        
       
        $arrID = array();
        for($i=0;$i<sizeof($u);$i++)
        {
            $arrID[$i]= $u[$i]->user_id;
        }
       
    for($j=0;$j< sizeof($u2);$j++)
    {
        if (in_array($u2[$j]->user_id, $arrID)==false)
        {
            $arrID[$i+$j]= $u2[$j]->user_id;

        }
    }
       return $arrID;
       
    }
    public function get()
    {
            //get user from token
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {

                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
     
        $arrID = $this->getIDContactWith($user->id);
       

                $contacts = User::whereIn('id',  $arrID  ) ->get();
   
      
        //  get a collection of items where sender_id is the user who sent us a message
        // and messages_count is the number of unread messages we have from him
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', $user->id)
            ->where('read', false)
            ->groupBy('from')
            ->get();

        // add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });
        return response()->json($contacts);
    }
    public function getMessagesFor($id)
    {
        $user = JWTAuth::parseToken()->authenticate();
         Message::where('from', $id)->where('to',$user->id)->update(['read'=>true,]);
        $messages = Message::where(function($q) use ($id) {
        $user = JWTAuth::parseToken()->authenticate();
            
            $q->where('from', $user->id);
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $user = JWTAuth::parseToken()->authenticate();

            $q->where('from', $id);
            $q->where('to', $user->id);
        })
        ->get();
        return response()->json($messages);
    }
    public function send(Request $request)
    {
        // get user from JWT
           try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {

                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        //Save mes
        $message = Message::create([
            'from' => $user->id,

            'to' => $request ->contact_id,
            'text' => $request->text,
        ]);
        broadcast(new NewMessage($message));
        return response()->json($message);
     
    }

}
