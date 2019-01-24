<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MedicalBenefitController extends Controller
{
    public function create()
    {
        $medical_benifits = DB::table('medical_benifits')->where('status', 1)->get();
        return view('dashboard.medical_benifit.create', compact('medical_benifits'));
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

        DB::table('medical_benifits')->update(['status' => '0']);
        DB::table('medical_benifits')->insert($insert);
        Session::flash('message', 'Successfully Added!');
        return redirect('medical-benefit');
    }

    public function edit($id)
    {
        $medical_benifits = DB::table('medical_benifits')->find($id);
        $status = ['1' => 'active', '0' => 'deactive'];
        return view('dashboard.medical_benifit.edit', compact('medical_benifits', 'status'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'message' => 'required',
            ]
        );
        $medical_benifits = DB::table('medical_benifits')->find($id);

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

        DB::table('medical_benifits')->where('id', $id)->update($update);
        Session::flash('message', 'Successfully Updated!');
        return redirect('medical-benefit');
    }
}
