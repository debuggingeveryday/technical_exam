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

Route::get('commission', [CommissionReportController::class, 'index'])->name('comission');
Route::get('distributor', [TopDistributorController::class, 'index'])->name('distributor');
