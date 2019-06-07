<?php




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/verifyOTP','VerifyOTPController@showVerifyForm');
Route::post('/verifyOTP','VerifyOTPController@verify');
// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'TwoFA'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
});

