<?php

use App\Http\Controllers\Api\v1\OrderController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'v1',

], function ($router) {

    $router->group(['prefix' => 'order'], function ($router){
        $router->post('/index', [OrderController::class, 'index']);
        $router->post('/create', [OrderController::class, 'create']);
    });
});
