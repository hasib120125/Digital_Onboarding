<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class divisionController extends Controller
{
    public function create(){
        $divisions = DB::table('division_messages')->where('status',1)->get();
        $division = Division::pluck('name','id');
        return view('dashboard.division.create', compact('divisions','division'));
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

            $insert = [
                'message' => Input::get('message'),
                'file_type' => $fileExtension,
                'file_location' => 'storage/'.$fileName,
                'division' => Input::get('division'),
                'status' => Input::get('status'),
            ];
        }

        else{
            $insert = ['message' => Input::get('message'),
                        'division' => Input::get('division'),
                        'status' => Input::get('status'),
                    ];
        }

        DB::table('division_messages')->update(['status' => '0']);
        DB::table('division_messages')->insert($insert);
        Session::flash('message', 'Successfully added Division!');
        return redirect('create-division');
    }

    public function edit($id){
        $division = DB::table('division_messages')->find($id);
        $status = ['1' => 'active','0' => 'deactive'];
        $divisions = Division::pluck('name','id');
        return view('dashboard.division.edit', compact('division','status','divisions'));
    }

    public function update(Request $request, $id){
        $this->validate(
            $request,
            [
              'message' => 'required',
            ]
        );
        $division = DB::table('division_messages')->find($id);

        if($request->hasFile('file')){
            $fileName = $request->file->getClientOriginalName();
            $fileExtension = $request->file->getClientOriginalExtension();
            $request->file->storeAs('public',$fileName);
        }

        if($request->hasFile('file')){
            $update = ['message' => Input::get('message'),
                        'file_type' => $fileExtension,
                        'file_location' => 'storage/'.$fileName,
                        'division' => Input::get('division'),
                    ];
        }

        else{
            $update = ['message' => Input::get('message'),
                        'division' => Input::get('division'),
                    ];
        }

        DB::table('division_messages')->where('id', $id)->update($update);
        Session::flash('message', 'Successfully updated Division!');
        return redirect('create-division');
    }
}
