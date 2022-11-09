<?php

use App\Http\Controllers\coursecontroller;
use App\Http\Controllers\lecturerscontroller;
use App\Http\Controllers\nominalrollcontroller;
use App\Http\Controllers\pagescontroller;
use App\Http\Controllers\pdfcontroller;
use App\Http\Controllers\ratingcontroller;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
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

Route::get('/lecturer', function () {
    return view('welcomelec');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'lecturer'])->group(function () {
Route::resource('/course',coursecontroller::class);
Route::get('/viewstat/{id}',[ratingcontroller::class,'viewStat'])->name('viewstat');

Route::get('/downloadpdf/{id}',[pdfcontroller::class,'generatePDF'])->name('downloadpdf');
Route::get('/viewrating',[ratingcontroller::class,'viewRating'])->name('viewrating');
Route::get('/lecs',[pagescontroller::class,'lec'])->name('lecs');  
});

Route::get('/student',[pagescontroller::class,'student'])->name('student')->middleware('auth');
Route::POST('/studentnominal',[pagescontroller::class,'studentnominal'])->name('studentnominal')->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {

Route::resource('/nominal',nominalrollcontroller::class);
Route::resource('/lec',lecturerscontroller::class); 
Route::get('/admins',[pagescontroller::class,'admin'])->name('admins');

});
Route::middleware(['auth', 'nominal'])->group(function () {

Route::get('/gorate',[pagescontroller::class,'gorate'])->name('gorate');
Route::POST('/rate',[ratingcontroller::class,'rate'])->name('rate');
Route::resource('/course',coursecontroller::class)->only('show');
});