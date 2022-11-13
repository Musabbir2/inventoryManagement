<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Auth;

class CategoryController extends Controller
{
    public function CategoryAll(){
        $categories = Category::latest()->get();
        return view('backend.category.category_all',compact('categories'));
    }
    public function CategoryAdd(){
        return view ('backend.category.category_add');
    }
    public function CategoryStore(Request $request){
        Category::insert([
            'name' => $request->name,
            'created_by' =>Auth::user()->id,
            'created_at' =>Carbon::now(),
        ]);
        $notification = [
            'message'=>'Category Added successfully',
            'alert-type'=>'success'
        ];
        return redirect()->route('Category.all')->with($notification);
    }
    public function CategoryEdit($id){
        $categories=Category::findOrFail($id);
        return view('backend.category.category_edit',compact('categories'));

    }
    public function CategoryUpdate(Request $request){
        $categories_id = $request->id;
        Category::findOrFail($categories_id)->update([
            'name'=>$request->name,
            'updated_by' =>Auth::user()->id,
            'updated_at' =>Carbon::now(),
        ]);
        $notification=[
            'message'=>'category Updated successfully',
            'alert-type'=>'success'
        ];
        return redirect()->route('Category.all')->with($notification);
    }
    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();
        $notification=[
            'message'=>'category Deleted successfully',
            'alert-type'=>'success'
        ];
        return redirect()->route('Category.all')->with($notification);

    }
}
