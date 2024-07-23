<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\AuthController;
use App\Http\Middleware\HandleModelNotFound;
use App\Exceptions\ModelNotFoundException;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

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

Route::post("login", [AuthController::class, 'store']);
// Define resource route for tasks
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('tasks', TaskController::class);
});
