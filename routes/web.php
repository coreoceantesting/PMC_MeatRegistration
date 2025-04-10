<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Admin\DistrictMasterController;
use App\Http\Controllers\Admin\TalukaMasterController;
use App\Http\Controllers\Admin\WardMasterController;
use App\Http\Controllers\Admin\DepartmentMasterController;

use App\Http\Controllers\Admin\MeatTransportRenewalListController; 

use App\Http\Controllers\Admin\Meat_ReporController; 

use App\Http\Controllers\Admin\Meat_RenewalReporController;

use App\Http\Controllers\Admin\Meat_VehicleReporController; 

use App\Http\Controllers\Admin\Meat_VehicleRenewalReporController;

use App\Http\Controllers\Admin\MeatTypeMasterController;

use App\Http\Controllers\User\DogRegistrationController;

use App\Http\Controllers\Admin\MeatRegistrationListController;  

use App\Http\Controllers\Admin\MeatRenewalListController;

use App\Http\Controllers\Admin\MeatTransportListController;

use App\Http\Controllers\User\MeatRegistrationController;

use App\Http\Controllers\User\MeatRegistrationRenewalController;

use App\Http\Controllers\User\MeatTransportController;

use App\Http\Controllers\User\MeatTransportRenewalController;

use App\Http\Controllers\Admin\UserMasterController;

use App\Http\Controllers\Hod\HodMeatRegistrationListController;

use App\Http\Controllers\Hod\HodMeatRenewalListController;

use App\Http\Controllers\Hod\HodMeatTransportListController;

use App\Http\Controllers\Hod\HodMeatTransportRenewalListController;


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

Auth::routes();

// ======================= Admin Register
Route::get('/admin/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'store'])->name('admin.register.store');

// ======================= Admin Login/Logout
Route::get('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');// Very imp line for session expire after 2hrs 
Route::post('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'authenticate'])->name('admin.login.store');
Route::post('/admin/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');

// ==================== Hod Login/Logout
Route::get('/hod/login', [App\Http\Controllers\Hod\Auth\LoginController::class, 'login'])->name('login');// Very imp line for session expire after 2hrs 
Route::post('/hod/login', [App\Http\Controllers\Hod\Auth\LoginController::class, 'authenticate'])->name('hod.login.store');
Route::post('/hod/logout', [App\Http\Controllers\Hod\Auth\LoginController::class, 'hodlogout'])->name('hod.logout');


// ======================= Admin Dashboard
Route::group(['middleware' => ['auth:web']], function () {
    
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'Admin_Home'])->name('admin.dashboard');
    
     Route::get('/hod/dashboard', [App\Http\Controllers\Hod\HomeController::class, 'Admin_Home'])->name('hod.dashboard');
    
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
    
    // ========= User Master
    Route::resource('/user_master', UserMasterController::class);
    
    // ========= Meat Registration Form 
    Route::get('/meat_registration_list/{status}', [MeatRegistrationListController::class, 'MeatRegistrationList'])->name('meat_registration_list');

    Route::get('/meat_registration_view/{id}/{status}', [MeatRegistrationListController::class, 'MeatRegistrationView'])->name('meat_registration_view');
    
   Route::get('/meat_registration_invoice/{id}/{status}', [MeatRegistrationListController::class, 'meatRegistrationInvoice'])->name('meat_registration_invoice');
   
    Route::get('/approve_meat_registration/{id}', [MeatRegistrationListController::class, 'ApproveMeatRegistration'])->name('admin.approve_meat_registration');

    Route::post('/reject_meat_registration/{id}', [MeatRegistrationListController::class, 'RejectMeatRegistration'])->name('admin.reject_meat_registration');
    

    Route::get('/generate_meat_registration_pdf/{id}/{status}', [MeatRegistrationListController::class, 'GenerateMeatRegistration'])->name('admin.generate_meat_registration_pdf');
    
    Route::get('/generate_english_meat_registration_pdf/{id}/{status}', [MeatRegistrationListController::class, 'EnglishGenerateMeatRegistration'])->name('admin.generate_english_meat_registration_pdf');
    
    Route::get('/generate_marathi_meat_registration_pdf/{id}/{status}', [MeatRegistrationListController::class, 'MarathiGeneratemeatRegistration'])->name('admin.generate_marathi_meat_registration_pdf');

    Route::get('/generate_affidavit_pdf/{id}/{status}', [MeatRegistrationListController::class, 'GenerateaffidavitPdf'])->name('admin.generate_affidavit_pdf');



// ========= Meat transport Form 
    Route::get('/meat_transport_list/{status}', [MeatTransportListController::class, 'MeatTransportList'])->name('meat_transport_list');

    Route::get('/meat_transport_view/{id}/{status}', [MeatTransportListController::class, 'MeatTransportView'])->name('meat_transport_view');

    Route::get('/meat_transport_invoice/{id}/{status}', [MeatTransportListController::class, 'meatTransportInvoice'])->name('meat_transport_invoice');

    Route::get('/approve_meat_transport/{id}', [MeatTransportListController::class, 'ApproveMeatTransport'])->name('admin.approve_meat_transport');
    

    Route::post('/reject_meat_transport/{id}', [MeatTransportListController::class, 'RejectMeatTransport'])->name('admin.reject_meat_transport');

   
    
    Route::get('/generate_english_meat_transport_pdf/{id}/{status}', [MeatTransportListController::class, 'EnglishGenerateMeatTransport'])->name('admin.generate_english_meat_transport_pdf');
    
    Route::get('/generate_marathi_meat_transport_pdf/{id}/{status}', [MeatTransportListController::class, 'MarathiGeneratemeatTransport'])->name('admin.generate_marathi_meat_transport_pdf');



// ========= Meat Transport Renewal Form 

    Route::get('/meat_transport_renewal_list/{status}', [MeatTransportRenewalListController::class, 'MeatTransportRenewalList'])->name('meat_transport_renewal_list');
    
    Route::get('/meat_transport_renewal_view/{id}/{status}',[MeatTransportRenewalListController::class, 'MeatTransportRenewalView'])->name('meat_transport_renewal_view');
    
    Route::get('/meat_transport_renewal_invoice/{id}/{status}',[MeatTransportRenewalListController::class, 'meatTransportRenewalInvoice'])->name('meat_transport_renewal_invoice');

    Route::get('/approve_meat_renewal_transport/{id}', [MeatTransportRenewalListController::class, 'ApproveMeatRenewalTransport'])->name('admin.approve_meat_renewal_transport');

    Route::post('/reject_meat_renewal_transport/{id}', [MeatTransportRenewalListController::class, 'RejectMeatRenewalTransport'])->name('admin.reject_meat_renewal_transport');


    Route::get('/generate_english_meat_transport_renewal_pdf/{id}/{status}', [MeatTransportRenewalListController::class, 'EnglishGenerateMeatRenewalTransport'])->name('admin.generate_english_meat_transport_renewal_pdf');
    
    Route::get('/generate_marathi_meat_transport_renewal_pdf/{id}/{status}', [MeatTransportRenewalListController::class, 'MarathiGeneratemeatRenewalTransport'])->name('admin.generate_marathi_meat_transport_renewal_pdf');


    Route::get('/all_register_meat', [Meat_ReporController::class, 'Meat_Report_List'])->name('admin.all_register_meat');
    
    Route::post('/search_all_meat_list', [Meat_ReporController::class, 'Meat_SearchReport_List'])->name('admin.search_all_meat_list');
    

    Route::get('/all_renewal_report', [Meat_RenewalReporController::class, 'Meat_Renewal_Report_List'])->name('admin.all_renewal_report');
    
    Route::post('/search_all_renewal_list', [Meat_RenewalReporController::class, 'Meat_Renewal_SearchReport_List'])->name('admin.search_all_renewal_list');
    
    
// -------------- vehical report --------------------------------

    Route::get('/all_vehical_report', [Meat_VehicleReporController::class, 'Vehicle_Report_List'])->name('admin.all_vehical_report');
    
    Route::post('/search_all_vehicle_list', [Meat_VehicleReporController::class, 'vehical_SearchReport_List'])->name('admin.search_all_vehicle_list');
    
    
    Route::get('/all_vehical_renewal_report', [Meat_VehicleRenewalReporController::class, 'Vehicle_Renewal_Report_List'])->name('admin.all_vehical_renewal_report');
    
    Route::post('/search_renewal_vehicle_list', [Meat_VehicleRenewalReporController::class, 'vehical_Renewal_SearchReport_List'])->name('admin.search_renewal_vehicle_list');
    
     
    // ========================= Hod Meat Registration Form
    
    Route::get('/meat_registration_list_hod/{status}', [HodMeatRegistrationListController::class, 'MeatRegistrationList'])->name('hod.meat_registration_list');

    Route::get('/meat_registration_view_hod/{id}/{status}', [HodMeatRegistrationListController::class, 'MeatRegistrationView'])->name('hod.meat_registration_view');
    
    Route::get('/approve_meat_registration_by_hod/{id}', [HodMeatRegistrationListController::class, 'ApproveMeatRegistration'])->name('hod.approve_meat_registration');
    
    Route::post('/reject_meat_registration_by_hod/{id}', [HodMeatRegistrationListController::class, 'RejectMeatRegistration'])->name('hod.reject_meat_registration');
    
    Route::get('/final_approve_meat_registration_list/{status}', [HodMeatRegistrationListController::class, 'FinalApprovedList'])->name('hod.final_approve_meat_registration_list');
    
    Route::get('/final_approve_meat_registration_view/{id}/{status}', [HodMeatRegistrationListController::class, 'FinalApproveView'])->name('hod.final_approve_meat_registration_view');
    
    Route::get('/final_approve_meat_registration_invoice/{id}/{status}', [HodMeatRegistrationListController::class, 'meatRegistrationInvoice'])->name('hod.final_approve_meat_registration_invoice');
    
    Route::post('/final_approve_meat_registration_by_hod/{id}', [HodMeatRegistrationListController::class, 'ApprovebyHodRegistration'])->name('hod.final_approve_meat_registration_by_hod');
    
    Route::post('/final_reject_meat_registration_by_hod/{id}', [HodMeatRegistrationListController::class, 'RejectByHodRegistration'])->name('hod.final_reject_meat_registration_by_hod');
    
    Route::get('/generate_english_meat_registration_pdf_by_hod/{id}/{status}', [HodMeatRegistrationListController::class, 'EnglishGenerateMeatRegistration'])->name('hod.generate_english_meat_registration_pdf');
    
    Route::get('/generate_marathi_meat_registration_pdf_by_hod/{id}/{status}', [HodMeatRegistrationListController::class, 'MarathiGeneratemeatRegistration'])->name('hod.generate_marathi_meat_registration_pdf');

    Route::get('/generate_affidavit_pdf_by_hod/{id}/{status}', [HodMeatRegistrationListController::class, 'GenerateaffidavitPdf'])->name('hod.generate_affidavit_pdf');
    
     Route::get('/admin_rejected_list/{status}', [HodMeatRegistrationListController::class, 'adminRejectedList'])->name('admin_rejected_list');
     
     Route::get('/hod_report_meat', [HodMeatRegistrationListController::class, 'Meat_Report_List'])->name('hod.hod_report_meat');
     
     Route::post('/search_report_meat_list', [HodMeatRegistrationListController::class, 'Meat_SearchReport_List'])->name('hod.search_report_meat_list');
     
     Route::get('/meat_report_view_hod/{id}', [HodMeatRegistrationListController::class, 'meatReportView'])->name('hod.meat_report_view_hod');
     Route::get('/all_register_pet/view/{id}', [HodMeatRegistrationListController::class, 'meatReportView'])->name('admin.meat_report_view_hod');
    
    // ========================= Hod Renewal Meat Registration Form
    
     Route::get('/meat_renewal_list_hod/{status}', [HodMeatRenewalListController::class, 'MeatRenewalList'])->name('hod.meat_renewal_list');
    
    Route::get('/meat_renewal_view_hod/{id}/{status}', [HodMeatRenewalListController::class, 'MeatRenewalView'])->name('hod.meat_renewal_view');
    
    Route::get('/approve_meat_renewal_by_hod/{id}', [HodMeatRenewalListController::class, 'ApproveMeatRenewal'])->name('hod.approve_meat_renewal');

    Route::post('/reject_meat_renewal_by_hod/{id}', [HodMeatRenewalListController::class, 'RejectMeatRenewal'])->name('hod.reject_meat_renewal');
    
    Route::get('/final_meat_renewal_list/{status}', [HodMeatRenewalListController::class, 'FinalApprovedListrenewal'])->name('hod.final_meat_renewal_list');
    
    Route::get('/final_meat_renewal_view/{id}/{status}', [HodMeatRenewalListController::class, 'FinalApproveRenewalView'])->name('hod.final_meat_renewal_view');
    
     Route::get('/final_meat_renewal_invoice/{id}/{status}', [HodMeatRenewalListController::class, 'meatRenewalInvoice'])->name('hod.final_meat_renewal_invoice');
    
    Route::post('/final_approve_meat_renewal_by_hod/{id}', [HodMeatRenewalListController::class, 'ApprovebyHodRenewal'])->name('hod.final_approve_meat_renewal_by_hod');
    
    Route::post('/final_reject_meat_renewal_by_hod/{id}', [HodMeatRenewalListController::class, 'RejectByHodRenewal'])->name('hod.final_reject_meat_renewal_by_hod');
    
    Route::get('/generate_english_meat_renewal_pdf_by_hod/{id}/{status}', [HodMeatRenewalListController::class, 'EnglishGenerateMeatRenewal'])->name('hod.generate_english_meat_renewal_pdf_by_hod');
    
    Route::get('/generate_marathi_meat_renewal_pdf_by_hod/{id}/{status}', [HodMeatRenewalListController::class, 'MarathiGeneratemeatRenewal'])->name('hod.generate_marathi_meat_renewal_pdf_by_hod');
    
    Route::get('/generate_affidavit_meat_renewal_pdf_by_hod/{id}/{status}', [HodMeatRenewalListController::class, 'GeneraterenewalaffidavitPdf'])->name('hod.generate_affidavit_meat_renewal_pdf_by_hod');
    
    Route::get('/admin_rejected_list_renewal/{status}', [HodMeatRenewalListController::class, 'adminRejectedListRenewal'])->name('admin_rejected_list_renewal');
    
    Route::get('/hod_meat_report_renewal', [HodMeatRenewalListController::class, 'Meat_Renewal_Report_List'])->name('hod.hod_meat_report_renewal');
    
     Route::post('/search_meat_renewal_report_list', [HodMeatRenewalListController::class, 'Meat_Renewal_SearchReport_List'])->name('hod.search_meat_renewal_report_list');
     
     Route::get('/meat_renewal_report_view/{id}', [HodMeatRenewalListController::class, 'meatReportRenewalView'])->name('hod.meat_renewal_report_view');
    
     // ========= Hod Meat transport Form 
    Route::get('/meat_transport_list_hod/{status}', [HodMeatTransportListController::class, 'MeatTransportList'])->name('hod.meat_transport_list_hod');

    Route::get('/meat_transport_view_hod/{id}/{status}', [HodMeatTransportListController::class, 'MeatTransportView'])->name('hod.meat_transport_view_hod');
    
    Route::post('/reject_meat_transport_by_hod/{id}', [HodMeatTransportListController::class, 'RejectMeatTransport'])->name('hod.reject_meat_transport_by_hod');
    
    Route::get('/approve_meat_transport_by_hod/{id}', [HodMeatTransportListController::class, 'ApproveMeatTransport'])->name('hod.approve_meat_transport_by_hod');
    
    Route::get('/final_meat_transport_list/{status}', [HodMeatTransportListController::class, 'FinalApprovedList'])->name('hod.final_meat_transport_list');
    
    Route::get('/final_meat_transport_view/{id}/{status}', [HodMeatTransportListController::class, 'FinalApproveView'])->name('hod.final_meat_transport_view');
    
    Route::get('/final_meat_transport_invoice/{id}/{status}', [HodMeatTransportListController::class, 'meatTransportInvoice'])->name('hod.final_meat_transport_invoice');
    
    Route::post('/final_reject_meat_transport_by_hod/{id}', [HodMeatTransportListController::class, 'RejectByHodRegistration'])->name('hod.final_reject_meat_transport_by_hod');
   
    Route::post('/final_approve_meat_transport_by_hod/{id}', [HodMeatTransportListController::class, 'ApprovebyHodTransport'])->name('hod.final_approve_meat_transport_by_hod');
    
    Route::get('/generate_english_meat_transport_pdf_by_hod/{id}/{status}', [HodMeatTransportListController::class, 'EnglishGenerateMeatTransport'])->name('hod.generate_english_meat_renewal_pdf_by_hod');
    
    Route::get('/generate_marathi_meat_transport_pdf_by_hod/{id}/{status}', [HodMeatTransportListController::class, 'MarathiGeneratemeatTransport'])->name('hod.generate_marathi_meat_renewal_pdf_by_hod');
    
     Route::get('/admin_rejected_list_meat_transport/{status}', [HodMeatTransportListController::class, 'adminMeatTransportRejectedList'])->name('admin_rejected_list_meat_transport');
     
     Route::get('/hod_vehicle_report_list', [HodMeatTransportListController::class, 'Vehicle_Report_List'])->name('hod.hod_vehicle_report_list');
     
     Route::post('/search_vehicle_report_list', [HodMeatTransportListController::class, 'vehical_SearchReport_List'])->name('hod.search_vehicle_report_list');
     
     Route::get('/meat_transport_report_view/{id}', [HodMeatTransportListController::class, 'meatTransportReportView'])->name('hod.meat_transport_report_view');
    
   // ========= Hod Renewal Meat transport Form 
   
   Route::get('/meat_transport_renewal_list_hod/{status}', [HodMeatTransportRenewalListController::class, 'MeatTransportRenewalList'])->name('hod.meat_transport_renewal_list_hod');
   
   Route::get('/meat_transport_renewal_view_hod/{id}/{status}', [HodMeatTransportRenewalListController::class, 'MeatTransportRenewalView'])->name('hod.meat_transport_renewal_view_hod');
   
   Route::get('/approve_meat_transport_renewal_by_hod/{id}', [HodMeatTransportRenewalListController::class, 'ApproveMeatRenewalTransport'])->name('hod.approve_meat_transport_renewal_by_hod');
   
   Route::post('/reject_meat_transport_renewal_by_hod/{id}', [HodMeatTransportRenewalListController::class, 'RejectMeatRenewalTransport'])->name('hod.reject_meat_transport_renewal_by_hod');
   
   Route::get('/final_meat_transport_renewal_list/{status}', [HodMeatTransportRenewalListController::class, 'FinalApprovedRenewalList'])->name('hod.final_meat_transport_renewal_list');
   
   Route::get('/final_meat_transport_renewal_view/{id}/{status}', [HodMeatTransportRenewalListController::class, 'FinalApproveRenewalView'])->name('hod.final_meat_transport_renewal_view');
   
   Route::get('/final_meat_transport_renewal_invoice/{id}/{status}', [HodMeatTransportRenewalListController::class, 'meatTransportRenewalInvoice'])->name('hod.final_meat_transport_renewal_invoice');
  
   Route::post('/final_approve_meat_transport_renewal_by_hod/{id}', [HodMeatTransportRenewalListController::class, 'ApprovebyHodRenewal'])->name('hod.final_approve_meat_transport_renewal_by_hod');

  Route::post('/final_reject_meat_transport_renewal_by_hod/{id}', [HodMeatTransportRenewalListController::class, 'RejectByHodRenewal'])->name('hod.final_reject_meat_transport_renewal_by_hod');
  
  Route::get('/generate_english_meat_transport_renewal_by_hod/{id}/{status}', [HodMeatTransportRenewalListController::class, 'EnglishGenerateMeatRenewalTransport'])->name('hod.generate_english_meat_renewal_pdf_by_hod');
    
  Route::get('/generate_marathi_meat_transport_renewal_by_hod/{id}/{status}', [HodMeatTransportRenewalListController::class, 'MarathiGeneratemeatRenewalTransport'])->name('hod.generate_marathi_meat_renewal_pdf_by_hod');
  
  Route::get('/admin_rejected_list_meat_transport_renewal/{status}', [HodMeatTransportRenewalListController::class, 'adminMeatTransportRenewalRejectedList'])->name('admin_rejected_list_meat_transport_renewal');

  Route::get('/hod_vehicle_renewal_report_list', [HodMeatTransportRenewalListController::class, 'Vehicle_Renewal_Report_List'])->name('hod.hod_vehicle_renewal_report_list');
  
  Route::post('/search_vehicle_renewal_report_list', [HodMeatTransportRenewalListController::class, 'vehical_Renewal_SearchReport_List'])->name('hod.search_vehicle_renewal_report_list');
  
  Route::get('/meat_transport_renewal_report_view/{id}', [HodMeatTransportRenewalListController::class, 'meatTransportRenewalReportview'])->name('hod.meat_transport_renewal_report_view');
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
    
    Route::get('/user/appli_form/View_meat/{application_no}', [MeatRegistrationController::class, 'ApplicationForm_View'])->name('user.appli_form.View_meat');
    
    Route::get('/user/appli_form/invoice_meat/{application_no}/{user_type}', [MeatRegistrationController::class, 'meatRegistrationInvoice'])->name('user.appli_form.invoice');

    Route::post('/user/appli_form/user_refund/{application_no}', [MeatRegistrationController::class, 'User_Refund'])->name('user.appli_form.user_refund');
    
    Route::post('/user/update_Meat_registration/{id}', [MeatRegistrationController::class, 'updatemeatregiter'])->name('user.update_Meat_registration');




// ======================= Meat Vehicle Renewal Form
Route::get('/user/meat_transport_renewal_form', [MeatTransportRenewalController::class, 'create'])->name('user.meat_transport_renewal_form');

Route::post('/user/meat_transport_renewal_form', [MeatTransportRenewalController::class, 'store'])->name('user.meat_transport_renewal_form.store');

Route::get('/user/appli_form/View_trans_renewal/{application_no}/{user_type}', [MeatTransportRenewalController::class, 'UpdatevehicalRenewalForm_View'])->name('user.appli_form.View_trans_renewal');

Route::post('/user/update_transport_renewal_form/{id}', [MeatTransportRenewalController::class, 'UpdateTransportRenewal'])->name('user.update_transport_renewal_form');
 
Route::get('/user/generate_english_vehicle_renewal_license_pdf/{id}', [MeatTransportRenewalController::class, 'EnglishVehiclerenewallicensepdf'])->name('user.generate_english_vehicle_renewal_license_pdf');

Route::get('/user/generate_marathi_vehicle_renewal_license_pdf/{id}', [MeatTransportRenewalController::class, 'MarathiVehicleRenewallicensepdf'])->name('user.generate_marathi_vehicle_renewal_license_pdf');
   
Route::get('/user/appli_form/View_transrenewal/{id}', [MeatTransportRenewalController::class, 'ViewTransportRenewal'])->name('user.appli_form.View_transrenewal');

Route::get('/user/appli_form/invoice_transrenewal/{application_no}/{user_type}', [MeatTransportRenewalController::class, 'meatTransportRenewalInvoice'])->name('user.appli_form.invoice_transrenewal');
   
});

// ======================= Meat Registration Terms & Conditions

Route::get('/user/meat_registration_terms', [MeatRegistrationController::class, 'Terms_Conditions'])->name('user.meat_registration_terms');


Route::get('/user/self_decleration', [MeatRegistrationController::class, 'self_decleration_view'])->name('user.self_decleration');


Route::get('/user/accept_self_declaration/{id}', [MeatRegistrationController::class, 'self_decleration_accept'])->name('user.accept_self_declaration');


Route::get('/user/self_affadevit_pdf/{id}', [MeatRegistrationController::class, 'self_affadevit_pdf'])->name('user.self_affadevit_pdf');


Route::get('/user/generate_english_meat_license_pdf/{id}/{status}', [MeatRegistrationController::class, 'englishlicensepdf'])->name('user.generate_english_meat_license_pdf');


Route::get('/user/generate_marathi_meat_license_pdf/{id}/{status}', [MeatRegistrationController::class, 'marathilicensepdf'])->name('user.generate_marathi_meat_license_pdf');


Route::get('/user/oneweekbeforsms', [MeatRegistrationRenewalController::class, 'oneweekbeforsms'])->name('user.oneweekbeforsms');


// ======================= Meat Registration Form
Route::get('/user/meat_registration', [MeatRegistrationController::class, 'create'])->name('user.meat_registration');

Route::post('/user/meat_registration', [MeatRegistrationController::class, 'store'])->name('user.meat_registration.store');

// ======================= Meat Search
// Route::post('/check-application-status', [MeatRegistrationController::class, 'check_application_status'])->name('check-application-status');

Route::match(['get','post'],'/check-application-status', [MeatRegistrationController::class, 'check_application_status'])->name('check-application-status');

// =============  Get Taluka List With Dependent Dropdown
Route::post('/taluka_list', [DogRegistrationController::class, 'Taluka_List'])->name('taluka_list');

// =============  Get Department List With Dependent Dropdown
Route::post('/department_list', [DogRegistrationController::class, 'Department_List'])->name('department_list');


// ======================= Meat Renewal Form
    Route::get('/user/meat_renewal_form', [MeatRegistrationRenewalController::class, 'create'])->name('user.meat_renewal_form');

  // Route::get('/user/meat_renewal_forms', [MeatRegistrationRenewalController::class, 'creates'])->name('user.meat_renewal_forms');


Route::post('/user/meat_renewal_form', [MeatRegistrationRenewalController::class, 'store'])->name('user.meat_renewal_form.store');

Route::get('/user/appli_form/View_renewal/{application_no}/{user_type}', [MeatRegistrationRenewalController::class, 'UserRenewalFormView'])->name('user.appli_form.View_renewal');

Route::get('/user/appli_form/View_meatrenewal/{application_no}', [MeatRegistrationRenewalController::class, 'MeatRenewalFormView'])->name('user.appli_form.View_meatrenewal');

Route::get('/user/appli_form/invoice_meatrenewal/{application_no}/{user_type}', [MeatRegistrationRenewalController::class, 'meatRenewalInvoice'])->name('user.appli_form.invoice_meatrenewal');


Route::post('/user/update_Meat_renewal_form/{id}', [MeatRegistrationRenewalController::class, 'UpdateMeatRenewal'])->name('user.update_Meat_renewal_form');


Route::get('/user/self_affadevit_renewal_pdf/{id}', [MeatRegistrationRenewalController::class, 'renewalaffadevit_pdf'])->name('user.self_affadevit_renewal_pdf');

Route::get('/user/generate_english_renewal_license_pdf/{id}', [MeatRegistrationRenewalController::class, 'englishrenewallicensepdf'])->name('user.generate_english_renewal_license_pdf');

Route::get('/user/generate_marathi_renewal_license_pdf/{id}', [MeatRegistrationRenewalController::class, 'marathirenewallicensepdf'])->name('user.generate_marathi_renewal_license_pdf');



   // ========= Meat Renewal admin panel Form 
    Route::get('/meat_renewal_list/{status}', [MeatRenewalListController::class, 'MeatRenewalList'])->name('meat_renewal_list');
    
    Route::get('/meat_renewal_view/{id}/{status}', [MeatRenewalListController::class, 'MeatRenewalView'])->name('meat_renewal_view');
    
    Route::get('/meat_renewal_invoice/{id}/{status}', [MeatRenewalListController::class, 'meatRenewalInvoice'])->name('meat_renewal_invoice');

    Route::get('/approve_meat_renewal/{id}', [MeatRenewalListController::class, 'ApproveMeatRenewal'])->name('admin.approve_meat_renewal');


    Route::post('/reject_meat_renewal/{id}', [MeatRenewalListController::class, 'RejectMeatRenewal'])->name('admin.reject_meat_renewal');
    

     Route::get('/generate_english_meat_renewal_pdf/{id}/{status}', [MeatRenewalListController::class, 'EnglishGenerateMeatRenewal'])->name('admin.generate_english_meat_renewal_pdf');
    
    Route::get('/generate_marathi_meat_renewal_pdf/{id}/{status}', [MeatRenewalListController::class, 'MarathiGeneratemeatRenewal'])->name('admin.generate_marathi_meat_renewal_pdf');


   Route::get('/generate_renewal_affidavit_pdf/{id}/{status}', [MeatRenewalListController::class, 'GeneraterenewalaffidavitPdf'])->name('admin.generate_renewal_affidavit_pdf');


    // ======================= Meat / Livestock Transport Business License 

    // ==============================Meat vehical terms and codition

Route::get('/user/meat_vehical_terms', [MeatTransportController::class, 'Transport_Terms_Conditions'])->name('user.meat_vehical_terms');


// ======================= Meat transport Registration Form

Route::get('/user/meat_transport_registration', [MeatTransportController::class, 'create'])->name('user.meat_transport_registration');

Route::post('/user/meat_transport_registration', [MeatTransportController::class, 'store'])->name('user.meat_transport_registration.store');

Route::get('/user/appli_form/View_trans/{application_no}/{user_type}', [MeatTransportController::class, 'User_vehicalForm_View'])->name('user.appli_form.View_trans');

Route::get('/user/appli_form/View_transform/{application_no}', [MeatTransportController::class, 'vehicalForm_View'])->name('user.appli_form.View_transform');

Route::get('/user/appli_form/invoice_transform/{application_no}/{user_type}', [MeatTransportController::class, 'meatTransportInvoice'])->name('user.appli_form.invoice_transform');

Route::post('/user/update_transport_registration/{id}', [MeatTransportController::class, 'updateTransportRegiter'])->name('user.update_transport_registration');


Route::get('/user/generate_english_vehicle_license_pdf/{id}', [MeatTransportController::class, 'EnglishVehiclelicensepdf'])->name('user.generate_english_vehicle_license_pdf');

Route::get('/user/generate_marathi_vehicle_license_pdf/{id}', [MeatTransportController::class, 'MarathiVeiclelicensepdf'])->name('user.generate_marathi_vehicle_license_pdf');


Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cleared!";

});


// =========  Task schedule for
Route::get('/meat_renewal_schedule', function() {
     $exitCode = Artisan::call('renew-meat-license:check');
     dd(Artisan::output());
 });




