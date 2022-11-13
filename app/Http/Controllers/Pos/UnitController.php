<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Carbon;
use Auth;

class UnitController extends Controller
{
    public function UnitAll(){
        $units = Unit::latest()->get();
        return view('backend.unit.unit_all',compact('units'));
    }
    public function UnitAdd(){
        return view('backend.unit.unit_add');
    }
    public function UnitStore(Request $request){
        Unit::insert([
            'name'=>$request->name,
            'created_by' =>Auth::user()->id,
            'created_at' =>Carbon::now(),
        ]);
        $notification = [
            'message'=>'Unit Added successfully',
            'alert-type'=>'success'
        ];
        return redirect()->route('unit.all')->with($notification);
    }
    public function UnitEdit($id){
        $units = Unit::findOrFail($id);
        return view('backend.unit.unit_edit',compact('units'));
    }
    public function UnitUpdate(Request $request){

        $units_id = $request->id;

        Unit::findOrFail($units_id)->update([
            'name'=>$request->name,
            'updated_by' =>Auth::user()->id,
            'updated_at' =>Carbon::now(),
        ]);
        $notification = [
            'message'=>'Unit Updated successfully',
            'alert-type'=>'success'
        ];
        return redirect()->route('unit.all')->with($notification);
    }
    public function UnitDelete($id){
        Unit::findOrFail($id)->delete();
        $notification =[
            'message'=>'Unit Deleted successfully',
            'alert-type'=>'success'
        ];
        return redirect()->route('unit.all')->with($notification);

    }
}
