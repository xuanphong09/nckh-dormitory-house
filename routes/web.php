<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/feedback/create', [FeedbackController::class, 'create']);
Route::post('/feedback/store', [FeedbackController::class, 'store']);
Route::get('/feedback/pending', [FeedbackController::class, 'listPending']);
Route::post('/feedback/process/{id}', [FeedbackController::class, 'process']);
Route::get('/feedback/all', [FeedbackController::class, 'listAll']);
