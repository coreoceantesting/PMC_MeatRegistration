<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District_Master;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DistrictMasterController extends Controller
{
    public function index()
    {
        $district = District_Master::orderBy('id', 'DESC')->whereNull('deleted_at')->get();
        // dd($district);

        return view('admin.district.grid',compact('district'));
    }


    public function create()
    {
        return view('admin.district.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
          'dist_name' => 'required',

         ],[
          'dist_name.required' => 'District Name is required',

          ]);

        $data = new District_Master();

        $data->dist_name = $request->get('dist_name');

        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        return redirect()->route('district_master.index')->with('message','Your Record Added Successfully.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = District_Master::find($id);

        return view('admin.district.edit',compact('data'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'dist_name' => 'required',

         ],[
          'dist_name.required' => 'District Name is required',
          ]);

        $data = District_Master::find($id);

        $data->dist_name = $request->get('dist_name');

        $data->modify_dt = date("Y-m-d H:i:s");
        $data->modify_by = Auth::user()->id;
        $data->save();


      return redirect()->route('district_master.index')->with('message','Your Record Updated Successfully.');
    }


    public function destroy($id)
    {
        $data = District_Master::findOrFail($id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect()->route('district_master.index')->with('message','Your Record Deleted Successfully.');
    }
}
