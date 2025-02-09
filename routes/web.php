<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SectionController;
use App\Models\Products;

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
    return view('auth.login');
});


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('invoices', InvoiceController::class);
Route::resource('section', SectionController::class);
Route::resource('InvoiceAttachments', InvoiceAttachmentsController::class);
Route::resource('products', ProductsController::class);
Route::get('/invoice_Paid', [InvoiceController::class, 'Invoice_Paid']);
Route::get('/invoice_unpaid', [InvoiceController::class, 'Invoice_unpaid']);
Route::get('/invoice_Partial', [InvoiceController::class, 'Invoice_partial']);
Route::get('/Status_show/{id}', [InvoiceController::class, 'shows'])->name('Status_show');
Route::post('/Status_Update/{id}', [InvoiceController::class, 'Status_Update'])->name('Status_Update');
Route::get('/InvoicesDetails/{id}', [InvoicesDetailsController::class, 'edit']);
Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'get_file']);
Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'open_file']);
Route::post('/delete_file', [InvoicesDetailsController::class, 'destroy'])->name('delete_file');
Route::get('/edit_invoice/{id}', [InvoiceController::class, 'edit']);
Route::resource('Archive', InvoiceAchiveController::class);
Route::get('Print_invoice/{id}', [InvoiceController::class, 'Print_invoice']);
Route::group(['middleware' => ['auth']], function () {

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
Route::get('invoices_report', [Invoices_Report::class, 'index']);

Route::post('Search_invoices', [Invoices_Report::class, 'Search_invoices']);

Route::get('customers_report', [Customers_Report::class, 'index'])->name("customers_report");

Route::post('Search_customers', [Customers_Report::class, 'Search_customers']);
Route::get('MarkAsRead_all', [InvoiceController::class, 'MarkAsRead_all'])->name('MarkAsRead_all');


Route::get('/{page}', [AdminController::class, 'index']);
