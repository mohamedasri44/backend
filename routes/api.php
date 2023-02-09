<?php

use App\Http\Controllers\Api\V1\ClientController;
use App\Http\Controllers\Api\V1\SdaController;
use Illuminate\Support\Facades\Route;





Route::group(['prefix' => 'v1'], function () {

    Route::apiResource('clients', ClientController::class);
    Route::apiResource('sdas', SdaController::class);
});
