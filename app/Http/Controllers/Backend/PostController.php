<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Auth;
use Image;

class PostController extends Controller
{
    public function index() {
        $post = DB::table('posts')
                ->join('categories', 'posts.category_id', 'categories.id')
                ->join('districts', 'posts.district_id', 'districts.id')
                ->select('posts.*', 'categories.category_en', 'districts.district_en')
                ->orderBy('id', 'desc')->paginate(10);
        return view('backend.post.index', compact('post'));
    }
    public function createPost(){
        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();
        return view('backend.post.create', compact('category', 'district'));
    }

    public function getSubCategory($id) {
        $subcategory = DB::table('subcategories')->where('category_id', $id)->get();
        return Response()->json($subcategory);
    }
    
    public function getSubDistrict($id) {
        $subdistrict = DB::table('subdistricts')->where('district_id', $id)->get();
        return Response()->json($subdistrict);
    }

    public function storePost(Request $request){
        $validateData = $request->validate([
            'category_id' => 'required',
            'district_id' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ]);
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['user_id'] = Auth::id();
        $data['title_en'] = $request->title_en;
        $data['title_vi'] = $request->title_vi;
        
        $data['details_en'] = $request->details_en;
        $data['details_vi'] = $request->details_vi;
        $data['tags_en'] = $request->tags_en;
        $data['tags_vi'] = $request->tags_vi;
        $data['headline'] = $request->headline;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date('F');

        $image = $request->image;
        if($image){
            $image_name = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('image/imgpost/'.$image_name);
            $data['image'] = 'image/imgpost/'.$image_name;
            DB::table('posts')->insert($data);
            $notification=array(
                'message'=>'Post Inserted Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('create.post')->with($notification);
        } else{
            return Redirect()->back();
        }
        
    }
    public function editPost($id) {
        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();
        $post = DB::table('posts')->where('id', $id)->first();
        return view('backend.post.edit', compact('post', 'category', 'district'));
        
    }
    public function updatePost(Request $request, $id){
        $validateData = $request->validate([
            'category_id' => 'required',
            'district_id' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ]);
        $old_image = $request->old_image;

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['user_id'] = Auth::id();
        $data['title_en'] = $request->title_en;
        $data['title_vi'] = $request->title_vi;
        
        $data['details_en'] = $request->details_en;
        $data['details_vi'] = $request->details_vi;
        $data['tags_en'] = $request->tags_en;
        $data['tags_vi'] = $request->tags_vi;
        $data['headline'] = $request->headline;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date('F');

        $image = $request->image;
        if($image){
            unlink($old_image);

            $image_name = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('image/imgpost/'.$image_name);
            $data['image'] = 'image/imgpost/'.$image_name;
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'message'=>'Post Inserted Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.post')->with($notification);
        } else{
            
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'message'=>'Post Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }        
    }
    public function deletePost($id) {
        $post = DB::table('posts')->where('id', $id)->first();
        $image = $post->image;
        unlink($image);
        DB::table('posts')->where('id', $id)->delete();
        $notification=array(
            'message'=>'Post Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.post')->with($notification);
    }
}
