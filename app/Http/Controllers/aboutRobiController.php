<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Image;
use DB;

class aboutRobiController extends Controller
{
    public function create(){
        $abouts = DB::table('about_robis')->where('status', 1)->get();
        return view('dashboard.about_robi.create', compact('abouts'));
    }

    public function store(Request $request){
        $this->validate(
            $request,
            [
              'message' => 'required',
              'status' => 'required',
            ]
        );

        if($request->hasFile('file')){
            $fileName = $request->file->getClientOriginalName();
            $fileExtension = $request->file->getClientOriginalExtension();
            $request->file->storeAs('public',$fileName);

            $insert = [
                'message' => Input::get('message'),
                'file_type' => $fileExtension,
                'file_location' => 'storage/' . $fileName,
                'status' => $request->status,
            ];
        }
        else{
            $insert = [
                'message' => Input::get('message'),
                'status' => $request->status,
            ];
        }

        
        DB::table('about_robis')->update(['status' => '0']);
        DB::table('about_robis')->insert($insert);
        Session::flash('message', 'Information Added Successfully !');
        return redirect('about-robi');
    }

    public function edit($id){
        $abouRobi = DB::table('about_robis')->find($id);
        $status = ['1' => 'active','0' => 'deactive'];
        return view('dashboard.about_robi.edit', compact('abouRobi','status'));
    }

    public function update(Request $request, $id){
        $this->validate(
            $request,
            [
              'message' => 'required',
            ]
        );
        

        $file = Input::file('file');
        
        if($request->hasFile('file')){
            $fileName = $request->file->getClientOriginalName();
            $fileExtension = $request->file->getClientOriginalExtension();
            $request->file->storeAs('public',$fileName);

            $update = [
                'message' => Input::get('message'),
                'file_type' => $fileExtension,
                'file_location' => 'storage/' . $fileName,
            ];
        }
        elseif ($request->is_file_delete == 'true') {
            $update = [
                'message' => Input::get('message'),
                'file_type' => '',
                'file_location' => '',
            ];
        }
        else{
            $update = [
                'message' => Input::get('message'),
            ];
        }

        

        DB::table('about_robis')->where('id', $id)->update($update);
        Session::flash('message', 'Information Updated Successfully !');
        return redirect('about-robi');
    }
}
