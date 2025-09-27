<?php

use App\Http\Controllers\CommissionReportController;
use App\Http\Controllers\TopDistributorController;
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
    return view('index');
})->name('index');

Route::controller(CommissionReportController::class)->group(function () {
    Route::get('/commission', 'index')->name('commission.index');
});

Route::get('distributor', [TopDistributorController::class, 'index'])->name('distributor');
