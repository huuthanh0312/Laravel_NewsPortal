<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function index(){
        $category = DB::table('categories')->orderBy('id', 'desc')->paginate(5);
        return view('backend.category.index', compact('category'));
    }

    public function storeCategory(Request $request){
        $validated = $request->validate([
            'category_en' => 'required|unique:categories|max:255',
            'category_vi' => 'required|unique:categories|max:255',
        ]);
        $data = array();
        $data['category_en'] = $request->category_en;
        $data['category_vi'] = $request->category_vi;
        DB::table('categories')->insert($data);
        $notification=array(
            'message'=>'Category Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function editCategory($id){
        $category = DB::table('categories')->where('id', $id)->first();
        return view('backend.category.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id){
        $validated = $request->validate([
            'category_en' => 'required|unique:categories|max:255',
            'category_vi' => 'required|unique:categories|max:255',
        ]);
        $data = array();
        $data['category_en'] = $request->category_en;
        $data['category_vi'] = $request->category_vi;
        DB::table('categories')->where('id', $id )->update($data);
        $notification=array(
            'message'=>'Category Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.categories')->with($notification);

    }
    public function deleteCategory($id){
        $category = DB::table('categories')->where('id', $id)->delete();
        $notification=array(
            'message'=>'Category Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
}
