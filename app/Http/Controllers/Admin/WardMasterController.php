<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ward_Master;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WardMasterController extends Controller
{
    public function index()
    {
        $ward_mst = Ward_Master::orderBy('id', 'DESC')->whereNull('deleted_at')->get();
        // dd($ward_mst);

        return view('admin.ward.grid',compact('ward_mst'));
    }


    public function create()
    {
        return view('admin.ward.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
          'ward_name' => 'required',

         ],[
          'ward_name.required' => 'Ward Name is required',

          ]);

        $data = new Ward_Master();

        $data->ward_name = $request->get('ward_name');

        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        return redirect()->route('ward_master.index')->with('message','Your Record Added Successfully.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = Ward_Master::find($id);

        return view('admin.ward.edit',compact('data'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'ward_name' => 'required',

         ],[
          'ward_name.required' => 'Ward Name is required',

          ]);

        $data = Ward_Master::find($id);

        $data->ward_name = $request->get('ward_name');

        $data->modified_dt = date("Y-m-d H:i:s");
        $data->modified_by = Auth::user()->id;
        $data->save();


      return redirect()->route('ward_master.index')->with('message','Your Record Updated Successfully.');
    }


    public function destroy($id)
    {
        $data = Ward_Master::findOrFail($id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect()->route('ward_master.index')->with('message','Your Record Deleted Successfully.');
    }
}
