<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Post;
use Tymon\JWTAuth\Facades\JWTAuth;
 
class RatingController extends Controller
{
    //
    public function saveRating(Request $request, $id)
    {
        $user = JWTAuth::parseToken()->authenticate();

      $rating=  Rating::create([
            'ra_post_id'=>$id,
            'ra_number'=> $request->number,
            'ra_content' => $request->r_content,
            'ra_user_id' => $user->id,
        ]);
        $post= Post::find($id);
        $post->post_total_number += $request->number;
        $post->post_total_rating +=1;
        $post->save();


        return response()->json([$rating]);

    }
}
