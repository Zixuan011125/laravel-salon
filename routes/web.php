<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AddContactController;
use App\Http\Controllers\Admin\AdminAppointmentsController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\CustomerSideServicesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\HairCutterController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CustomersProductsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesServicesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SubServicesController;
use App\Http\Controllers\timeSlotController;
use App\Models\Services;
use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');

// first one is URL
// second one is function
// third one is route name

Route::post('/send-form',[AddContactController::class,'addContact'])->name('sendForm');
Route::get('/get-my-contact',[AddContactController::class,'getContact'])->name('getContact');
Route::get('/delete-my-contact',[AddContactController::class,'deleteContact'])->name('deleteContact');

Route::post('/saveRegister',[RegisterController::class,'submitRegisterForm'])->name('submitRegisterForm');
Route::post('/saveLogin',[RegisterController::class,'submitLoginForm'])->name('submitLoginForm');

// Navigation bar
Route::get('/go-services',[ServicesController::class,'services'])->name('services');
Route::get('/go-products',[ProductsController::class,'products'])->name('products');
Route::get('/LoginForm', [RegisterController::class,'showLoginForm'])->name('showLoginForm');
Route::get('/registerForm', [RegisterController::class,'showRegisterForm'])->name('showRegisterForm');
Route::get('/apppointments-history', [AppointmentsController::class, 'appointmentsHistory'])->name('appointmentsHistory');
Route::get('/logout',[RegisterController::class, 'logout'])->name('logout');

Route::get('/go-admin-login',[AdminController::class,'adminLogin'])->name('adminLogin');
Route::post('/submit-admin-login',[AdminController::class,'submitAdminLogin'])->name('submitAdminLogin');
Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('adminLogout');


Route::get('/go-dashboard', function(){
    return view('admin/dashboard');
})->name('dashboard');

Route::get('/go-services-list',[ServicesController::class,'servicesList'])->name('servicesList');
Route::post('/go-services-list',[ServicesController::class,'addServices'])->name('addServices');
Route::get('/show-services',[ServicesController::class,'showAllServices'])->name('showAllServices');
Route::get('/delete-services',[ServicesController::class,'deleteServices'])->name('deleteServices');
Route::get('/update-services',[ServicesController::class,'updateServices'])->name('updateServices');

Route::get('/go-sub-services-list',[SubServicesController::class,'subServicesForm'])->name('subServicesForm');
Route::post('/add-sub-servives',[SubServicesController::class,'addSubServices'])->name('addSubServices');
Route::get('/show-sub-services',[SubServicesController::class,'showAllSubServices'])->name('showAllSubServices');
Route::get('/go-update-sub-services/{id}/edit',[SubServicesController::class,'showUpdateSubServicesForm'])->name('showUpdateSubServicesForm');
// Route::get('/subService/{id}/edit', [SubServicesController::class, 'updateSubServices'])->name('updateSubServices.edit');

Route::put('/subService/{id}/edit', [SubServicesController::class, 'updateSubServices'])->name('updateSubServices.edit');

Route::get('/go-employees-list',[EmployeesController::class,'employeesForm'])->name('employeesForm');
Route::post('/add-employees',[EmployeesController::class,'addEmployees'])->name('addEmployees');
Route::get('/show-employees',[EmployeesController::class,'showAllEmployees'])->name('showAllEmployees');
Route::get('/go-update/{id}/edit',[EmployeesController::class,'showUpdateEmployeesForm'])->name('showUpdateEmployeesForm');
Route::post('/employees/{id}/edit',[EmployeesController::class,'updateEmployees'])->name('updateEmployees.edit');
Route::get('/delete-employees/{id}', [EmployeesController::class, 'deleteEmployees'])->name('deleteEmployees');

// Route for customer side
Route::get('/services-list',[CustomerSideServicesController::class, 'displayServices'])->name('displayServices');

// Route::get('/show-booking-date',[AppointmentsController::class,'showCalendarDate'])->name('showCalendarDate');
// Route::get('/show-timeslot',[AppointmentsController::class,'showTimeSlots'])->name('showTimeSlots');

Route::get('/show-booking-date',[bookingController::class,'showCalendarDate'])->name('showCalendarDate');
Route::get('/timeslot',[timeSlotController::class,'showTimeSlots'])->name('showTimeSlots');
Route::get('/hair-cutter',[HairCutterController::class,'showHairCutter'])->name('showHairCutter');
Route::get('/appointments',[AppointmentsController::class,'showAppointmentsForm'])->name('showAppointmentsForm');
// Route::get('/appointments-services-list',[AppointmentsController::class,'displayServicesInAppointments'])->name('displayServicesInAppointments');
Route::post('submit-appointments',[AppointmentsController::class, 'bookAppointments'])->name('bookAppointments');

// Route for appointments of admin side
Route::get('/appointments-list',[AdminAppointmentsController::class,'showAppointmentsList'])->name('showAppointmentsList');
Route::get('/appointment/{id}/confirm',[AdminAppointmentsController::class,'confirmAppointments'])->name('confirmAppointments');

// Route for products of customer side
Route::post('/add-products',[ProductsController::class,'addProducts'])->name('addProducts');
Route::get('/show-products',[ProductsController::class,'showProducts'])->name('showProducts');
Route::get('/products',[ProductsController::class,'showProductsForm'])->name('showProductsForm');
Route::get('/update/{id}/edit',[ProductsController::class,'showUpdateProductsForm'])->name('showUpdateProductsForm');
Route::post('/update-products/{id}',[ProductsController::class,'updateProducts'])->name('updateProducts');
Route::post('/delete-products',[ProductsController::class,'deleteProducts'])->name('deleteProducts');

// Route for products of admin side
Route::get('/sell-products-form/{customer_id}', [CustomersProductsController::class, 'sellProductsForm'])->name('sellProductsForm');
Route::post('/sell-products/{customer_id}', [CustomersProductsController::class, 'sellProducts'])->name('sellProducts');

Route::get('/booked-hairCutters', [HairCutterController::class, 'getBookHairCutters'])->name('getBookHairCutters');

// Route for DataTables
Route::get('/table-of-services', [ServicesController::class, 'tableServices'])->name('tableServices');
Route::get('/table-of-sub-services', [SubServicesController::class, 'tableSubServices'])->name('tableSubServices');
Route::get('/table-of-appointments', [AdminAppointmentsController::class, 'tableAppointments'])->name('tableAppointments');
Route::get('/table-of-customers', [CustomersController::class, 'tableCustomers'])->name('tableCustomers');
Route::get('/table-of-invoices', [InvoicesController::class, 'tableInvoices'])->name('tableInvoices');
Route::get('/table-of-employees', [EmployeesController::class, 'tableEmployees'])->name('tableEmployees');
Route::get('/table-of-products', [ProductsController::class, 'tableProducts'])->name('tableProducts');

Route::get('/show-customers', [CustomersController::class, 'showCustomers'])->name('showCustomers');
// Route::get('/assignServicesForm', [CustomersController::class, 'assignServicesForm'])->name('assignServicesForm');
Route::get('/assign-services/{id}/assign', [CustomersController::class, 'assignServicesForm'])->name('assignServicesForm');
Route::post('/assign-services/{id}', [CustomersController::class, 'assignServices'])->name('assignServices');

Route::get('/generate-invoice/{customer_id}', [InvoicesController::class, 'generateInvoices'])->name('generateInvoices');

Route::get('/customer/{customer_id}/invoices', [InvoicesController::class, 'showCustomerInvoices'])->name('showCustomerInvoices');
// Route::get('/invoice/{invoice_id}/view', [InvoicesController::class, 'showInvoice'])->name('showInvoice');

Route::get('/invoices-list', [InvoicesController::class, 'showAllInvoices'])->name('showAllInvoices');

Route::get('/service-reports', [ReportsController::class, 'serviceReports'])->name('serviceReports');

Route::get('/dashboard', [AdminController::class, 'dashboardAdmin'])->name('dashboardAdmin');

Route::get('/about-us', [AboutController::class, 'showAboutUs'])->name('showAboutUs');