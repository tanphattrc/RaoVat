<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use Illuminate\Http\Request;
use App\Post;
use App\Models\Rating;

class BlogController extends Controller
{
    public function test()
    {
        // $search='ba';
        // if ($search != null) {
        //     $posts = Post::with('category')
        //         ->where('title', 'LIKE', "%$search%")->where('state', true)
        //         ->orWhere('description', 'LIKE', "%$search%")->where('state', true)
        //         ->orderBy('price','asc')
        //         ->paginate(10);
        //     return response()->json($posts);
        // }
    }
    public function get_rating_blog_byID($id)
    {
        $ratings = Rating::with('user:id,name')->where('ra_post_id', $id)->orderBy('id', 'desc')->get();
        return response()->json($ratings);
    }

    public function  get_all_blog_post()
    {
        // $posts = Post::with('user','category')->orderBy('id','desc')->where('state',true)->get();
        // return response()->json([
        //     'posts'=>$posts
        // ],200);
        $posts = Post::with('user', 'category', 'city')->orderBy('id', 'desc')->where('state', true)->paginate(10);
        return response()->json($posts);
    }
    public function getpost_by_id($id)
    {
        $post = Post::with('user', 'category', 'city')->where('id', $id)->first();
        return response()->json([
            'post' => $post
        ], 200);
    }
    public function get_all_category()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ], 200);
    }
    public function get_all_city()
    {
        $cities = City::all();
        return response()->json([
            'cities' => $cities
        ], 200);
    }
    public function get_all_post_by_cat_id($id)
    {
        // $posts = Post::with('user','category')->where('cat_id',$id)->orderBy('id','desc')->where('state',true)->get();
        // return response()->json([
        //     'posts'=>$posts
        // ],200);
        $posts = Post::with('user', 'category', 'city')->where('cat_id', $id)->orderBy('id', 'desc')->where('state', true)->paginate(10);
        return response()->json($posts);
    }
 

    public function search_post($search)
    {


        if ($search != null) {
            $posts = Post::with('user', 'category', 'city')
                ->where('title', 'LIKE', "%$search%")->where('state', true)
                ->orWhere('description', 'LIKE', "%$search%")->where('state', true)
                ->paginate(10);
            return response()->json($posts);
        } else {
            return $this->get_all_blog_post();
        }
    }
    public function getpost_by_price($key)
    {
        if ($key == "Từ thấp tới cao") {
            $posts = Post::with('user', 'category', 'city')->orderBy('price', 'asc')->where('state', true)->paginate(10);
        } else {
            if ($key = "Từ cao xuống thấp") {
                $posts = Post::with('user', 'category')->orderBy('price', 'desc')->where('state', true)->paginate(10);
            }
        }


        return response()->json($posts);
    }
    public function getpost_by_date($key)
    {
        if ($key == "Tin mới trước") {
            $posts = Post::with('user', 'category', 'city')->orderBy('created_at', 'desc')->where('state', true)->paginate(10);
        } else {
            if ($key = "Tin cũ") {
                $posts = Post::with('user', 'category', 'city')->orderBy('created_at', 'asc')->where('state', true)->paginate(10);
            }
        }


        return response()->json($posts);
    }
    public function getpost_by_city($id)
    {
        $posts = Post::with('user', 'category', 'city')->where('city_id', $id)->orderBy('id', 'desc')->where('state', true)->paginate(10);
        return response()->json($posts);
    }
    public function latest_post()
    {
        $posts = Post::with('user', 'category')->orderBy('id', 'desc')->where('state', true)->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }
}
