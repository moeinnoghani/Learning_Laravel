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


Route::middleware(['after_middleware', 'authenticate'])->prefix('/notification')->group(function () {

    Route::post('/email', [\App\Http\Controllers\NotificationController::class, 'send']);
    Route::get('/email/template', [\App\Http\Controllers\TemplateController::class, 'index']);
    Route::post('/email/template', [\App\Http\Controllers\TemplateController::class, 'store']);
    Route::get('/email/template/{template_id}', [\App\Http\Controllers\TemplateController::class, 'get']);
    Route::put('/email/template/{template_id}', [\App\Http\Controllers\TemplateController::class, 'update']);
    Route::post('/sms', [\App\Http\Controllers\SMSController::class, 'send']);
});

Route::post('/testServices', function (Request $request) use (&$newCredit, &$sumOfServiceAmounts, &$credit) {
    $services = $request->services;
    $credit = $request->credit;
    sort($services);

    $sumOfServiceAmounts;
    $newCredit;


    for ($i = 0; $i < count($services); $i++) {
        for ($j = $i; $j < count($services); $j++) {
            $sumOfServiceAmounts += $services[$j];
        }


        $exTime = round($credit / $sumOfServiceAmounts);
        $credit = $credit - ($exTime * $services[$i]);

        printf('Service ' . $services[$i] . '$ ' . 'will be expire after' . round($exTime) . PHP_EOL . PHP_EOL);

        $sumOfServiceAmounts = 0;

    }


});

Route::get('/serviceHours/{id}', [\App\Http\Controllers\UserController::class, 'getServicesHours']);







