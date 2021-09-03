<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class GalleryController extends Controller
{
    public function photoGallery(){
        $photo = DB::table('photos')->orderBy('id', 'desc')->paginate(5);
        return view('backend.gallery.photo', compact('photo'));
    }

    public function addPhoto(Request $request){
        $validateData = $request->validate([
            'title' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png'
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $photo = $request->photo;
        if($photo){
            $photo_name = uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(500,300)->save('image/photogallery/'.$photo_name);
            $data['photo'] = 'image/photogallery/'.$photo_name;
            DB::table('photos')->insert($data);
            $notification=array(
                'message'=>'Photo Inserted Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        } else{
            return Redirect()->back();
        }        
    }

    public function editPhoto($id) {
        $photo = DB::table('photos')->where('id', $id)->first();
        return view('backend.gallery.edit_photo', compact('photo'));
    }

    public function updatePhoto(Request $request, $id) {
        $validateData = $request->validate([
            'title' => 'required',
            'photo' => 'mimes:jpg,jpeg,png'
        ]);
        $old_photo = $request->old_photo;
        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $photo = $request->photo;
        if($photo){
            unlink($old_photo);
            $photo_name = uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(500,300)->save('image/photogallery/'.$photo_name);
            $data['photo'] = 'image/photogallery/'.$photo_name;
            DB::table('photos')->where('id', $id)->update($data);
            $notification=array(
                'message'=>'Photo Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('photo.gallery')->with($notification);
        } else{
            DB::table('photos')->where('id', $id)->update($data);
            $notification=array(
                'message'=>'Photo Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('photo.gallery')->with($notification);
        }
    }

    public function deletePhoto($id) {
        $photo = DB::table('photos')->where('id', $id)->first();
        unlink($photo->photo);
        DB::table('photos')->where('id', $id)->delete();
        $notification=array(
            'message'=>'Photo Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function videoGallery(){
        $video = DB::table('videos')->orderBy('id', 'desc')->paginate(5);
        return view('backend.gallery.video', compact('video'));
    }

    public function addVideo(Request $request){
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'embed_code' => 'required|max:255'
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;
               
        DB::table('videos')->insert($data);
        $notification=array(
            'message'=>'Video Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function editVideo($id) {
        $video = DB::table('videos')->where('id', $id)->first();
        return view('backend.gallery.edit_video', compact('video'));
    }

    public function updateVideo(Request $request, $id) {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'embed_code' => 'required|max:255'
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;
               
        DB::table('videos')->where('id', $id)->update($data);
        $notification=array(
            'message'=>'Video Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('video.gallery')->with($notification);
    }

    public function deleteVideo($id) {
        DB::table('videos')->where('id', $id)->delete();
        $notification=array(
            'message'=>'Video Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
