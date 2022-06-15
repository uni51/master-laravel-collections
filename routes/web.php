<?php

use App\Http\Controllers\CollectionController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('collections/average', [CollectionController::class, 'average']);
Route::get('collections/contains', [CollectionController::class, 'contains']);
Route::get('collections/sum', [CollectionController::class, 'sum']);
Route::get('collections/count', [CollectionController::class, 'count']);
Route::get('collections/count-by', [CollectionController::class, 'countBy']);
Route::get('collections/filter', [CollectionController::class, 'filter']);
Route::get('collections/reject', [CollectionController::class, 'reject']);
Route::get('collections/skip', [CollectionController::class, 'skip']);
Route::get('collections/skip-until', [CollectionController::class, 'skipUntil']);
Route::get('collections/skip-while', [CollectionController::class, 'skipWhile']);
Route::get('collections/first', [CollectionController::class, 'first']);
Route::get('collections/last', [CollectionController::class, 'last']);
Route::get('collections/sort', [CollectionController::class, 'sort']);
Route::get('collections/sort-by', [CollectionController::class, 'sortBy']);
Route::get('collections/min', [CollectionController::class, 'min']);
Route::get('collections/max', [CollectionController::class, 'max']);
