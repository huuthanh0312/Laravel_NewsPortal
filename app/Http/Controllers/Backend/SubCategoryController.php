<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SubCategoryController extends Controller
{
    public function index(){
        $subcategory = DB::table('subcategories')
                        ->join('categories', 'subcategories.category_id', 'categories.id')
                        ->select('subcategories.*', 'categories.category_en', 'categories.category_vi')
                        ->orderBy('id', 'desc')->paginate(10);
        $category = DB::table('categories')->get();
        return view('backend.subcategory.index', compact('subcategory','category'));
    }

    public function storeSubCategory(Request $request){
        $validated = $request->validate([
            'subcategory_en' => 'required|unique:subcategories|max:255',
            'subcategory_vi' => 'required|unique:subcategories|max:255',
        ]);
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_vi'] = $request->subcategory_vi;
        DB::table('subcategories')->insert($data);
        $notification=array(
            'message'=>'SubCategory Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function editSubCategory($id){
        $category = DB::table('categories')->get();
        $subcategory = DB::table('subcategories')->where('id', $id)->first();
        return view('backend.subcategory.edit', compact('subcategory', 'category'));
    }

    public function updateSubCategory(Request $request, $id){
        $validated = $request->validate([
            'subcategory_en' => 'required|max:255',
            'subcategory_vi' => 'required|max:255',
        ]);
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_vi'] = $request->subcategory_vi;
        DB::table('subcategories')->where('id', $id )->update($data);
        $notification=array(
            'message'=>'SubCategory Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.subcategories')->with($notification);

    }
    public function deleteSubCategory($id){
        $category = DB::table('subcategories')->where('id', $id)->delete();
        $notification=array(
            'message'=>'SubCategory Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
}


