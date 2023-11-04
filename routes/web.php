<?php

use App\Imports\UsersImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ScanUrlController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\AdminUserManualController;

use App\Http\Controllers\AdminUserManagementController;
use App\Http\Controllers\AdminSeminarManagementController;
use App\Http\Controllers\AdminCertificateManagementController;
use App\Http\Controllers\AdminEmailController;
use App\Http\Controllers\AdminOrgManagementController;
use App\Http\Controllers\ScanController;
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
    return view('index');
});

//Login Authentication Start
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
//Login Authentication End

//QR Scan
Route::get('/scan', [App\Http\Controllers\ScanController::class, 'scan']);

//Admin Seminar/Training Management Start
Route::get('/admin/seminar-management', [AdminSeminarManagementController::class, 'adminSeminarManagement']);
Route::get('/admin/seminar-management-add', [AdminSeminarManagementController::class, 'addSeminarManagement']);
Route::post('seminar', [AdminSeminarManagementController::class, 'store']);
Route::post('/addSeminar', [AdminSeminarManagementController::class, 'addSeminar']);
Route::get('/seminar-management-view/{id}', [AdminSeminarManagementController::class, 'viewSeminarManagement']);
Route::get('/seminar-management-update/{id}', [AdminSeminarManagementController::class, 'showSeminar']);
Route::post('/seminar-management-update/{id}', [AdminSeminarManagementController::class, 'updateSeminar']);
Route::get('deleteSeminar/{id}', [AdminSeminarManagementController::class, 'deleteSeminar']);
//Admin Seminar/Training Management End



//Admin Certificate Start
Route::get('/admin/certificate-management', [AdminCertificateManagementController::class, 'adminCertificateManagement']);
Route::get('/admin/certificate-management-list', [AdminCertificateManagementController::class, 'adminCertificateListManagement']);
Route::post('certificate', [AdminCertificateManagementController::class, 'store']);
Route::get('/admin/certificate-management-message/{id}', [AdminCertificateManagementController::class, 'adminCertificateManagementMessage']);
Route::get('/certificate-management-add', [AdminCertificateManagementController::class, 'adminCertificateManagementAdd']);
Route::get('/certificate-management-import', [AdminCertificateManagementController::class, 'adminCertificateManagementImport']);
Route::get('/certificate-management-generate/{id}', [AdminCertificateManagementController::class, 'showCertificateCode']);
Route::post('/certificate-management-generate/{id}', [AdminCertificateManagementController::class, 'updateCertificateCode']);
Route::get('/certificate-management-update/{id}', [AdminCertificateManagementController::class, 'showCertificate']);
Route::post('/certificate-management-update/{id}', [AdminCertificateManagementController::class, 'updateCertificate']);
Route::get('/add-certificate', [AdminCertificateManagementController::class, 'addCertificate']);
Route::post('/addCert', [AdminCertificateManagementController::class, 'addCert']);
Route::get('/edit-cert/{id}', [AdminCertificateManagementController::class, 'formCert']);
Route::post('/edit-cert/{id}', [AdminCertificateManagementController::class, 'editCert']);
Route::get('deleteCert/{id}', [AdminCertificateManagementController::class, 'deleteCert']);
Route::get('/employee/pdf/{id}/{seminar_id}', [AdminCertificateManagementController::class, 'createPDF']);
//Admin Certificate End


//Admin User Management Start
Route::get('/admin/user-management', [AdminUserManagementController::class, 'adminUserManagement']);
Route::get('/user-management-user/{id}', [AdminUserManagementController::class, 'showChangeRoleUser']);
Route::post('/user-management-user/{id}', [AdminUserManagementController::class, 'updateChangeRoleUser']);
Route::get('/user-management-admin/{id}', [AdminUserManagementController::class, 'showChangeRoleAdmin']);
Route::post('/user-management-admin/{id}', [AdminUserManagementController::class, 'updateChangeRoleAdmin']);
//Admin User Management End

//Email Management
Route::get('/admin/email-management', [AdminEmailController::class, 'emailManagement']);
Route::post('/admin/email-management', [AdminEmailController::class, 'editEmail']);
//Admin User Manual Start
Route::get('/admin/user-manual', [AdminUserManualController::class, 'adminUserManual']);
//Admin User Manual End
//Org Management
Route::get('/admin/org-management', [AdminOrgManagementController::class, 'adminOrg']);
Route::post('/admin/org-management', [AdminOrgManagementController::class, 'addOrg']);
Route::get('/admin/org-management-add', [AdminOrgManagementController::class, 'addOrg']);
Route::post('org', [AdminOrgManagementController::class, 'storeOrg']);
Route::get('deleteOrg/{id}', [AdminOrgManagementController::class, 'deleteOrg']);
Route::get('/org-management-update/{id}', [AdminOrgManagementController::class, 'showOrg']);
Route::post('/org-management-update/{id}', [AdminOrgManagementController::class, 'updateOrg']);

//Client Start
Route::get('/client', [ClientController::class, 'client']);
Route::get('/qr', function () {
    return view('qrgenerator');
});
// Route::get('/scan', function () {
//     $download_count = DB::table('download_logs')->get()->count();
//     return view('scanner', ['download_count' => $download_count]);
// });
Route::post('/certificate_validation', [ClientController::class, 'certificate_validation']);
//Client End


Route::controller(UserController::class)->group(function () {
    Route::get('users', 'index');
    Route::post('users-import', 'import')->name('users.import');
});

Route::controller(CertificateController::class)->group(function () {
    Route::get('certificate', 'index');
    Route::post('certificate-import', 'import')->name('certificate.import');
});

Route::get('/pdfcert', [CertificateController::class, 'viewPdf']);
Route::get('scanurl', [ScanUrlController::class, 'view_scanurl']);
Route::post('scanurl', [ScanUrlController::class, 'scan']);


Route::get('/generate-image-text', array('as' => 'generate.image.text', 'uses' => 'ImageController@generateImageText'));
Route::post('generate-image-text-store', array('as' => 'generate.image.text.store', 'uses' => 'ImageController@generateImageTextStore'));

//Email Route
Route::post('/sendEmail', [MailController::class, 'send_email']);
