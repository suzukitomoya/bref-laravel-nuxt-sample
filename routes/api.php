<?php

use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/users', function () {
    return \Illuminate\Support\Facades\Response::json([
        'users' => [
            ['id' => 1, 'name' => 'user1'],
            ['id' => 2, 'name' => 'user2'],
        ],
    ]);
});
Route::get('/phpinfo', function () {
    phpinfo();
});
