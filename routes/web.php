<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\MailController;
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

Route::get('/', IndexController::class);
Route::post('/', [MailController::class, 'send'])->name('send');
Route::get('/{uuid}/success', [MailController::class, 'success'])->name('success');
