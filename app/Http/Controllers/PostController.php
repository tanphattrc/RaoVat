<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;
//
use DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\PayloadFactory;
use Tymon\JWTAuth\JWTManager as JWT;    
//
use Image;
use SebastianBergmann\Environment\Console;

class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function getdataStatistics()
    {
            $count_user= User::select(\DB::raw('count(*) as count_user'))
            ->get();
            $count_post =  Post::select(\DB::raw('count(*) as count_post'))
            ->get();
            $count_cat = Category::select(\DB::raw('count(*) as count_cat'))
            ->get();
            $arrCount_data = array($count_user[0]->count_user,$count_post[0]->count_post,$count_cat[0]->count_cat);
            return $arrCount_data;
    }
    public function getCountPostByCat()
    {
        $countPostbyCat = Post::select(\DB::raw('count(*) as count_cat'))
        
        // ->where('city_id', 1)
        ->groupBy('cat_id')
        ->get();
        $arrCount_cat = array();
        for($i=0;$i<sizeof($countPostbyCat);$i++)
        {
            $arrCount_cat[$i]= $countPostbyCat[$i]->count_cat;
        }
        return $arrCount_cat;
    }
    public function PostByUser()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $posts = Post::with('category')->where('user_id',$user->id)->orderBy('id','desc')->paginate(10);
        return response()->json( $posts);
    }
    public function all_post(){
    //    $posts = Post::with('user','category')->orderBy('id','desc')->get();
    //    return response()->json([
    //        'posts'=>$posts
    //    ],200);
       $posts = Post::with('user','category','city')->orderBy('id','desc')->paginate(10);
        return response()->json( $posts);
    }
    public function save_post(Request $request){

        $this->validate($request,[
            'title'=>'required|min:2|max:50',
            'description'=>'required|min:2|max:1000',
            
        ]);
        //img
        if ($request->photo)
        {
            $strpos = strpos($request->photo,';');
            $sub = substr($request->photo,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path()."/uploadimage/";
            $img->save($upload_path.$name);
        }
        
        //
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->cat_id;
        $post->city_id= $request->city_id;
        $post->user_id = $request->user_id;
        $post->price = $request->price;
        if ($request->photo)
        {
            $post->photo = $name;

        }
        $results = DB::select('select * from role_user where (role_id = :role_id && user_id= :user_id)', ['role_id' => 4,'user_id'=> $request->user_id]);
        if ($results)
        {
            $post->state=true;
        }
        $post->save();
    }
    public function delete_post($id){
        $post = Post::find($id);
        $image_path = public_path()."/uploadimage/";
        $image = $image_path. $post->photo;
        if(file_exists($image)){
            @unlink($image);
        }
        $post->delete();
    }
    public function edit_post($id){
        $post = Post::find($id);
        return response()->json([
            'post'=>$post
        ],200);
    }
    public function accept_post($id){
        $post = Post::find($id);
        $post->state=true;
        $post->save();
        return response()->json([
            'message'=>'OK'
        ],200);
    }
    public function update_post(Request $request, $id){
        $post = Post::find($id);
        $this->validate($request,[
            'title'=>'required|min:2|max:50',
            'description'=>'required|min:2|max:1000'
        ]);


        if($request->photo!=$post->photo){
            $strpos = strpos($request->photo,';');
            $sub = substr($request->photo,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path()."/uploadimage/";
            $image = $upload_path. $post->photo;
            $img->save($upload_path.$name);

            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $post->photo;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->cat_id;
        $post->user_id = Auth::user()->id;
        $post->city_id= $request->city_id;
        $post->photo = $name;
        $post->price = $request->price;
        $post->save();
    }


}
