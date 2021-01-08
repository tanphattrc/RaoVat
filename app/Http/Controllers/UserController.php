<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Image;
use Illuminate\Http\Response;
//use JWTAuth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\PayloadFactory;
use Tymon\JWTAuth\JWTManager as JWT;    
use App\Role;
class UserController extends Controller
{

            public function getCountSex()
            {
                $countSex = User::select(\DB::raw('count(*) as count_sex'))
        
                // ->where('city_id', 1)
                ->groupBy('sex')
                ->get();
                $arrCount_Sex = array();
                for($i=0;$i<sizeof($countSex);$i++)
                {
                    $arrCount_Sex[$i]= $countSex[$i]->count_sex;
                }
                return $arrCount_Sex;
            }
    public function index(){
        
        $users= User::orderBy('id','ASC')->paginate(10);
       
        return response()->json($users);    
        
    }
    public function getRoleUser($id)
    {
        $results = DB::select('select * from role_user where (role_id = :role_id && user_id= :user_id)', ['role_id' => 3,'user_id'=> $id]);
        return response()->json($results);
    }
    public function  getUserVip(){
        
       
        
        $results = DB::select('select user_id from role_user where (role_id = :role_id )', ['role_id' => 4,]);
        $arrID = array();
        for($i=0;$i<sizeof($results);$i++)
        {
            $arrID[$i]= $results[$i]->user_id;
        }
        $users= User::whereIn('id',  $arrID )
                        ->orWhere('isVip','Đang xử lý') ->paginate(10);
        return response()->json($users);
        
    }
    public function delete_user($id){
        
        $user= User::find($id);
        $user->delete();
    }
    public function deleteRoleVip($id)
    {
        $user= User::find($id);
        $role_member = Role::where('name', 'member')->first();
        $role_memberVip = Role::where('name', 'memberVip')->first();
        $user->roles()->detach( $role_memberVip);
        $user->roles()->attach($role_member);
    }
    public function RequestUpdateVip(Request $request)
    {
        $user= User::find($request->id);
        $user->isVip='Đang xử lý';
        $user->save();
    }
    public function update_RoleVip($id)
    {
        $user= User::find($id);
        $role_memberVip = Role::where('name', 'memberVip')->first();
        $user->isVip='Vip';
        
        $user->roles()->attach($role_memberVip);
        $user->save();

    }
    public function edit_user($id){
      
        $user = User::find($id);
      
        return response()->json([
            'user'=> $user
        ],200);
    }

    public function update_user(Request $request,$id){
      
        $this->validate($request,[
            'name'=>'required|min:2|max:50'
        ]);
    //     $validator = Validator::make($request->all(),
    //     [
    //         'name'=>'required|min:2|max:50'

    //     ]);
    //     if($validator->fails()){
    //         return response()->json($validator->errors()->toJson(), 400);
    // }
    $user = User::find($id);

    if($request->photo!=$user->photo){
        $strpos = strpos($request->photo,';');
        $sub = substr($request->photo,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->photo)->resize(200, 200);
        $upload_path = public_path()."/uploadimage/";
        $image = $upload_path. $user->photo;
        $img->save($upload_path.$name);

        if(file_exists($image)){
            @unlink($image);
        }
    }else{
        $name = $user->photo;
    }
        $user->name= $request->name;
        // $user->email= $request->email;
        $user->phone = $request->phone;
        $user->sex = $request->sex;
        $user->address= $request->address;
        $user->photo = $name;
    
            $user->save();
      
    }
    public function register(Request $request)
    {
      
            $validator = Validator::make($request->json()->all() , [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->json()->get('name'),
            'email' => $request->json()->get('email'),
            'password' => Hash::make($request->json()->get('password')),
            // 'phone' => $request->json() ->get('phone'),
        ]);
      

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }

    public function login(Request $request)
    {
        $credentials = $request->json()->all();

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Thông tin không hợp lệ.Vui lòng kiểm tra lại tài khoản và mật khẩu'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $user = DB::select('select * from users where email = :email', ['email' => $request->json()->get('email')]);
        // $name = $user->email;
        $user=$user[0]; 
        return response()->json( compact('token','user') );
    }



    public function getAuthenticatedUser()
    {
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
        return response()->json(compact('user'));
   

    }
  
}
