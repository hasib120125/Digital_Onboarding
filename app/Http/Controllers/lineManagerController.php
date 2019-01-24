<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class lineManagerController extends Controller
{
    public function create(){
        $lists = DB::table('line_manager')->where('status',1)->get();
        return view('dashboard.line_manager.create', compact('lists'));
    }

    public function store(Request $request){
        $this->validate(
            $request,
            [
              'message' => 'required',
            ]
        );


        if($request->hasFile('file')){
            $fileName = $request->file->getClientOriginalName();
            $fileExtension = $request->file->getClientOriginalExtension();
            $request->file->storeAs('public',$fileName);

            $insert = ['message' => Input::get('message'),
                    'file_type' => $fileExtension,
                    'file_location' => 'storage/'.$fileName,
                    'status' => Input::get('status'),
                ];
        }
        else {
            $insert = ['message' => Input::get('message'),
                        'status' => Input::get('status'),
                    ];
        }

        DB::table('line_manager')->update(['status' => '0']);
        DB::table('line_manager')->insert($insert);
        Session::flash('message', 'Information Added Successfully !');
        return redirect('line-manager');
    }

    public function edit($id){
        $lineManager = DB::table('line_manager')->find($id);
        $status = ['1' => 'active','0' => 'deactive'];
        return view('dashboard.line_manager.edit', compact('lineManager','status')); 
    }
    
    public function update(Request $request, $id){
        $this->validate(
            $request,
            [
              'message' => 'required',
            ]
        );
        
        if($request->hasFile('file')){
            $fileName = $request->file->getClientOriginalName();
            $fileExtension = $request->file->getClientOriginalExtension();
            $request->file->storeAs('public',$fileName);
        }

        if($request->hasFile('file')){
            $update = ['message' => Input::get('message'),
                        'file_type' => $fileExtension,
                        'file_location' => 'storage/'.$fileName,
                    ];
        }elseif($request->is_file_delete == 'true'){
            $update = ['message' => Input::get('message'),
                        'file_type' => '',
                        'file_location' => '',
                    ];
        }

        else{
            $update = ['message' => Input::get('message'),
                        ];
        }

        DB::table('line_manager')->where('id', $id)->update($update);
        Session::flash('message', 'Information Updated Successfully !');
        return redirect('line-manager');
    }
}
