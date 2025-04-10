<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_Master;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserMasterController extends Controller
{
    public function index()
    {
        $user_mst = User_Master::orderBy('id', 'DESC')->whereNull('deleted_at')->get();
        // dd($ward_mst);

        return view('admin.user.grid',compact('user_mst'));
    }


    public function create()
    {
        return view('admin.user.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
          // 'f_name' => 'required',

           'name' => 'required',
           'm_name' => 'required',
           'l_name' => 'required',
          // 'mobile_number' => 'required',
          // 'email' => 'required',
          'user_type' => 'required',

         ],[
           'name.required' => 'First Name is required',
           'm_name.required' => 'Middle Name is required',
           'l_name.required' => 'Last Name is required',
          // 'mobile_number.required' => 'Mobile Number is required',
          // 'email.required' => 'Email is required',
          'user_type.required' => 'User Type is required',

          ]);

        $data = new User_Master();
        $data->name = $request->get('name');
       
        $data->m_name = $request->get('m_name');
        $data->l_name = $request->get('l_name');
        $data->mobile_number = $request->get('mobile_number');
        $data->email = $request->get('email');
        $data->password = Hash::make($request->get('password'));
        $data->user_type = $request->get('user_type');

        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        return redirect()->route('user_master.index')->with('message','Your Record Added Successfully.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = User_Master::find($id);

        return view('admin.user.edit',compact('data'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
          // 'ward_name' => 'required',

         ],[
          // 'ward_name.required' => 'Ward Name is required',

          ]);

        $data = User_Master::find($id);

         $data->name = $request->get('name');
      
        $data->m_name = $request->get('m_name');
        $data->l_name = $request->get('l_name');
        $data->mobile_number = $request->get('mobile_number');
        $data->email = $request->get('email');
        // $data->password = Hash::make($request->get('password'));
        $data->user_type = $request->get('user_type');

        $data->modified_dt = date("Y-m-d H:i:s");
        $data->modified_by = Auth::user()->id;
        $data->save();


      return redirect()->route('user_master.index')->with('message','Your Record Updated Successfully.');
    }


    public function destroy($id)
    {
        $data = User_Master::findOrFail($id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect()->route('user_master.index')->with('message','Your Record Deleted Successfully.');
    }
}
