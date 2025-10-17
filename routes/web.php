<?php

use App\Http\Controllers\ToDoListController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     dd('halo');
// });

Route::group(['prefix' => 'api/v1/todolist'], function () {
    Route::post('/', [ToDoListController::class, 'createToDoList']);
    Route::get('/', [ToDoListController::class, 'generateExcelReport']);
    Route::get('/chart', [ToDoListController::class, 'getChartData']);
});
