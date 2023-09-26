<?php

// use Illuminate\Support\Facades\Route\Auth;
// use Illuminate\Support\Facades\Auth;
// class Auth extends Illuminate\Support\Facades\Auth
class Route extends Illuminate\Support\Facades\Route
{
}
class Artisan extends Illuminate\Support\Facades\Artisan
{
}
class Auth extends Illuminate\Support\Facades\Auth
{
}


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

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/', function () {
    return view('welcome');
});
//['verify' => true]
//middleware('verified')
Route::get('/dashboard', function () {
    return  'dashboard';
});
