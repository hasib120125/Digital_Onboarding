<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\AboutRobi;
use App\Models\Checklist;
use App\Models\UserProfile;
use App\Models\Guideline;
use DB;
class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('layouts.dashboard');
        }

        $checklists = Checklist::where('emp_state_id', '=', auth()->user()->emp_state_id)->where('status', 1)->get();
        $about_robi = AboutRobi::where('status', 1)->first();

        $profile = auth()->user();
        
        if(empty($profile->userProfile)){

         if(auth()->user()->emp_state_id == 1)
            {
                return view('home',compact('checklists', 'about_robi'));
            }
            elseif(auth()->user()->emp_state_id == 2)
            {
                return view('profile',compact('checklist', 'about_robi','profile','userProfile'));
            }
        }
        else{
            $checklists = Checklist::where('status', 1)->get();
            $userProfile = DB::table('user_profiles')->where('user_id',$profile->id)->first();
           
            return view('user_dashboard',compact('profile','checklists','userProfile'));
        }

    }

    public function userDashboard(){
        $profile = auth()->user();
        $checklists = Checklist::where('status', 1)->get();
        $userProfile = DB::table('user_profiles')->where('user_id',$profile->id)->first();
        return view('user_dashboard',compact('profile','checklists','userProfile'));
    }

    public function userGuideline(){
        $profile = auth()->user();
        $guidelinePrinciple = DB::table('guideline')->where('status', 1)->first();
        $lineManager = DB::table('line_manager')->where('status', 1)->first();
        return view('guideline', compact('profile','guidelinePrinciple','lineManager'));
    }

    public function aboutUs(){
        $profile = auth()->user();
        $ceoMessage = DB::table('ceo_message')->where('status', 1)->first();
        $orgStructure = DB::table('organigation_structure')->where('status', 1)->first();
        $meetLeader = DB::table('meet_leader')->where('status', 1)->get();
        $divisionInfo = DB::table('division_messages')->where('status', 1)->first();
        return view('about_us',compact('profile','ceoMessage','orgStructure','meetLeader','divisionInfo'));
    }

    public function faq(){
        $profile = auth()->user();
        $faqs = DB::table('faq')->where('status', 1)->get();
        return view('faq', compact('profile','faqs'));
    }

    public function guideLineAndOtherInformation()
    {

        $profile = auth()->user();
        $guidelinePrinciple = DB::table('guideline')->where('status', 1)->first();
        $code_of_conducts = DB::table('code_of_conducts')->where('status', 1)->first();
        $robi_cultures = DB::table('robi_cultures')->where('status', 1)->first();
        $robi_facilities = DB::table('robi_facilities')->where('status', 1)->first();
        $medical_benifits = DB::table('medical_benifits')->where('status', 1)->first();
        $it_guidelines = DB::table('it_guidelines')->where('status', 1)->first();
        return view('guide_line_and_other_info', compact('profile', 'guidelinePrinciple', 'code_of_conducts', 'robi_cultures', 'robi_facilities', 'medical_benifits', 'it_guidelines'));
    }
}
