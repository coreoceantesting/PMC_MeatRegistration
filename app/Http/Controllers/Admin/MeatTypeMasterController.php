<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeatType_Master;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MeatTypeMasterController extends Controller
{
    public function index()
    {
        $meattype_mst =  DB::table('meat_type_mst AS t1')
                                ->select('t1.id as meat_id', 't1.meat_name as meat_type')
                                ->whereNull('t1.deleted_at')
                                ->orderBy('t1.id', 'DESC')
                                ->get();

        // return $meattype_mst;

        return view('admin.meat_type.grid',compact('meattype_mst'));
    }


    public function create()
    {
        return view('admin.meat_type.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
          'meat_name' => 'required',

         ],[
          'meat_name.required' => 'Meat Name is required',

          ]);

        $data = new MeatType_Master();
        
        $data->meat_name = $request->get('meat_name');
        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        return redirect('/meat_type_master')->with('message','Your Record Added Successfully.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = MeatType_Master::find($id);

        return view('admin.meat_type.edit',compact('data'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'meat_name' => 'required',

         ],[
          'meat_name.required' => 'Meat Name is required',

          ]);

        $data = MeatType_Master::find($id);

        $data->meat_name = $request->get('meat_name');
        $data->modified_dt = date("Y-m-d H:i:s");
        $data->modified_by = Auth::user()->id;
        $data->save();

        return redirect('/meat_type_master')->with('message','Your Record Updated Successfully.');
    }


    public function destroy($id)
    {
        $data = MeatType_Master::findOrFail($id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect('/meat_type_master')->with('message','Your Record Deleted Successfully.');
    }
}
