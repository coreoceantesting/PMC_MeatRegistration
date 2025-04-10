<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Taluka_Master;
use App\Models\District_Master;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TalukaMasterController extends Controller
{
    public function index()
    {
        $taluka_list =  DB::table('mst_taluka AS t1')
                                ->select('t1.*', 't2.dist_name')
                                ->Join('mst_dist AS t2', 't2.id', '=', 't1.dist_id')

                                ->whereNull('t1.deleted_at')
                                ->whereNull('t2.deleted_at')
                                ->orderBy('t1.id', 'DESC')
                                ->get();

        // return $taluka_list;

        return view('admin.taluka.grid',compact('taluka_list'));
    }


    public function create()
    {
        $district_master = District_Master::orderBy('id','desc')->pluck('dist_name', 'id')->whereNull('deleted_at');
        // return $depatment_list;

        return view('admin.taluka.create',compact('district_master'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
          'dist_id' => 'required',
          'taluka_name' => 'required',

         ],[
          'dist_id.required' => 'District Name is required',
          'taluka_name.required' => 'Taluka Name is required',

          ]);

        $data = new Taluka_Master();

        $data->dist_id = $request->get('dist_id');
        $data->taluka_name = $request->get('taluka_name');

        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        return redirect()->route('taluka_master.index')->with('message','Your Record Added Successfully.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = Taluka_Master::find($id);
        $district_master = District_Master::orderBy('id','desc')->pluck('dist_name', 'id')->whereNull('deleted_at');

        return view('admin.taluka.edit',compact('data','district_master'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'dist_id' => 'required',
            'taluka_name' => 'required',

           ],[
            'dist_id.required' => 'District Name is required',
            'taluka_name.required' => 'Taluka Name is required',

            ]);

        $data = Taluka_Master::find($id);

        $data->dist_id = $request->get('dist_id');
        $data->taluka_name = $request->get('taluka_name');

        $data->modify_dt = date("Y-m-d H:i:s");
        $data->modify_by = Auth::user()->id;
        $data->save();

        return redirect()->route('taluka_master.index')->with('message','Your Record Updated Successfully.');
    }


    public function destroy($id)
    {
        $data = Taluka_Master::findOrFail($id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect()->route('taluka_master.index')->with('message','Your Record Deleted Successfully.');
    }
}
