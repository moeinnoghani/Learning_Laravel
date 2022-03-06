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
Route::post('/email', [\App\Http\Controllers\EmailController::class, 'store']);

Route::post('/notification', [\App\Http\Controllers\NotificationController::class, 'send']);

Route::get('/notification/template', [\App\Http\Controllers\TemplateController::class, 'index']);

Route::get('/notification/template/{template_id}', [\App\Http\Controllers\TemplateController::class, 'get']);

Route::post('/sms', [\App\Http\Controllers\SMSController::class, 'send']);




