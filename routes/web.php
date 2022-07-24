<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YouthData;
use App\Http\Controllers\Youth_view;
use App\Http\Controllers\PrintController;
use App\Models\Youth;
use App\Models\User;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::get('/',[Youth_view::class ,'show_welcome'])->name('welcome');

// Route::get('/SKform', function () {
//     return view('SKform');
// })->name('SKform')->with('educ');

Route::get('/SKform',[Youth_view::class ,'data2'])->name('SKform');

// Route::get('/Sample', function () {
//     return view('Sample');
// })->name('Sample');

// Route::resource('youth', 'YouthData');
 Route::post('youth',[YouthData::class ,'store']);

 Route::get('/register', function () {
     return view('register');
 })->name('register');


Route::group(['middleware'=> 'auth'],function(){

    Route::get('/dashboardmain',[Youth_view::class ,'show'])->name('dashboardmain');


    Route::get('/search/', [Youth_view::class ,'search'])->name('search');
    Route::get('/searchme/', [Youth_view::class ,'searchme'])->name('searchme');

    Route::get('click_edit/{id}',[YouthData::class ,'edit_function']);
    // Route::delete('/nieuws/{id}', [YouthData::class ,'destroy'])->name('nieuws.destroy');
    Route::delete('youth-delete/{id}', [YouthData::class ,'destroy']);

    Route::post('announceEDIT',[YouthData::class ,'update_function1'])->name('announceEDIT');
    Route::post('update-user/{id}',[YouthData::class ,'update_function'])->name('update-user');
    Route::get('/charts',[Youth_view::class ,'tables']);

    Route::get('/export',[PrintController::class ,'export']);
    Route::get('/prnpriview',[PrintController::class ,'prnpriview']);

    // Route::get('/charts', function () {
    //     return view('charts');
    // });
    // Route::get('/tables', function () {
    //     return view('tables');
    // });
    Route::get('/tables',[Youth_view::class ,'data1']);

    Route::get('/Edit', function () {
    return view('Edit');
});

});



require __DIR__.'/auth.php';
