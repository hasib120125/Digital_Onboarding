<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class checklistController extends Controller
{
    public function create(){
        $checklists = DB:: table('checklists')->where('emp_state_id','!=',1)->where('status', 1)->orderBy('order_by', 'asc')->get();
        return view('dashboard.checklist.create', compact('checklists'));
    }

    public function store(Request $request){
        $this->validate(
            $request,
            [
              'timeline' => 'required',
              'document_name' => 'required',
              'order_by' => 'required',
            ]
        );

        $checklists = [
                'emp_state_id' => $request->timeline,
                'document_name' => $request->document_name,
                'order_by' => $request->order_by,
                'status' => $request->status,
            ];
        
        DB::table('checklists')->insert($checklists);
        Session::flash('message', 'Checklist Added Successfully !');
        return redirect('checklist');
    }

    public function edit($id){
        $checklists = DB::table('checklists')->find($id);
        $check_lists_timeline = ['2' => '1 day', '3' => '14 day', '4' => '30 day', '5' => '90 day'];
        $status = ['1' => 'Active','0' => 'Deactive'];
        return view('dashboard.checklist.edit', compact('checklists','check_lists_timeline','status'));
    }

    public function update(Request $request, $id){
        $this->validate(
            $request,
            [
              'timeline' => 'required',
              'document_name' => 'required',
              'order_by' => 'required',
            ]
        );

        $checklists = DB::table('checklists')->find($id);

        $checklists =
            [
                'emp_state_id' => $request->timeline,
                'document_name' => $request->document_name,
                'order_by' => $request->order_by,
            ];
        DB::table('checklists')->where('id', $id)->update(['status' => '0']);
        DB::table('checklists')->where('id', $id)->update($checklists);
        Session::flash('message', 'Checklist Updated Successfully !');
        return redirect('checklist');
    }

    public function destroy($id)
    {
        $checklists = DB::table('checklists')->find($id);
        $checklists = DB::table('checklists')->where('id', $id)->delete();
        Session::flash('message', 'Checklist Deleted Successfully !');
        return redirect('checklist');
    }

}
