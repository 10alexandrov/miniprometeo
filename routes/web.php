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

Auth::routes([
    'register' => false
]);

Route::get('/', function () {
    $error = session()->get('error');
    if (Auth::check()) {
        return redirect()->route('home')->with('error', $error);
    }
    return redirect('/login');
});

Route::get('/home', function () {
    return view('plantilla.plantilla');
})->name('home')->middleware(['auth', 'check.processor']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
