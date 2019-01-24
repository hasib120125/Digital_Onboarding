<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Image;

class preDoclistController extends Controller
{
    public function create(){
        $preDocs = DB::table('checklists')->where('emp_state_id', 1)->where('status', 1)->orderBy('order_by')->get();
        return view('dashboard.pre_doc.create', compact('preDocs'));
    }

    public function store(Request $request){
        $this->validate(
            $request,
            [
              'document_name' => 'required',
              'status' => 'required',
              'order_by' => 'required',
            ]
        );

        $docList = [
                'document_name' => $request->document_name,
                'emp_state_id' => $request->emp_state_id,
                'order_by' => $request->order_by,
                'status' => $request->status,
            ];
        
        DB::table('checklists')->insert($docList);
        Session::flash('message', 'Information Added Successfully !');
        return redirect('pre-doc-list');
    }

    public function edit($id){
        $docList = DB::table('checklists')->find($id);
        $status = ['1' => 'Active','0' => 'Deactive'];
        return view('dashboard.pre_doc.edit', compact('docList', 'status'));
    }

    public function update(Request $request, $id){
        $this->validate(
            $request,
            [
              'document_name' => 'required',
              'order_by' => 'required',
            ]
        );

        $docList = DB::table('checklists')->find($id);
        $docLists = 
            [
                'document_name' => $request->document_name,
                'emp_state_id' => $request->emp_state_id,
                'order_by' => $request->order_by,
                'status' => $request->status,
            ];
        
        DB::table('checklists')->where('id', $id)->update($docLists);
        
        Session::flash('message', 'Information updated Successfully !');
        
        return redirect('pre-doc-list');
    }

    public function destroy($id)
    {
        $docLists = DB::table('checklists')->find($id);
        $docLists = DB::table('checklists')->where('id', $id)->delete();
        Session::flash('message', 'Pre joining Document Deleted Successfully !');
        return redirect('pre-doc-list');
    }
}
