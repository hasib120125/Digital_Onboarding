<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class guidelineController extends Controller
{
    public function create(){
        $guidelines = DB::table('guideline')->where('status', 1)->get();
        return view('dashboard.guideline.create', compact('guidelines'));
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
            else{
                $insert = [
                            'message' => Input::get('message'),
                            'status' => Input::get('status'),
                        ];
            }

        DB::table('guideline')->update(['status' => '0']);
        DB::table('guideline')->insert($insert);
        Session::flash('message', 'Successfully added Candidate!');
        return redirect('guide-line-principle');
    }

    public function edit($id){
        $guideline = DB::table('guideline')->find($id);
        $status = ['1' => 'active','0' => 'deactive'];
        return view('dashboard.guideline.edit', compact('guideline','status'));
    }

    public function update(Request $request, $id){
        $this->validate(
            $request,
            [
              'message' => 'required',
            ]
        );
        $guideline = DB::table('guideline')->find($id);

        if($request->hasFile('file')){
            $fileName = $request->file->getClientOriginalName();
            $fileExtension = $request->file->getClientOriginalExtension();
            $request->file->storeAs('public',$fileName);

            $update = ['message' => Input::get('message'),
                        'file_type' => $fileExtension,
                        'file_location' => 'storage/'.$fileName,
                    ];
        }

        elseif($request->is_file_delete == 'true'){
            $update = ['message' => Input::get('message'),
                        'file_type' => '',
                        'file_location' => '',
                    ];
        }

        else{
            $update = [
                        'message' => Input::get('message'),
                    ];
        }

        DB::table('guideline')->where('id',$id)->update($update);
        Session::flash('message', 'Successfully updated Guideline!');
        return redirect('guide-line-principle');
    }
}
