<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ItGuidelineController extends Controller
{
    public function create()
    {
        $it_guidelines = DB::table('it_guidelines')->where('status', 1)->get();
        return view('dashboard.it_guideline.create', compact('it_guidelines'));
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
        }else {
        $insert = [
                'message' => Input::get('message'),
                'status' => Input::get('status'),
                ];
        }

        DB::table('it_guidelines')->update(['status' => '0']);
        DB::table('it_guidelines')->insert($insert);
        Session::flash('message', 'Successfully Added!');
        return redirect('it-guideline');
    }

    public function edit($id)
    {
        $it_guidelines = DB::table('it_guidelines')->find($id);
        $status = ['1' => 'active', '0' => 'deactive'];
        return view('dashboard.it_guideline.edit', compact('it_guidelines', 'status'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'message' => 'required',
            ]
        );
        $it_guidelines = DB::table('it_guidelines')->find($id);

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
            $update = array(
                'message' => Input::get('message'),
                'file_type' => '',
                'file_location' => '',
            );
        } else {
            $update = [
                    'message' => Input::get('message'),
                    ];
            }

        DB::table('it_guidelines')->where('id', $id)->update($update);
        Session::flash('message', 'Successfully Updated!');
        return redirect('it-guideline');
    }
}
