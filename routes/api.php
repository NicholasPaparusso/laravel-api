<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectsController;
use App\Http\Controllers\Api\LeadController;
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


Route::namespace('Api')
    ->prefix('projects')
    ->group(function(){
        Route::get('/', [ProjectsController::class, 'index']);
        Route::get('/searchbytype/{id}', [ProjectsController::class, 'searchByType']);
        Route::get('/searchbytech/{id}', [ProjectsController::class, 'searchByTechnology']);
        Route::get('/{slug}', [ProjectsController::class, 'show']);
        Route::post('/search',[ProjectsController::class, 'search']);
    });

Route::post('/contacts',[LeadController::class,'store']);
