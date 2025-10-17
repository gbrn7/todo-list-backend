<?php

use App\Http\Controllers\ToDoListController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     dd('halo');
// });

Route::group(['prefix' => 'api/v1'], function () {
    Route::post('/todolist', [ToDoListController::class, 'createToDoList']);
});
