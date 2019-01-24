<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Mail\CandidateEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\Division;
use App\Models\Department;

class candidateController extends Controller
{
    public function index(){
        $candidateList = DB::table('users')->where('is_active', 1)->where('emp_state_id', 1)->get();
        return view('dashboard.candidate.show', compact('candidateList'));
    }

    public function create(){
        $divisions = Division::pluck('name','id');
        $departments = Department::pluck('name','id');
        return view('dashboard.candidate.create', compact('divisions','departments'));
    }

    public function store(Request $request){
        
        $this->validate(
            $request,
            [
              'name' => 'required',
              'username' => 'required|unique:users',
              'email' => 'required',
              'password' => 'required',
              'joining_date' => 'required',
              'phone' => 'required',
            ]
        );
        
        $addCandidate = [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'display_password' => $request->password,
                'phone' => $request->phone,
                'joining_date' => $request->joining_date,
                'emp_state_id' => $request->emp_state_id,
                'designation' => $request->designation,
                'is_send_email' => $request->is_sendemail,
             ];

        $id = DB::table('users')->insertGetId($addCandidate);
        Mail::send(new CandidateEmail($id));
        Session::flash('message', 'Successfully added Candidate!');
        return redirect('cadidate-create');
    }

    public function edit($id){
        $candidate = User::find($id);
        return view('dashboard.candidate.edit', compact('candidate'));
    }

    public function update(Request $request, $id){

        $this->validate(
            $request,
            [
              'name' => 'required',
              'username' => 'required',
              'email' => 'required',
              'password' => 'required',
              'joining_date' => 'required',
              'designation' => 'required',
            ]
        );
        $candidate = User::find($id);
        $candidate->name = $request->name; 
        $candidate->username = $request->username;
        $candidate->email = $request->email; 
        $candidate->password = Hash::make($request->password); 
        $candidate->phone = $request->phone; 
        $candidate->joining_date = $request->joining_date; 
        $candidate->designation = $request->designation; 
        $candidate->emp_state_id = $request->emp_state_id;
        $candidate->is_send_email = $request->is_sendemail; 
        $candidate->update(); 

        Session::flash('message', 'Successfully Updated Candidate!');
        return redirect('candidate-list');
    }

    public function destroy($id)
    {
        $candidate = DB::table('users')->find($id);
        $candidate = DB::table('users')->where('id', $id)->delete();
        Session::flash('message', 'candidate Deleted Successfully !');
        return redirect('candidate-list');
    }

    public function confirm($id){
        
        Mail::send(new CandidateEmail($id));
        return redirect('candidate-list');
    }
}
