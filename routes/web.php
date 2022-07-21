<?php

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

/* RUTA POR DEFECTO*/
/*Route::get('/', function () {
    return view('welcome');
});*/


/*REDICCIONAR AL LOGIN*/
Route::get('/', function () {
    return view('auth.login');
});


/*RUTA CLIENTES */
Route::resource('clientes', 'App\Http\Controllers\ClienteController');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
