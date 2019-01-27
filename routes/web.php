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


Route::get('customer','HomeController@Customer');
Route::get('/',['middleware' => 'auth', 'uses' =>  'HomeController@index']);
Route::get('profile/{id}',['middleware' => 'auth', 'uses' =>  'HomeController@Profile']);
Route::get('Delete-Account/{id}',['middleware' => 'auth', 'uses' =>  'HomeController@DeleteAccount']);
Route::get('search',['middleware' => 'auth', 'uses' =>  'HomeController@Search']);
Route::get('Edit-Profile/{id}',['middleware' => 'auth', 'uses' =>  'HomeController@EditProfile']);
Route::post('AddPost',['middleware' => 'auth', 'uses' =>  'HomeController@AddPost']);
Route::post('postLike',['middleware' => 'auth', 'uses' =>  'HomeController@postLike']);
Route::post('postDisLike',['middleware' => 'auth', 'uses' =>  'HomeController@postDisLike']);
Route::post('AddFriend',['middleware' => 'auth', 'uses' =>  'HomeController@AddFriend']);
Route::post('DeleteFriend',['middleware' => 'auth', 'uses' =>  'HomeController@DeleteFriend']);
Route::post('UpdateProfile',['middleware' => 'auth', 'uses' =>  'HomeController@UpdateProfile']);
Route::post('PostShare',['middleware' => 'auth', 'uses' =>  'HomeController@PostShare']);



Route::get('complete-registration',['middleware' => 'auth', 'uses' =>  'HomeController@CompleteRegister']);
Route::post('PostCompleteRegister',['middleware' => 'auth', 'uses' =>  'HomeController@PostCompleteRegister']);



Route::get('login',['middleware' => 'guest', 'uses' =>  'Auth\AuthController@getLogin']);
Route::get('register',['middleware' => 'guest', 'uses' =>  'Auth\AuthController@getRegister']);
Route::post('postLogin',['middleware' => 'guest', 'uses' =>  'Auth\AuthController@postLogin']);
Route::post('postRegister',['middleware' => 'guest', 'uses' =>  'Auth\AuthController@postRegister']);
Route::get('logout',['middleware' => 'auth',function(){
    Auth::logout();
    return redirect('/');
}]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
