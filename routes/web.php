<?php

use App\Http\Controllers\CommonAddressController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\VillageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CasteController;
use App\Http\Controllers\KootamController;
use App\Http\Controllers\VageraController;
use App\Http\Controllers\TaxListController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\TaxPayersController;
use App\Http\Controllers\TempleUserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ExpenseTypeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes(['register' => false , 'reset' => false]);

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::resource('castes', CasteController::class);
        Route::resource('kootams', KootamController::class);
        Route::resource('vageras', VageraController::class);
        Route::resource('temple-users', TempleUserController::class);
        Route::resource('tax-lists', TaxListController::class);
        Route::get('all-tax-payers', [
            TaxPayersController::class,
            'index',
        ])->name('all-tax-payers.index');
        Route::post('all-tax-payers', [
            TaxPayersController::class,
            'store',
        ])->name('all-tax-payers.store');
        Route::get('all-tax-payers/create', [
            TaxPayersController::class,
            'create',
        ])->name('all-tax-payers.create');
        Route::get('all-tax-payers/{taxPayers}', [
            TaxPayersController::class,
            'show',
        ])->name('all-tax-payers.show');
        Route::get('all-tax-payers/{taxPayers}/edit', [
            TaxPayersController::class,
            'edit',
        ])->name('all-tax-payers.edit');
        Route::put('all-tax-payers/{taxPayers}', [
            TaxPayersController::class,
            'update',
        ])->name('all-tax-payers.update');
        Route::delete('all-tax-payers/{taxPayers}', [
            TaxPayersController::class,
            'destroy',
        ])->name('all-tax-payers.destroy');
        Route::get('all-tax-payers-invoice-download/{taxPayers}', [
            TaxPayersController::class,
            'downloadInvoice',
        ])->name('all-tax-payers.invoice-download');

        Route::resource('donations', DonationController::class);
        Route::get('donations-invoice-download/{donation}', [
            DonationController::class,
            'downloadInvoice',
        ])->name('donations.invoice-download');
        Route::post('pending-tax-details', [
            TaxPayersController::class,
            'getPendingTaxDetails',
        ])->name('donations.pending-tax');
        Route::resource('expense-types', ExpenseTypeController::class);
        Route::resource('expenses', ExpenseController::class);
        Route::resource('villages', VillageController::class);
        Route::get('get-states/{countryId}', [CommonAddressController::class, 'getStates']);
        Route::get('get-cities/{cityId}', [CommonAddressController::class, 'getCities']);
        Route::get('get-villages/{cityId}', [CommonAddressController::class, 'getVillages']);

        Route::get('donation-report', [ReportsController::class, 'getDonationReport'])->name('donation.report')->can('donations report');
        Route::get('pay-tax-report', [ReportsController::class, 'getPayTaxReport'])->name('pay-tax.report')->can('paytax report');
        Route::get('pay-tax-report-details/{userId}/{payTaxId}', [ReportsController::class, 'getPayTaxReportDetails'])->name('pay-tax-details.report')->can('paytax report');
        Route::get('expenses-report', [ReportsController::class, 'getExpenseReport'])->name('expense.report')->can('expenses report');
        Route::get('temple-users-report', [ReportsController::class, 'getTempleUserReport'])->name('temple-user.report')->can('temple users report');
        Route::get('ledger-report', [ReportsController::class, 'getLedgerReport'])->name('ledger.report')->can('ledger report');
        Route::get('pending-pay-tax-report', [ReportsController::class, 'getPendingPayTaxReport'])->name('pending-pay-tax.report')->can('paytax report');
    });
