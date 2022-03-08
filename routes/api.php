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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::post('/email', [\App\Http\Controllers\EmailController::class, 'store']);
//
//Route::post('/notification/email', [\App\Http\Controllers\NotificationController::class, 'send']);
//
//Route::get('/notification/email/template', [\App\Http\Controllers\TemplateController::class, 'index']);
//
//Route::get('/notification/email/template/{template_id}', [\App\Http\Controllers\TemplateController::class, 'get']);


Route::middleware(['after_middleware','authenticate'])->prefix('/notification')->group(function () {

    Route::post('/email', [\App\Http\Controllers\NotificationController::class, 'send']);
    Route::get('/email/template', [\App\Http\Controllers\TemplateController::class, 'index']);
    Route::get('/email/template/{template_id}', [\App\Http\Controllers\TemplateController::class, 'get']);
    Route::post('/sms', [\App\Http\Controllers\SMSController::class, 'send']);
});







