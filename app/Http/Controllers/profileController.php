<?php

namespace App\Http\Controllers;

use Image;
use App\Models\User;
use App\Models\Division;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function create(){
        $profiles = DB::table('users')->where('is_send_email', 1)->get(); 
        return view('dashboard.profile.create', compact('profiles'));
    }

    public function edit($id){
        $profiles = DB::table('users')->find($id);
        $department = Department::pluck('name','id');
        $division = Division::pluck('name','id');
        return view('dashboard.profile.edit', compact('profiles','department','division','designation'));
    }

    public function update(Request $request, $id){
        
        $this->validate(
            $request,
            [
              'designation' => 'required',
              'department' => 'required',
              'division' => 'required',
            ]
        );
        
        $update = [
                'designation' => $request->designation,
                'department_id' => $request->department,
                'division_id' => $request->division,
                'username' => $request->username,
                'password' => '',
                'emp_state_id' => $request->is_join,
            ];

        DB::table('users')->where('id', $id)->update($update);
        
        Session::flash('message', 'Information Successfully updated!');
        return redirect('profile');
    }
}
