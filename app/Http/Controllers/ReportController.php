<?php

namespace App\Http\Controllers;
use DB;
use Excel;
use App\Models\User;
use App\Models\Checklist;
use App\Models\ChecklistFeedback;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function checklistReport(){

        $checklist_feedbacks = ChecklistFeedback::all();
        $checklists = Checklist::all();
        $users = User::orderBy('name', 'ASC')->get();
        return view('dashboard.reports.checklist_report', compact('users', 'checklists', 'checklist_feedbacks'));
    }

    public function checklistReportData(Datatables $datatables)
    {
        $request  = $datatables->getRequest(); 
        $query = ChecklistFeedback::with('user')
        ->with('checklist')
        ->select('checklist_feedbacks.*');

        if($request->user_id)
        {
             $query = $query->where('user_id',$request->user_id);
        }

        if($request->timeline)
        {
            $query = $query->where('checklist_feedbacks.emp_state_id',$request->timeline);
        }
        
        $datatables = $datatables->eloquent($query)

        ->addColumn('checklist', function ($checklists) {
            if($checklists->checklist){
                return $checklists->checklist->document_name;
            }
            return '';
        })

        ->addColumn('user', function ($checklists) {
            return $checklists->user->username;
        });

        return $datatables->make(true);  
    }

    public function excel(){
        $checklists_data = DB::table('checklists')->get()->toArray();
        $checklist_array[] = array('Document Name');
        foreach($checklists_data as $checklist)
        {
        $checklist_array[] = array(
            'Document Name'   => $checklist->document_name,
        );
        }
        Excel::create('Checklist Data', function($excel) use ($checklist_array){
        $excel->setTitle('Checklist Data');
        $excel->sheet('Checklist Data', function($sheet) use ($checklist_array){
        $sheet->fromArray($checklist_array, null, 'A1', false, false);
        });
        })->download('xlsx');
    }
}