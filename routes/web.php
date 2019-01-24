<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Middleware\CheckDefaultPassword;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth', CheckDefaultPassword::class)
    ->group(function () {
        Route::get('/', 'HomeController@index')
            ->name('home');

        //Frontend Route
        Route::post('/user-profile', 'UserController@createProfile')->name('create-user-profile');
        Route::get('/user-profile-edit/{id}', 'UserController@edit')->name('user-profile-edit');
        Route::patch('/user-profile-update/{id}', 'UserController@update')->name('user-profile-update');
        Route::get('/user-dashboard', 'HomeController@userDashboard')->name('user-dashboard');
        Route::get('/user-guide-line', 'HomeController@userGuideline')->name('user-guide-line');
        Route::get('/user-guide-line-and-other-info', 'HomeController@guideLineAndOtherInformation')->name('user-guide-line-and-other-info');
        Route::get('/about-us', 'HomeController@aboutUs')->name('about-us');
        Route::get('/faq', 'HomeController@faq')->name('faq');
        Route::post('/cheklist-feedback-store', 'UserController@checklistFeedback')->name('cheklist-feedback-store');
        Route::post('/cheklist-feedback', 'UserController@checklistFeedback')->name('cheklist-feedback-store');

        //Admin Panel Route

        //Candidate Route
        Route::get('cadidate-create','candidateController@create')->name('cadidate-create');
        Route::post('candidate-save','candidateController@store')->name('candidate-save');

        Route::get('candidate-list','candidateController@index')->name('candidate-list');
        Route::get('candidate-edit/{id}','candidateController@edit')->name('candidate-edit');
        Route::patch('candidate-update/{id}','candidateController@update')->name('candidate-update');
        Route::delete('candidate-delete/{id}','candidateController@destroy')->name('candidate-delete');

        Route::get('send-mail/{id}', 'candidateController@confirm')->name('send-mail');

        //about robi Route
        Route::get('about-robi','aboutRobiController@create')->name('about-robi');
        Route::post('about-robi-save','aboutRobiController@store')->name('about-robi-save');
        Route::get('about-robi-edit/{id}','aboutRobiController@edit')->name('about-robi-edit');
        Route::patch('about-robi-update/{id}','aboutRobiController@update')->name('about-robi-update');

        //Pre Joining Document list Route
        Route::get('pre-doc-list','preDoclistController@create')->name('pre-doc-list');
        Route::post('pre-doc-save','preDoclistController@store')->name('pre-doc-save');
        Route::get('pre-doc-edit/{id}','preDoclistController@edit')->name('pre-doc-edit');
        Route::patch('pre-doc-update/{id}','preDoclistController@update')->name('pre-doc-update');
        Route::delete('pre-doc-delete/{id}','preDoclistController@destroy')->name('pre-doc-delete');

        //profile Route
        Route::get('profile','profileController@create')->name('profile');
        Route::get('profile-edit/{id}','profileController@edit')->name('profile-edit');
        Route::patch('profile-update/{id}','profileController@update')->name('profile-update');

        //checklist Route
        Route::get('checklist','checklistController@create')->name('checklist');
        Route::post('checklist-save','checklistController@store')->name('checklist-save');
        Route::get('checklist-edit/{id}','checklistController@edit')->name('checklist-edit');
        Route::patch('checklist-update/{id}','checklistController@update')->name('checklist-update');
        Route::delete('checklist-delete/{id}','checklistController@destroy')->name('checklist-delete');

        //ceo message Route
        Route::get('ceo-message','messageController@create')->name('ceo-message');
        Route::post('ceo-message-save','messageController@store')->name('ceo-message-save');
        Route::get('ceo-message-edit/{id}','messageController@edit')->name('ceo-message-edit');
        Route::patch('ceo-message-update/{id}','messageController@update')->name('ceo-message-update');

        //guideline Route
        Route::get('guide-line-principle','guidelineController@create')->name('guide-line-principle');
        Route::post('guide-line-principle-save','guidelineController@store')->name('guide-line-principle-save');
        Route::get('guide-line-principle-edit/{id}','guidelineController@edit')->name('guide-line-principle-edit');
        Route::patch('guide-line-principle-update/{id}','guidelineController@update')->name('guide-line-principle-update');

        //codeOfConduct Route
        Route::get('code-of-conduct', 'CodeOfConductController@create')->name('code-of-conduct');
        Route::post('code-of-conduct-save', 'CodeOfConductController@store')->name('code-of-conduct-save');
        Route::get('code-of-conduct-edit/{id}', 'CodeOfConductController@edit')->name('code-of-conduct-edit');
        Route::patch('code-of-conduct-update/{id}', 'CodeOfConductController@update')->name('code-of-conduct-update');

        //robiCulture Route
        Route::get('robi-culture', 'RobiCultureController@create')->name('robi-culture');
        Route::post('robi-culture-save', 'RobiCultureController@store')->name('robi-culture-save');
        Route::get('robi-culture-edit/{id}', 'RobiCultureController@edit')->name('robi-culture-edit');
        Route::patch('robi-culture-update/{id}', 'RobiCultureController@update')->name('robi-culture-update');

        //robiFacilities Route
        Route::get('robi-facility', 'RobiFacilityController@create')->name('robi-facility');
        Route::post('robi-facility-save', 'RobiFacilityController@store')->name('robi-facility-save');
        Route::get('robi-facility-edit/{id}', 'RobiFacilityController@edit')->name('robi-facility-edit');
        Route::patch('robi-facility-update/{id}', 'RobiFacilityController@update')->name('robi-facility-update');

        //medicalBenefit Route
        Route::get('medical-benefit', 'MedicalBenefitController@create')->name('medical-benefit');
        Route::post('medical-benefit-save', 'MedicalBenefitController@store')->name('medical-benefit-save');
        Route::get('medical-benefit-edit/{id}', 'MedicalBenefitController@edit')->name('medical-benefit-edit');
        Route::patch('medical-benefit-update/{id}', 'MedicalBenefitController@update')->name('medical-benefit-update');

        //itGuideline Route
        Route::get('it-guideline', 'ItGuidelineController@create')->name('it-guideline');
        Route::post('it-guideline-save', 'ItGuidelineController@store')->name('it-guideline-save');
        Route::get('it-guideline-edit/{id}', 'ItGuidelineController@edit')->name('it-guideline-edit');
        Route::patch('it-guideline-update/{id}', 'ItGuidelineController@update')->name('it-guideline-update');
        
        //meet leader Route
        Route::get('meet-leader','meetLeaderController@create')->name('meet-leader');
        Route::post('meet-leader-save','meetLeaderController@store')->name('meet-leader-save');
        Route::get('meet-leader-edit/{id}','meetLeaderController@edit')->name('meet-leader-edit');
        Route::patch('meet-leader-update/{id}','meetLeaderController@update')->name('meet-leader-update');

        //faq Route
        Route::get('create-faq','faqController@create')->name('create-faq');
        Route::post('faq-save','faqController@store')->name('faq-save');
        Route::get('faq-edit/{id}','faqController@edit')->name('faq-edit');
        Route::patch('faq-update/{id}','faqController@update')->name('faq-update');
        Route::delete('faq-delete/{id}','faqController@destroy')->name('faq-delete');

        //orgnization Route
        Route::get('org-structure','orgController@create')->name('org-structure');
        Route::post('org-structure-save','orgController@store')->name('org-structure-save');
        Route::get('org-structure-edit/{id}','orgController@edit')->name('org-structure-edit');
        Route::patch('org-structure-update/{id}','orgController@update')->name('org-structure-update');

        //division Route
        Route::get('create-division','divisionController@create')->name('create-division');
        Route::post('division-save','divisionController@store')->name('division-save');
        Route::get('division-edit/{id}','divisionController@edit')->name('division-edit');
        Route::patch('division-update/{id}','divisionController@update')->name('division-update');

        //Line Manager Route
        Route::get('line-manager','lineManagerController@create')->name('line-manager');
        Route::post('line-manager-save','lineManagerController@store')->name('line-manager-save');
        Route::get('line-manager-edit/{id}','lineManagerController@edit')->name('line-manager-edit');
        Route::patch('line-manager-update/{id}','lineManagerController@update')->name('line-manager-update');

        //Route::get('checklist-report', 'ReportController@checklistReport')->name('checklist-report');
        //Route::post('checklist-report-data', 'ReportController@checklistReportData')->name('checklist-report-data');
        
        Route::get('/checklist-report', ['as' => 'reports.checklist-report',
            'uses' => 'ReportController@checklistReport']);
        
        Route::get('/checklist-report-data', ['as' => 'reports.checklist-report-data',
            'uses' => 'ReportController@checklistReportData']);



        Route::get('export-excel', 'ReportController@excel')->name('export-excel');
        // Route::get('division-department-report', 'ReportController@topicWiseReprot')->name('division-department-report');

    });
