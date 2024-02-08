<?php
namespace App;
use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{PipelineCategoryController,CompanyController,ApiLeadGeneratation};
use Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('admin.auth.login');
    return redirect('admins\login');
});

Route::get('/pipeline',[pipelinecategorycontroller::class,'showpage'])->name('pipeline');
Route::get('category/{item}/edit',[pipelinecategorycontroller::class,'edit']);
Route::post('category/store',[pipelinecategorycontroller::class,'store']);
Route::get('/destroy/{id}',[pipelinecategorycontroller::class,'destroy'])->name('destroy');


// Route::group(array('prefix' => "admins","namespace" => "Admin","as"=>"admin."),function () {
Route::group(['prefix' => 'admins',"namespace" => "App\Http\Controllers\Admin"], function () {
    Auth::routes();
    Route::group(array("middleware" => ["auth"]),function () {
        // Route::get('/home', [Auth\showHomeController@::class, 'index'])->name('home');
        Route::get('home', 'HomeController@index')->name('home');
        Route::get('password/change', 'Auth\ResetPasswordController@changePassword')->name('password.change');
        Route::post('password/change/update', 'Auth\ResetPasswordController@updatePassword')->name('password.change.update');
        Route::get('profile/change', 'HomeController@changeProfile')->name('profile.change');
        Route::post('profile/update', 'HomeController@updateProfile')->name('profile.update');

        Route::get('lead_report', 'LeadController@leadReport')->name('lead.lead_report');
        Route::post('lead_report_datatable', 'LeadController@index')->name('lead.lead_report_datatable');
        Route::get('lead/pipeline', 'LeadController@pipelineView')->name('lead.pipeline');
        Route::post('change-lead-type', 'LeadController@changeLeadupdateType')->name('lead.change-lead-type');
        Route::get('lead/{type}', 'LeadController@index')->name('lead.index');
        Route::post('/lead/clearFormData', 'LeadController@clearFormData')->name('company.clearFormData');
        Route::resource('lead', 'LeadController');
        Route::resource('activity', 'ActivityController');
        Route::post('bulklead', 'LeadController@bulklead')->name('lead.bulklead');
        Route::get('get-states', 'LeadController@getStates')->name('getStates');
        Route::get('get-cities', 'LeadController@getCities')->name('getCities');
        Route::get('fetchLeads', 'ApiLeadGeneratation@fetchLeads')->name('fetchLeads');
        
        //schedule
        Route::get('lead/schedule/{id}', 'LeadController@getSchedule')->name('lead.schedule');


        //pipeline
        Route::get('/pipeline',[PipelineCategoryController::class,'showpage'])->name('pipeline');
        Route::get('category/{item}/edit',[PipelineCategoryController::class,'edit']);
        Route::post('category/store',[PipelineCategoryController::class,'store']);
        Route::get('/destroy/{id}',[PipelineCategoryController::class,'destroy'])->name('destroy');

        //campany

        Route::get('/company',[CompanyController::class,'index'])->name('company');
        Route::post('/company/store', [CompanyController::class,'store'])->name('store');
        Route::get('/company/{id}', [CompanyController::class, 'show'])->name('company.show');
        Route::post('/company/clearFormData', [CompanyController::class, 'clearFormData'])->name('company.clearFormData');
        Route::post('/company/update', [CompanyController::class, 'update'])->name('update'); // For updating an existing company
        Route::delete('/destroya/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');

        //User
        Route::get('/user','UserController@index')->name('user.index');
        Route::post('/add_user','UserController@store')->name('user.store');
        Route::get('/viewuser','UserController@viewuser')->name('user.viewuser');
        Route::post('/update/{id}', 'UserController@updateuser')->name('user.update');
        Route::delete('/destroy/{id}', 'UserController@destroy')->name('user.destroy');
        
         //Subscription
        Route::get('/subscription','SubscriptionController@index')->name('subscription.index');
         Route::get('/subscription-list','SubscriptionController@list')->name('subscription.list');
        Route::get('/subscription-add','SubscriptionController@add')->name('subscription.add');
        Route::post('/subscription-store','SubscriptionController@store')->name('subscription.store');
        Route::get('/subscription-delete/{id}','SubscriptionController@delete')->name('subscription.delete');
        Route::get('/subscription-edit/{id}','SubscriptionController@edit')->name('subscription.edit');
        Route::post('/subscription-update','SubscriptionController@update')->name('subscription.update');


         //company with user (Admin Side)
        Route::get('/admin_company','CompanyController@admincompany')->name('admin_company');
        Route::get('/company_user/{id}', 'CompanyController@usermodal')->name('company_user');
        
        Route::post('/whatsup_schedule', 'ActivityController@whatsup_schedule')->name('whatsup_schedule');
        Route::post('/add_schedule', 'ActivityController@add_schedule')->name('add_schedule');

});
    });

