<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();

// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tes', function (Request $request){
    return response()->json([
        'This Trying Proggram']);
});

// Route::post('auth/login', function (Request $request) {
//     return response()->json(['Psn' => 'Gagal']);
// });

Route::group(['prefix' =>'auth'],function ()
{
    Route::group(['middleware' => ['guest:api']], function()
    {
        Route::post('login', 'Auth\AuthApi@login')->name('login');
        Route::post('register', 'Auth\AuthApi@register');
    });

});
// Route::post('auth/login', 'Auth\AuthApi@login');
// Route::post('auth/register', 'Auth\AuthApi@register');

// Route::get('auth/logout', 'Auth\AuthApi@logout');

Route::group(['middleware' => ['auth:api']], function() {
    Route::get('auth/logout', 'Auth\AuthApi@logout');
    Route::get('auth/user', 'Auth\AuthApi@user');
    // Route::get('auth/book', 'Auth\AuthApi@buku');
    Route::get('auth/book', 'api\bookap@index');
    Route::get('auth/anggota', 'api\anggotaap@index');
    // Route::post('auth/addbuku', 'api\bookap@store');


    // Route::post('auth/addbuku', 'Auth\AuthApi@addbuku');
});
// Route::group(['middleware' => ['auth:api']], function() {
    //     Route::get('auth/logout', 'Api\AuthController@logout');
    // });
    Route::post('auth/uploadimg}', 'Auth\AuthApi@imguser');

    Route::post('auth/updatebuku/{id}', 'api\bookap@update');
    Route::get('auth/editbuku/{id}', 'api\bookap@edit');
    Route::post('auth/addbuku', 'api\bookap@store');
    // Route::get('auth/book', 'Auth\AuthApi@buku');
    Route::delete('auth/hapusdong/{id}', 'api\bookap@destroy');


