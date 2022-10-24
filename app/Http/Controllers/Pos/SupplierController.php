<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Carbon;
use Auth;

class SupplierController extends Controller
{
    public function SupplierAll(){
        //$suppliers = Supplier::all();
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.supplier-all',compact('suppliers'));

    }
    public function SupplierAdd(){
        return view('backend.supplier.supplier_add');
    }
    public function SupplierStore(Request $request){
        Supplier::insert([
           'name' =>$request->name,
           'mobile_no' =>$request->mobile_no,
           'email' =>$request->email,
           'address' =>$request->address,
            'created_by' =>Auth::user()->id,
            'created_at' =>Carbon::now(),
        ]);
        $notification = [
            'message'=>'Supplier Added successfully',
            'alert-type'=>'success'
        ];
        return redirect()->route('supplier.all')->with($notification);
    }
    public function SupplierEdit($id){
        $suppliers = Supplier::findOrFail($id);
        return view('backend.supplier.supplier_edit',compact('suppliers'));
    }
    public function SupplierUpdate(Request $request){
        $supplier_id = $request->id;

        Supplier::findOrFail($supplier_id)->update([
            'name' =>$request->name,
            'mobile_no' =>$request->mobile_no,
            'email' =>$request->email,
            'address' =>$request->address,
            'updated_by' =>Auth::user()->id,
            'updated_at' =>Carbon::now(),
        ]);
        $notification = [
            'message'=>'Supplier Updated successfully',
            'alert-type'=>'success'
        ];
        return redirect()->route('supplier.all')->with($notification);
    }
    public function SupplierDelete($id){
        Supplier::findOrFail($id)->delete();
        $notification = [
            'message'=> 'Supplier Delete Successfully',
            'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);

    }

}

