<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class meetLeaderController extends Controller
{
    public function create(){
        $leaders = DB::table('meet_leader')->where('status', 1)->get();
        return view('dashboard.meet_leader.create', compact('leaders'));
    }

    public function store(Request $request){
        $this->validate(
            $request,
            [
              'name' => 'required',
              'designation' => 'required',
              'division' => 'required',
              'department' => 'required',
              'short_profile' => 'required',
              'order_by' => 'required',
            ]
        );

        if($request->hasFile('image')){
            $image = Input::file('image');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('files/' . $filename);
            Image::make($image->getRealPath())->resize(162, 158)->save($path);

            $insert = ['short_profile' => Input::get('short_profile'),
                    'picture'    => 'files/'.$filename,
                    'name' => Input::get('name'),
                    'designation' => Input::get('designation'),
                    'division' => Input::get('division'),
                    'department' => Input::get('department'),
                    'order_by'    => Input::get('order_by'),
                    'status'    => Input::get('status'),
                    ];
        }
        else{
            $insert = [
                    'short_profile' => Input::get('short_profile'),
                    'name' => Input::get('name'),
                    'designation' => Input::get('designation'),
                    'division' => Input::get('division'),
                    'department' => Input::get('department'),
                    'order_by'    => Input::get('order_by'),
                    'status'    => Input::get('status'),
                    ];
        }

        DB::table('meet_leader')->insert($insert);
        Session::flash('message', 'Successfully added Information!');
        return redirect('meet-leader');
    }

    public function edit($id){
        $leader = DB::table('meet_leader')->find($id);
        $status = ['1' => 'Active','0' => 'Deactive'];
        return view('dashboard.meet_leader.edit', compact('leader','status'));
    }

    public function update(Request $request, $id){
        $this->validate(
            $request,
            [
              'name' => 'required',
              'designation' => 'required',
              'division' => 'required',
              'department' => 'required',
              'short_profile' => 'required',
              'order_by' => 'required',
            ]
        );

        if($request->hasFile('image')){
            $image = Input::file('image');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('files/' . $filename);
            Image::make($image->getRealPath())->resize(162, 158)->save($path);

            $update = ['short_profile' => Input::get('short_profile'),
                    'picture'    => 'files/'.$filename,
                    'name' => Input::get('name'),
                    'designation' => Input::get('designation'),
                    'division' => Input::get('division'),
                    'department' => Input::get('department'),
                    'order_by'    => Input::get('order_by'),
                    'status'    => Input::get('status'),
                    ];
        }

        elseif($request->is_file_delete == 'true'){
            $update = ['short_profile' => Input::get('short_profile'),
                        'name' => Input::get('name'),
                        'designation' => Input::get('designation'),
                        'division' => Input::get('division'),
                        'department' => Input::get('department'),
                        'order_by'    => Input::get('order_by'),
                        'picture' => '',
                        'status'    => Input::get('status'),
                    ];
        }

        else{
            $update = [
                    'short_profile' => Input::get('short_profile'),
                    'name' => Input::get('name'),
                    'designation' => Input::get('designation'),
                    'division' => Input::get('division'),
                    'department' => Input::get('department'),
                    'order_by'    => Input::get('order_by'),
                    'status'    => Input::get('status'),
                    ];
        }

        DB::table('meet_leader')->where('id', $id)->update($update);
        Session::flash('message', 'Successfully updated Information!');
        return redirect('meet-leader');
    }

}
