<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
use Illuminate\Http\Request;
use App\Models\todolist;
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

Route::get('/', function () {
    $tasks = todolist::orderBy('created_at', 'asc')->get();

    return view('welcome', [
        'todolist' => $tasks
    ]);
});


Route::post('/saveItemRoute', [TodoListController::class, 'saveItem'])->name('saveItem');
Route::post('/markItemRoute/{id}', [TodoListController::class, 'markItem'])->name('markItem');
Route::delete('/deleteItemRoute/{id}', [TodoListController::class, 'deleteItem'])->name('deleteItem');
