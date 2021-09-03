<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DistrictController extends Controller
{
    public function index(){
        $district = DB::table('districts')->orderBy('id', 'desc')->paginate(5);
        return view('backend.district.index', compact('district'));
    }

    public function storeDistrict(Request $request){
        $validated = $request->validate([
            'district_en' => 'required|unique:districts|max:255',
            'district_vi' => 'required|unique:districts|max:255',
        ]);
        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_vi'] = $request->district_vi;
        DB::table('districts')->insert($data);
        $notification=array(
            'message'=>'District Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function editDistrict($id){
        $district = DB::table('districts')->where('id', $id)->first();
        return view('backend.district.edit', compact('district'));
    }

    public function updateDistrict(Request $request, $id){
        $validated = $request->validate([
            'district_en' => 'required|max:255',
            'district_vi' => 'required|max:255',
        ]);
        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_vi'] = $request->district_vi;
        DB::table('districts')->where('id', $id )->update($data);
        $notification=array(
            'message'=>'District Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.districts')->with($notification);

    }
    public function deleteDistrict($id){
        $category = DB::table('districts')->where('id', $id)->delete();
        $notification=array(
            'message'=>'District Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
}
