<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{
    public function socialSetting(){
        $social = DB::table('socials')->first();
        return view('backend.setting.social', compact('social'));
    }

    public function updateSocial(Request $request, $id){
        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['linkedin'] = $request->linkedin;
        $data['instagram'] = $request->instagram;
        DB::table('socials')->where('id', $id)->update($data);
        $notification=array(
            'message'=>'Socials Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function seoSetting(){
        $seo = DB::table('seos')->first();
        return view('backend.setting.seo', compact('seo'));
    }

    public function updateSeo(Request $request, $id){
        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_verification'] = $request->google_verification;
        $data['google_analytics'] = $request->google_analytics;
        $data['alexa_analytics'] = $request->alexa_analytics;

        DB::table('seos')->where('id', $id)->update($data);
        $notification=array(
            'message'=>'Seos Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function livetvSetting(){
        $livetv = DB::table('livetvs')->first();
        return view('backend.setting.livetv', compact('livetv'));
    }

    public function updateLivetv(Request $request, $id){
        $data = array();
        $data['embed_code'] = $request->embed_code;

        DB::table('livetvs')->where('id', $id)->update($data);
        $notification=array(
            'message'=>'Livetvs Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function activeLivetv(Request $request, $id){
        $data = array();
        $data['status'] = 1;

        DB::table('livetvs')->where('id', $id)->update($data);
        $notification=array(
            'message'=>'Livetvs Active Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function inactiveLivetv(Request $request, $id){
        $data = array();
        $data['status'] = 0;

        DB::table('livetvs')->where('id', $id)->update($data);
        $notification=array(
            'message'=>'Livetvs DeActive Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function noticeSetting(){
        $notice = DB::table('notices')->first();
        return view('backend.setting.notice', compact('notice'));
    }

    public function updateNotice(Request $request, $id){
        $data = array();
        $data['notice'] = $request->notice;

        DB::table('notices')->where('id', $id)->update($data);
        $notification=array(
            'message'=>'Notice Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function activeNotice(Request $request, $id){
        $data = array();
        $data['status'] = 1;

        DB::table('notices')->where('id', $id)->update($data);
        $notification=array(
            'message'=>'Notice Active Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function inactiveNotice(Request $request, $id){
        $data = array();
        $data['status'] = 0;

        DB::table('notices')->where('id', $id)->update($data);
        $notification=array(
            'message'=>'Notice DeActive Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
