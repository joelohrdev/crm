<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/clients', function () {
        return view('client.index');
    })->name('client.index');
    Route::get('/clients/{client:slug}', [
        ClientController::class, 'show',
    ])->name('client.show');

    Route::Get('/contacts', function () {
        return view('contact.index');
    })->name('contact.index');
    Route::get('/contacts/{contact:slug}', [
        ContactController::class, 'show',
    ])->name('contact.show');
});
