<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use Illuminate\Http\Request;
use App\Http\Middleware\VerifyCsrfToken;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/token', function (Request $request) {
    $token = $request->sesion()->token();
    $token = csrf_token();
});

Route::get('/', [TasksController::class, 'showTasks']);

Route::post('delete', [TasksController::class, 'deleteTask']);

Route::post('add', [TasksController::class, 'addTask']);

Route::post('edit', [TasksController::class, 'editTask']);
