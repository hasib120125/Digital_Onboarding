<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class RobiCultureController extends Controller
{
    public function create()
    {
        $robi_cultures = DB::table('robi_cultures')->where('status', 1)->get();
        return view('dashboard.robi_culture.create', compact('robi_cultures'));
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

        DB::table('robi_cultures')->update(['status' => '0']);
        DB::table('robi_cultures')->insert($insert);
        Session::flash('message', 'Successfully Added!');
        return redirect('robi-culture');
    }

    public function edit($id)
    {
        $robi_cultures = DB::table('robi_cultures')->find($id);
        $status = ['1' => 'active', '0' => 'deactive'];
        return view('dashboard.robi_culture.edit', compact('robi_cultures', 'status'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'message' => 'required',
            ]
        );
        $robi_cultures = DB::table('robi_cultures')->find($id);

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

        DB::table('robi_cultures')->where('id', $id)->update($update);
        Session::flash('message', 'Successfully Updated!');
        return redirect('robi-culture');
    }
}
