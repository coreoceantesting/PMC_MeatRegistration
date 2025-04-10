<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department_Master;
use App\Models\Ward_Master;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DepartmentMasterController extends Controller
{
    public function index()
    {
        $department_mst =  DB::table('department_mst AS t1')
                                ->select('t1.*', 't2.ward_name')
                                ->leftJoin('ward_mst AS t2', 't2.id', '=', 't1.ward_id')

                                ->whereNull('t1.deleted_at')
                                ->whereNull('t2.deleted_at')
                                ->orderBy('t1.id', 'DESC')
                                ->get();

        // return $department_mst;

        return view('admin.department.grid',compact('department_mst'));
    }


    public function create()
    {
        $ward_mst = Ward_Master::orderBy('id','desc')->pluck('ward_name', 'id')->whereNull('deleted_at');
        // return $depatment_list;

        return view('admin.department.create',compact('ward_mst'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
          'ward_id' => 'required',
          'dept_name' => 'required',

         ],[
          'ward_id.required' => 'Ward Name is required',
          'dept_name.required' => 'Department Name is required',

          ]);

        $data = new Department_Master();

        $data->ward_id = $request->get('ward_id');
        $data->dept_name = $request->get('dept_name');

        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        return redirect()->route('department_master.index')->with('message','Your Record Added Successfully.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = Department_Master::find($id);
        $ward_mst = Ward_Master::orderBy('id','desc')->pluck('ward_name', 'id')->whereNull('deleted_at');

        return view('admin.department.edit',compact('data','ward_mst'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'ward_id' => 'required',
          'dept_name' => 'required',

         ],[
          'ward_id.required' => 'Ward Name is required',
          'dept_name.required' => 'Department Name is required',

          ]);

        $data = Department_Master::find($id);

        $data->ward_id = $request->get('ward_id');
        $data->dept_name = $request->get('dept_name');

        $data->modified_dt = date("Y-m-d H:i:s");
        $data->modified_by = Auth::user()->id;
        $data->save();

        return redirect()->route('department_master.index')->with('message','Your Record Updated Successfully.');
    }


    public function destroy($id)
    {
        $data = Department_Master::findOrFail($id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect()->route('department_master.index')->with('message','Your Record Deleted Successfully.');
    }
}
