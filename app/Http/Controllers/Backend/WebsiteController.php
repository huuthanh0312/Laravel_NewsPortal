<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class WebsiteController extends Controller
{
    public function index(){
        $website = DB::table('websites')->orderBy('id', 'desc')->paginate(5);
        return view('backend.website.index', compact('website'));
    }

    public function storeWebsite(Request $request){
        $validated = $request->validate([
            'website_name' => 'required',
            'website_link' => 'required',
        ]);
        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        DB::table('websites')->insert($data);
        $notification=array(
            'message'=>'Website Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function editWebsite($id){
        $website = DB::table('websites')->where('id', $id)->first();
        return view('backend.website.edit', compact('website'));
    }

    public function updateWebsite(Request $request, $id){
        $validated = $request->validate([
            'website_name' => 'required',
            'website_link' => 'required',
        ]);
        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        DB::table('websites')->where('id', $id )->update($data);
        $notification=array(
            'message'=>'Website Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.website')->with($notification);

    }
    public function deleteWebsite($id){
        $category = DB::table('websites')->where('id', $id)->delete();
        $notification=array(
            'message'=>'Website Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
}
