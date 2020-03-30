<?php


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
    return view('auth.login');
});

Route::get('/main', function () {
    return view('main');
});

Auth::routes();

// Route::get('/login','LoginController@show')->name('login')->middleware('guest');
// Route::get('/register', 'RegistrationController@show')
//     ->name('register')
//     ->middleware('guest');

//     Route::post('/login', 'LoginController@authenticate')->name('login');
//     Route::post('/register', 'RegistrationController@register');




Route::group(['middleware' => 'auth'], function () {
    Route::resource('members', 'MembersController');

    Route::post('/logout', 'LoginController@logout')->name('logout');
});


Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('raffle-setting/{id}', 'RaffleSettingsController@getByPrizeId');
    // your routes
    Route::get('/currentPrize', 'RafflePromoController@currentPrize');
    Route::get('/raffle-draw', 'HomeController@index')->name('home');
    Route::get('/raffle-draw', 'HomeController@index')->name('raffle-draw');
    Route::get('/participant', 'MembersController@registered')->name('participant');
    Route::get('/winners-list', 'MembersController@winners')->name('winners');
    Route::get('/raffle-prize-list', 'RafflePromoController@rafflePrizeList');
    Route::get('/raffleSetting/{id}', 'RaffleSettingsController@getByPrizeId');
    Route::get('/setAsActive/{id}', 'RafflePromoController@setAsActive');



    Route::resource('users', 'UserController');
    Route::get('deactivate-user/{id}', 'UserController@deactivate');
    Route::get('activate-user/{id}', 'UserController@activate');

    Route::resource('raffle-promo', 'RafflePromoController');

    Route::post('raffle-setting', 'RaffleSettingsController@store');

    Route::resource('members', 'MembersController');
    Route::get("register-member/{id}","MembersController@register");
    Route::get("unregister-member/{id}","MembersController@unregister");
    Route::get('registered_members', 'MembersController@registered');
    Route::get('winners', 'MembersController@winners');
    Route::get('tagAsWinner/{id}', 'MembersController@tagAsWinner');
    Route::get('notWinners', 'MembersController@notWinners')->name('notWinners');

});


Route::get('/home', 'HomeController@index')->name('home');
