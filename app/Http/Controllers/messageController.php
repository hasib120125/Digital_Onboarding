<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class messageController extends Controller
{
    public function create(){
        $messages = DB::table('ceo_message')->where('status', 1)->get();
        return view('dashboard.message.create', compact('messages'));
    }

    public function store(Request $request){
        $this->validate(
            $request,
            [
              'name' => 'required',
              'message' => 'required',
            ]
        );

        if($request->hasFile('photo') && $request->hasFile('file')){
            $image = Input::file('photo');
            $imageName  = time() . '.' . $image->getClientOriginalExtension();
            $imageExtension = public_path('files/' . $imageName);
            Image::make($image->getRealPath())->resize(300, 200)->save($imageExtension);

            $fileName = $request->file->getClientOriginalName();
            $fileExtension = $request->file->getClientOriginalExtension();
            $request->file->storeAs('public',$fileName);

            $messages = ['message' => Input::get('message'),
            'name' => Input::get('name'),
            'photo' => 'files/'.$imageName,
            'file_type' => $fileExtension,
            'file_location' => 'storage/'.$fileName,
            'status' => Input::get('status'),
            ];
        }
        
        else{
            $messages = ['message' => Input::get('message'),
                        'name' => Input::get('name'),
                        'status' => Input::get('status'),
                        ];
        }
        DB::table('ceo_message')->update(['status' => '0']);        
        DB::table('ceo_message')->insert($messages);  
        Session::flash('message', 'Successfully added messages!');
        return redirect('ceo-message');
    }

    public function edit($id){
        $messages = DB::table('ceo_message')->find($id);
        $status = ['1' => 'Active','0' => 'Deactive'];
        return view('dashboard.message.edit', compact('messages','status'));
    }

    public function update(Request $request, $id){
        $this->validate(
            $request,
            [
              'message' => 'required',
            ]
        );

        $messages = DB::table('ceo_message')->find($id);

        if($request->hasFile('photo') && $request->hasFile('file')){
            $image = Input::file('photo');
            $imageName  = time() . '.' . $image->getClientOriginalExtension();
            $imageExtension = public_path('files/' . $imageName);
            Image::make($image->getRealPath())->resize(300, 200)->save($imageExtension);

            $fileName = $request->file->getClientOriginalName();
            $fileExtension = $request->file->getClientOriginalExtension();
            $request->file->storeAs('public',$fileName);

            $messages = ['message' => Input::get('message'),
            'name' => Input::get('name'),
            'photo' => 'files/'.$imageName,
            'file_type' => $fileExtension,
            'file_location' => 'storage/'.$fileName,
            ];
        }

        elseif($request->is_file_delete == 'true'){
            $messages = ['message' => Input::get('message'),
                        'name' => Input::get('name'),
                        'photo' => '',
                        'file_type' => '',
                        'file_location' => '',
                        ];
        }

        else{
            $messages = ['message' => Input::get('message'),
                        'name' => Input::get('name'),
                        ];
        }

        DB::table('ceo_message')->where('id', $id)->update($messages);
        Session::flash('message', 'Successfully Updated messages!');
        return redirect('ceo-message');
    }
}
