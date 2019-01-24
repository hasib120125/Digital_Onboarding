<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class faqController extends Controller
{
    public function create(){
        $faqs = DB::table('faq')->where('status', 1)->orderBy('order_by', 'desc')->get();
        return view('dashboard.faq.create', compact('faqs'));
    }

    public function store(Request $request){
        $this->validate(
            $request,
            [
              'question' => 'required',
              'answer' => 'required',
              'order_by' => 'required',
            ]
        );

        $insert = [
                'question' => $request->question,
                'answer' => $request->answer,
                'order_by' => $request->order_by,
                'status' => $request->status,
                ];
        
        DB::table('faq')->insert($insert);
        Session::flash('message', 'Information Added Successfully !');
        return redirect('create-faq');
    }

    public function edit($id){
        $faq = DB::table('faq')->find($id);
        $status = ['1' => 'active','0' => 'deactive'];
        return view('dashboard.faq.edit', compact('faq','status'));
    }

    public function update(Request $request, $id){
        $this->validate(
            $request,
            [
              'question' => 'required',
              'answer' => 'required',
              'order_by' => 'required',
            ]
        );

        $update = [
                'question' => $request->question,
                'answer' => $request->answer,
                'order_by' => $request->order_by,
                'status' => $request->status,
            ];
        
        DB::table('faq')->where('id', $id)->update($update);
        Session::flash('message', 'Information updated Successfully !');
        return redirect('create-faq');
    }

    public function destroy($id)
    {
        $faqs = DB::table('faq')->find($id);
        $faqs = DB::table('faq')->where('id', $id)->delete();
        Session::flash('message', 'faq Deleted Successfully !');
        return redirect('create-faq');
    }
}
