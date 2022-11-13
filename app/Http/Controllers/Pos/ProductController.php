<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Auth;

class ProductController extends Controller
{
    public function ProductAll(){
        $products = Product::latest()->get();
        return view('backend.product.product_all',compact('products'));
    }

    public function ProductAdd(){
        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        return view('backend.product.product_add',compact('supplier','category','unit'));

    }

    public function ProductStore(Request $request){
        Product::insert([

            'name'=>$request->name,
            'supplier_id'=>$request->supplier_id,
            'unit_id'=>$request->unit_id,
            'category_id'=>$request->category_id,
            'quantity'=>'0',
            'created_by'=>Auth::user()->id,
            'created_at'=>Carbon::now(),

        ]);
        $notification = [
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('product.all')->with($notification);
    }

    public function ProductEdit($id){
        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        $product = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('product','category','unit','supplier'));
    }

    public function ProductUpdate(Request $request){
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'name'=>$request->name,
            'supplier_id'=>$request->supplier_id,
            'unit_id'=>$request->unit_id,
            'category_id'=>$request->category_id,
            'updated_by'=>Auth::user()->id,
            'updated_at'=>Carbon::now(),

        ]);
        $notification = [
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('product.all')->with($notification);
    }

    public function ProductDelete($id)
    {
        Product::findOrFail($id)->delete();
        $notification = [
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('product.all')->with($notification);
    }
}
