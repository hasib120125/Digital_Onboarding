<?php

namespace App\Http\Controllers;

use App\Models\AboutRobi;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PrejoiningChecklist;
use Illuminate\Support\Facades\Input;
use Image;

class UserController extends Controller
{
    public function createProfile(Request $request){

        $this->validate(
            $request,
            [
              'preffered_name' => 'required',
              'date_of_birth' => 'required',
              'hobbies' => 'required',
            ]
        );

        if($request->hasFile('file')){
            $image = Input::file('file');
            $filename  = time().'.'. $image->getClientOriginalExtension();
            $path = public_path('files/'.$filename);
            Image::make($image->getRealPath())->resize(110, 110)->save($path);

            $userProfile = [
                    'user_id' => $request->user_id,
                    'preffered_name' => $request->preffered_name,
                    'profile_image' => 'files/'.$filename,
                    'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),
                    'hobbies' => $request->hobbies,
                ];
        }

        else{
            $userProfile = [
                'user_id' => $request->user_id,
                'preffered_name' => $request->preffered_name,
                'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),
                'hobbies' => $request->hobbies,
            ];
        }

        if (DB::table('user_profiles')->where(array('user_id' => $request->user_id))->count() < 1) {
            DB::table('user_profiles')->insert($userProfile);
        }
        return redirect('user-dashboard')->with('success', 'User Profile has been created successfully');
    }

    public function edit($id){
        $profile = DB::table('user_profiles')->where('user_id', $id)->first();
        return view('profile-edit', compact('profile'));
    }

    public function update(Request $request, $id){

        $this->validate(
            $request,
            [
              'preffered_name' => 'required',
              'date_of_birth' => 'required',
              'hobbies' => 'required',
            ]
        );

        if($request->hasFile('file')){
            $image = Input::file('file');
            $filename  = time().'.'. $image->getClientOriginalExtension();
            $path = public_path('files/'.$filename);
            Image::make($image->getRealPath())->resize(110, 110)->save($path);

            $userProfile = [
                    'preffered_name' => $request->preffered_name,
                    'profile_image' => 'files/'.$filename,
                    'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),
                    'hobbies' => $request->hobbies,
                ];
        }

        else{
            $userProfile = [
                'preffered_name' => $request->preffered_name,
                'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),
                'hobbies' => $request->hobbies,
            ];
        }
        
        DB::table('user_profiles')->where('user_id', $id)->update($userProfile);
        return redirect('user-dashboard')->with('success', 'User Profile has been created successfully');
    }

    public function checklistFeedback(Request $request){
      // $input = request()->all();
    //   dd($request->all());

      $user_id = $request->user_id;
      
      if(!empty($request->checklist )){
        $checkLists = $request->checklist;
        
        foreach ($checkLists as $each_checkList) {
            $userProfile = [
                    'user_id' => $user_id,
                    'checklist_id' => $each_checkList,
                    'created_by' => $user_id,
                    'created_at' => NOW(),
                ];

            if(DB::table('checklist_feedbacks')->where(array('user_id' => $user_id, 'checklist_id'=> $each_checkList))->count() < 1){
                DB::table('checklist_feedbacks')->insert($userProfile);
            }
        }
        return response()->json(['responseText' => 'Feedback added Successfully'], 200);
    }
    return response()->json(['responseText' => 'Nothing to save'], 200);
      // return redirect('user-dashboard')->with('success', 'User Profile has been created successfully');
        // $this->validate(
        //     $request,
        //     [
        //       'user_id' => 'required',
        //     ]
        // );

        // $checklistFeedback= DB::table('checklist');

        // if($request ($checklistFeedback )){

        // }

        // $userProfile = [
        //     [
        //         'user_id' => $request->user_id,
        //         'checklist_id' => $request->checklist_id,
        //     ],
        // ];
    }
}
