<?php

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

Route::get("/", function () {
    return "API Index! Happy day to you!";
});

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->post('/logout', 'AuthController@logout');

Route::middleware('auth:api')->group(function () {
    Route::get("/todos", 'TodosController@index');
    Route::post("/todos", 'TodosController@store');
    Route::patch("/todos/{todo}", 'TodosController@update');
    Route::delete("/todos/{todo}", 'TodosController@destroy');

    Route::patch("/todosCheckAll", 'TodosController@updateAll');
    Route::delete("/todosDeleteAll", 'TodosController@destroyAll');
});
