<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Image;

class orgController extends Controller
{
    public function create(){
        $orgStructures = DB::table('organigation_structure')->where('status', 1)->get();
        return view('dashboard.organization.create', compact('orgStructures'));
    }

    public function store(Request $request){
        $this->validate(
            $request,
            [
              'description' => 'required',
            ]
        );

        if($request->hasFile('file')){
            $fileName = $request->file->getClientOriginalName();
            $fileExtension = $request->file->getClientOriginalExtension();
            $request->file->storeAs('public',$fileName);
            
        $insert = ['description' => Input::get('description'),
            'file_type' => $fileExtension,
            'file_location' => 'storage/'.$fileName,
            'status' => Input::get('status'),
            ];
        }

        else{
            $insert = [
                    'description' => Input::get('description'),
                    'status' => Input::get('status'),
                    ];
            }

        DB::table('organigation_structure')->update(['status' => '0']);
        DB::table('organigation_structure')->insert($insert);
        Session::flash('message', 'Information Added Successfully !');
        return redirect('org-structure');
    }

    public function edit($id){
        $orgStructures = DB::table('organigation_structure')->find($id);
        $status = ['1' => 'active','0' => 'deactive'];
        return view('dashboard.organization.edit', compact('orgStructures','status'));
    }

    public function update(Request $request,$id){
        $this->validate(
            $request,
            [
              'description' => 'required',
            ]
        );

        if($request->hasFile('file')){
            $fileName = $request->file->getClientOriginalName();
            $fileExtension = $request->file->getClientOriginalExtension();
            $request->file->storeAs('public',$fileName);

            $update = ['description' => Input::get('description'),
                        'file_type' => $fileExtension,
                        'file_location' => 'storage/'.$fileName,
                    ];
        }


        elseif($request->is_file_delete == 'true'){
            $update = ['description' => Input::get('description'),
                        'file_type' => '',
                        'file_location' => '',
                    ];
        }

        else{
            $update = [
                    'description' => Input::get('description'),
                    ];
            }
        
        DB::table('organigation_structure')->where('id', $id)->update($update);
        Session::flash('message', 'Information updated Successfully !');
        return redirect('org-structure');
    }
}
