<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CodeOfConductController extends Controller
{
    public function create()
    {
        $code_of_conducts = DB::table('code_of_conducts')->where('status', 1)->get();
        return view('dashboard.code_of_conduct.create', compact('code_of_conducts'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'message' => 'required',
            ]
        );

        if ($request->hasFile('file')) {
            $fileName = $request->file->getClientOriginalName();
            $fileExtension = $request->file->getClientOriginalExtension();
            $request->file->storeAs('public', $fileName);

            $insert = [
                'message' => Input::get('message'),
                'file_type' => $fileExtension,
                'file_location' => 'storage/' . $fileName,
                'status' => Input::get('status'),
            ];
        }
        else {
            $insert = ['message' => Input::get('message'),
                        'status' => Input::get('status'),
                    ];
        }

        DB::table('code_of_conducts')->update(['status' => '0']);
        DB::table('code_of_conducts')->insert($insert);
        Session::flash('message', 'Added Successfully!');
        return redirect('code-of-conduct');
    }

    public function edit($id)
    {
        $code_of_conducts = DB::table('code_of_conducts')->find($id);
        $status = ['1' => 'active', '0' => 'deactive'];
        return view('dashboard.code_of_conduct.edit', compact('code_of_conducts', 'status'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'message' => 'required',
            ]
        );
        $code_of_conducts = DB::table('code_of_conducts')->find($id);

        if ($request->hasFile('file')) {
            $fileName = $request->file->getClientOriginalName();
            $fileExtension = $request->file->getClientOriginalExtension();
            $request->file->storeAs('public', $fileName);

            $update = [
                'message' => Input::get('message'),
                'file_type' => $fileExtension,
                'file_location' => 'storage/' . $fileName,
            ];
        } elseif ($request->is_file_delete == 'true') {
            $update = [
                'message' => Input::get('message'),
                'file_type' => '',
                'file_location' => '',
            ];
        } else {
            $update = ['message' => Input::get('message'),
                ];
        }

        DB::table('code_of_conducts')->where('id', $id)->update($update);
        Session::flash('message', 'Successfully Updated!');
        return redirect('code-of-conduct');
    }
}
