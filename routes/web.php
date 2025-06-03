<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AjaxCall;
use App\Http\Controllers\mobile\Authentication;
use App\Http\Controllers\mobile\UserController;
use App\Http\Controllers\mobile\CustomerTransactionController;
use App\Http\Controllers\BulkImport;
use App\Http\Controllers\InwardStock;
use App\Http\Controllers\LeadManagement;
use App\Http\Controllers\Masters;
use App\Http\Controllers\OrderManagement;
use App\Http\Controllers\ResetSoftware;
use App\Http\Controllers\Sales;
use App\Http\Controllers\StockReport;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Support\Facades\Route;

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

Route::get('/Clear', function () {

    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";
});

Route::get('reset-software/{key}', [ResetSoftware::class, 'ResetSoftware'])->name('reset-software');
Route::post('ResetSoftware', [ResetSoftware::class, 'ResetSoft'])->name('ResetSoftware');


Route::get('/login', [Authentication::class, 'user'])->name('login');
Route::post('/user', [Authentication::class, 'user_login'])->name('user.login');

Route::middleware(['verify_user'])->group(function () 
{
    Route::get('/dashboard', [Authentication::class, 'showDashboard'])->name('dashboard.view');
    Route::post('/my-business', [UserController::class, 'my_business'])->name('user.business');
    Route::post('/filter-customers', [UserController::class, 'filter_customer'])->name('user.filter');
    Route::post('/add-customers', [UserController::class, 'add_customers'])->name('add.customers');
    Route::get('logout', [Authentication::class, 'logout'])->name('Logout');

    Route::get('/transaction/{id}', [CustomerTransactionController::class, 'view_transaction'])->name('view.transaction');
    Route::get('/transaction-detail/{id}', [CustomerTransactionController::class, 'view_transaction_detail'])->name('view.transaction_detail');
    Route::delete('/transaction/{id}', [CustomerTransactionController::class, 'destroy'])->name('transaction.delete');
    Route::put('/transaction/{id}', [CustomerTransactionController::class, 'update'])->name('transaction.update');
    Route::put('/customer/{id}', [CustomerTransactionController::class, 'customer_update'])->name('customer.update');
    Route::delete('/customer/delete/{id}', [CustomerTransactionController::class, 'customer_delete'])->name('customer.delete');
    Route::post('/gave-money', [CustomerTransactionController::class, 'gave_money'])->name('gave.money');
});