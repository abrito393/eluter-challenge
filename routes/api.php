<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Jobs\Webhooks\ProcessEluterWebhooksData;
use App\Http\Controllers\EluterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/push/eluter/actions/{id}', [EluterController::class, 'pushEluterActions']);

Route::post('/webhooks/eluter', [ProcessEluterWebhooksData::class, 'handle']);