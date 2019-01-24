<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class RobiFacilityController extends Controller
{
    public function create()
    {
        $robi_facilities = DB::table('robi_facilities')->where('status', 1)->get();
        return view('dashboard.robi_facility.create', compact('robi_facilities'));
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


        DB::table('robi_facilities')->update(['status' => '0']);
        DB::table('robi_facilities')->insert($insert);
        Session::flash('message', 'Successfully Added!');
        return redirect('robi-facility');
    }

    public function edit($id)
    {
        $robi_facilities = DB::table('robi_facilities')->find($id);
        $status = ['1' => 'active', '0' => 'deactive'];
        return view('dashboard.robi_facility.edit', compact('robi_facilities', 'status'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'message' => 'required',
            ]
        );
        $robi_facilities = DB::table('robi_facilities')->find($id);

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

        DB::table('robi_facilities')->where('id', $id)->update($update);
        Session::flash('message', 'Successfully Updated!');
        return redirect('robi-facility');
    }
}
