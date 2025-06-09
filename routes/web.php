<?php

use App\Http\Controllers\backend\Admin;
use App\Http\Controllers\backend\Authentication as backendAuth;
use App\Http\Controllers\backend\Masters;
use App\Http\Controllers\backend\TransactionController;
use App\Http\Controllers\mobile\Authentication;
use App\Http\Controllers\mobile\CustomerTransactionController;
use App\Http\Controllers\mobile\UserController;
use App\Http\Controllers\ResetSoftware;
use App\Models\Transaction;
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


Route::get('/', [backendAuth::class, 'SuperAdmin'])->name('/');
Route::post('/', [backendAuth::class, 'SuperAdminLogin'])->name('SuperAdminLogin');
Route::post('GetCity', [Masters::class, 'GetCity'])->name('GetCity');

Route::group(['prefix' => 'v1'], function () {

    Route::group(['middleware' => ['SuperAdmin']], function () {

        Route::get('dashboard', [Admin::class, 'Dashboard'])->name('dashboard');
        Route::get('settings', [Masters::class, 'settings'])->name('settings');
        Route::post('SaveSettings', [Masters::class, 'SaveSettings'])->name('SaveSettings');
        Route::get('logout', [Authentication::class, 'logout'])->name('Logout');
        Route::post('GetUserDetails', [Masters::class, 'GetUserDetails'])->name('GetUserDetails');
        Route::get('users', [Masters::class, 'users'])->name('users');
        Route::post('SaveUser', [Masters::class, 'SaveUser'])->name('SaveUser');
        Route::post('SaveTeam', [Masters::class, 'SaveTeam'])->name('SaveTeam');
        Route::get('user-role', [Masters::class, 'UserRole'])->name('user-role');
        Route::post('SaveRole', [Masters::class, 'SaveRole'])->name('SaveRole');
        Route::get('user-permission/{id}', [Masters::class, 'UserPermission'])->name('user-permission');
        Route::post('SaveUserPermission', [Masters::class, 'SaveUserPermission'])->name('SaveUserPermission');
        Route::post('RemovePermission', [Masters::class, 'RemovePermission'])->name('RemovePermission');

        // ajax call
        Route::post('StartDay', [Admin::class, 'StartDay'])->name('StartDay');
        Route::post('EndDay', [Admin::class, 'EndDay'])->name('EndDay');
        Route::get('profile', [Admin::class, 'Profile'])->name('profile');
        Route::post('SaveProfile', [Admin::class, 'SaveProfile'])->name('SaveProfile');

        // masters
        Route::get('customers', [Masters::class, 'Customers'])->name('customers');
        Route::post('SaveCustomer', [Masters::class, 'SaveCustomer'])->name('SaveCustomer');

        //supplier
        Route::get('supplier',[Masters::class,'supplier'])->name('suppliers');

        // masters
        Route::get('vendor', [Masters::class, 'vendor'])->name('vendor');
        Route::post('SaveVendor', [Masters::class, 'SaveVendor'])->name('SaveVendor');

        // ************************************Transaction Routes**************************************
        Route::post('save-transaction',[TransactionController::class,'saveTransaction'])->name('saveTransaction');
        Route::get('transactions',[TransactionController::class,'transactions'])->name('transactions');
        Route::Post('view-transactions',[TransactionController::class,'viewTransactions'])->name('viewTransaction');
        Route::post('edit-transaction',[TransactionController::class,'editTransaction'])->name('edit_transaction');
        Route::delete('/transaction/delete/{id}', [TransactionController::class, 'deleteTransaction'])->name('transaction.delete');
    });

});


Route::middleware(['verify_user'])->group(function () {
    Route::get('/dashboard', [Authentication::class, 'showDashboard'])->name('dashboard.view');
    Route::post('/my-business', [UserController::class, 'my_business'])->name('user.business');
    Route::post('/filter-customers', [UserController::class, 'filter_customer'])->name('user.filter');
    Route::post('/add-customers', [UserController::class, 'add_customers'])->name('add.customers');

    Route::get('/transaction/{id}', [CustomerTransactionController::class, 'view_transaction'])->name('view.transaction');
    Route::get('/transaction-detail/{id}', [CustomerTransactionController::class, 'view_transaction_detail'])->name('view.transaction_detail');
    Route::delete('/transaction/{id}', [CustomerTransactionController::class, 'destroy'])->name('transaction.delete');
    Route::put('/transaction/{id}', [CustomerTransactionController::class, 'update'])->name('transaction.update');
    Route::put('/customer/{id}', [CustomerTransactionController::class, 'customer_update'])->name('customer.update');
    Route::delete('/customer/delete/{id}', [CustomerTransactionController::class, 'customer_delete'])->name('customer.delete');
    Route::post('/gave-money', [CustomerTransactionController::class, 'gave_money'])->name('gave.money');
    Route::get('/customer/{id}/pdf-report', [CustomerTransactionController::class, 'generate_pdf_report'])->name('generate.pdf.report');
    Route::get('/generate-report/{id}', [CustomerTransactionController::class, 'generate_report'])->name('generate.report');
});
