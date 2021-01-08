<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function add_category(Request $request){
		
        $this->validate($request,[
            'cat_name'=>'required|min:2|max:50'
        ]);
        $strpos = strpos($request->photo,';');
        $sub = substr($request->photo,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->photo)->resize(200, 200);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);
       $category = New Category();
       $category->cat_name = $request->cat_name;
       $category->photo=$name;
       $category->save();
       return ['message'=>'OK'];
    }
    public function all_category(){
        $categories = Category::all();
        return response()->json([
            'categories'=>$categories
        ],200);
    }
    public function delete_category($id){
        $category = Category::find($id);
        $category->delete();
    }
    public function edit_category($id){
        $category = Category::find($id);
        return response()->json([
            'category'=>$category
        ],200);
    }
    public function update_category(Request $request,$id){
        $this->validate($request,[
            'cat_name'=>'required|min:2|max:50'
        ]);
        
        $category = Category::find($id);

        //img
        if($request->photo!=$category->photo){
            $strpos = strpos($request->photo,';');
            $sub = substr($request->photo,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path()."/uploadimage/";
            $image = $upload_path. $category->photo;
            $img->save($upload_path.$name);

            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $category->photo;
        }
        //
        $category->cat_name = $request->cat_name;
        $category->photo= $name;
        $category->save();
    }
    public function selected_category($ids){
       $all_id = explode(',',$ids);
       foreach ($all_id as $id){
           $category = Category::find($id);
           $category->delete();
       }
    }
}
