<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AjaxCall;
use App\Http\Controllers\mobile\Authentication;
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
    Route::get('logout', [Authentication::class, 'logout'])->name('Logout');
});