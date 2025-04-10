<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Admin\DistrictMasterController;
use App\Http\Controllers\Admin\TalukaMasterController;
use App\Http\Controllers\Admin\WardMasterController;
use App\Http\Controllers\Admin\DepartmentMasterController;

use App\Http\Controllers\Admin\MeatTypeMasterController;

use App\Http\Controllers\User\DogRegistrationController;

use App\Http\Controllers\Admin\MeatRegistrationListController;  

use App\Http\Controllers\Admin\MeatRenewalListController;

use App\Http\Controllers\User\MeatRegistrationController;

use App\Http\Controllers\User\MeatRegistrationRenewalController;

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




Route::get('/', function () {
    return view('user.home');
});

// Auth::routes();

// ======================= Admin Register
Route::get('/admin/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'store'])->name('admin.register.store');

// ======================= Admin Login/Logout
Route::get('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login');// Very imp line for session expire after 2hrs 
Route::post('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'authenticate'])->name('admin.login.store');
Route::post('/admin/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');

// ======================= Admin Dashboard
Route::group(['middleware' => ['auth:web']], function () {
    
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'Admin_Home'])->name('admin.dashboard');
    
    // ========= District Master
    Route::resource('/district_master', DistrictMasterController::class);

    // ========= Taluka Master
    Route::resource('/taluka_master', TalukaMasterController::class);
    
    // ========= Ward Master
    Route::resource('/ward_master', WardMasterController::class);
    
    // ========= Department Master
    Route::resource('/department_master', DepartmentMasterController::class);
    
    // ========= Meat Type Master
    Route::resource('/meat_type_master', MeatTypeMasterController::class);
    
    // ========= Meat Registration Form 
    Route::get('/meat_registration_list/{status}', [MeatRegistrationListController::class, 'MeatRegistrationList'])->name('meat_registration_list');

    Route::get('/meat_registration_view/{id}/{status}', [MeatRegistrationListController::class, 'MeatRegistrationView'])->name('meat_registration_view');

    Route::get('/approve_meat_registration/{id}', [MeatRegistrationListController::class, 'ApproveMeatRegistration'])->name('admin.approve_meat_registration');

    Route::get('/reject_meat_registration/{id}', [MeatRegistrationListController::class, 'RejectMeatRegistration'])->name('admin.reject_meat_registration');

    Route::get('/generate_meat_registration_pdf/{id}/{status}', [MeatRegistrationListController::class, 'GenerateMeatRegistration'])->name('admin.generate_meat_registration_pdf');
    
    Route::get('/generate_english_meat_registration_pdf/{id}/{status}', [MeatRegistrationListController::class, 'EnglishGenerateMeatRegistration'])->name('admin.generate_english_meat_registration_pdf');
    
    Route::get('/generate_marathi_meat_registration_pdf/{id}/{status}', [MeatRegistrationListController::class, 'MarathiGeneratemeatRegistration'])->name('admin.generate_marathi_meat_registration_pdf');
    
});

// ======================= User Login
Route::get('/user/login', [App\Http\Controllers\User\Auth\LoginController::class, 'User_Login_Form'])->name('user.login');
Route::post('/user/login', [App\Http\Controllers\User\Auth\LoginController::class, 'User_Authenticate'])->name('user.login.store');
Route::post('/user/logout', [App\Http\Controllers\User\Auth\LoginController::class, 'User_Logout'])->name('user.logout');

// ======================= User Register 
Route::get('/user/register', [App\Http\Controllers\User\Auth\RegisterController::class, 'User_Register_Form'])->name('user.register');
Route::post('/user/register', [App\Http\Controllers\User\Auth\RegisterController::class, 'Store_User_Register_Form'])->name('user.register.store');

// ======================= User Dashboard
    Route::group(['middleware' => ['auth:meatregistereduser']], function () {
    
    Route::get('/user/appli_form', [MeatRegistrationController::class, 'User_ApplicationForm'])->name('user.appli_form');

    Route::get('/user/appli_form/View/{application_no}/{user_type}', [MeatRegistrationController::class, 'User_ApplicationForm_View'])->name('user.appli_form.view');

    Route::post('/user/appli_form/user_refund/{application_no}', [MeatRegistrationController::class, 'User_Refund'])->name('user.appli_form.user_refund');
    
});

// ======================= Meat Registration Terms & Conditions
Route::get('/user/meat_registration_terms', [MeatRegistrationController::class, 'Terms_Conditions'])->name('user.meat_registration_terms');

Route::get('/user/self_decleration', [MeatRegistrationController::class, 'self_decleration_view'])->name('user.self_decleration');

Route::get('/user/accept_self_declaration/{id}', [MeatRegistrationController::class, 'self_decleration_accept'])->name('user.accept_self_declaration');


Route::get('/user/self_affadevit_pdf/{id}', [MeatRegistrationController::class, 'self_affadevit_pdf'])->name('user.self_affadevit_pdf');



// ======================= Meat Registration Form
Route::get('/user/meat_registration', [MeatRegistrationController::class, 'create'])->name('user.meat_registration');

Route::post('/user/meat_registration', [MeatRegistrationController::class, 'store'])->name('user.meat_registration.store');

// ======================= Meat Search
Route::post('/check-application-status', [MeatRegistrationController::class, 'check_application_status'])->name('check-application-status');

// =============  Get Taluka List With Dependent Dropdown
Route::post('/taluka_list', [DogRegistrationController::class, 'Taluka_List'])->name('taluka_list');

// =============  Get Department List With Dependent Dropdown
Route::post('/department_list', [DogRegistrationController::class, 'Department_List'])->name('department_list');


// ======================= Meat Renewal Form
Route::get('/user/meat_renewal_form', [MeatRegistrationRenewalController::class, 'create'])->name('user.meat_renewal_form');

Route::post('/user/meat_renewal_form', [MeatRegistrationRenewalController::class, 'store'])->name('user.meat_renewal_form.store');

// ========= Meat Renewal admin panel Form 
Route::get('/meat_renewal_list/{status}', [MeatRenewalListController::class, 'MeatRenewalList'])->name('meat_renewal_list');

Route::get('/meat_renewal_view/{id}/{status}', [MeatRenewalListController::class, 'MeatRenewalView'])->name('meat_renewal_view');

Route::get('/approve_meat_renewal/{id}', [MeatRenewalListController::class, 'ApproveMeatRenewal'])->name('admin.approve_meat_renewal');


Route::get('/reject_meat_renewal/{id}', [MeatRenewalListController::class, 'RejectMeatRenewal'])->name('admin.reject_meat_renewal');

Route::get('/generate_english_meat_renewal_pdf/{id}/{status}', [MeatRenewalListController::class, 'EnglishGenerateMeatRenewal'])->name('admin.generate_english_meat_renewal_pdf');

Route::get('/generate_marathi_meat_renewal_pdf/{id}/{status}', [MeatRenewalListController::class, 'MarathiGeneratemeatRenewal'])->name('admin.generate_marathi_meat_renewal_pdf');



Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cleared!";

});



