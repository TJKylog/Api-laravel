<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', [\App\Http\Controllers\PeopleController::class, 'login']);
Route::post('signup', [\App\Http\Controllers\PeopleController::class, 'signup']);

Route::group([
        'middleware' => 'auth:api'
    ], 
    function() {
        Route::get('getCredentialInfo', [\App\Http\Controllers\PeopleController::class, 'getCredentialInfo']);
        Route::get('getExtraInfo', [\App\Http\Controllers\PeopleController::class, 'getExtraInfo']);
    }
);
