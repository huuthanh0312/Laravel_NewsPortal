<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SubDistrictController extends Controller
{
    public function index(){
        $subdistrict = DB::table('subdistricts')
                        ->join('districts', 'subdistricts.district_id', 'districts.id')
                        ->select('subdistricts.*', 'districts.district_en', 'districts.district_vi')
                        ->orderBy('id', 'desc')->paginate(10);
        $district = DB::table('districts')->get();
        return view('backend.subdistrict.index', compact('subdistrict','district'));
    }

    public function storeSubDistrict(Request $request){
        $validated = $request->validate([
            'subdistrict_en' => 'required|unique:subdistricts|max:255',
            'subdistrict_vi' => 'required|unique:subdistricts|max:255',
        ]);
        $data = array();
        $data['district_id'] = $request->district_id;
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_vi'] = $request->subdistrict_vi;
        DB::table('subdistricts')->insert($data);
        $notification=array(
            'message'=>'SubDistrict Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function editSubDistrict($id){
        $district = DB::table('districts')->get();
        $subdistrict = DB::table('subdistricts')->where('id', $id)->first();
        return view('backend.subdistrict.edit', compact('subdistrict', 'district'));
    }

    public function updateSubDistrict(Request $request, $id){
        $validated = $request->validate([
            'subdistrict_en' => 'required|max:255',
            'subdistrict_vi' => 'required|max:255',
        ]);
        $data = array();
        $data['district_id'] = $request->district_id;
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_vi'] = $request->subdistrict_vi;
        DB::table('subdistricts')->where('id', $id )->update($data);
        $notification=array(
            'message'=>'SubDistrict Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.subdistricts')->with($notification);

    }
    public function deleteSubDistrict($id){
        $category = DB::table('subdistricts')->where('id', $id)->delete();
        $notification=array(
            'message'=>'SubDistrict Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
}
