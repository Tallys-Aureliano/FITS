<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

Route::post('/events', [EventController::class,'store']);
Route::get('/',[EventController::class, 'index']);
Route::get('/events/create',[EventController::class, 'create'])->middleware('auth');
Route::get('/events/{id}', [EventController::class,'show']);
Route::delete('/events/{id}', [EventController::class,'destroy'])->middleware('auth');
Route::get('/events/edit/{event}', [EventController::class,'edit'])->middleware('auth')->name('serv.edit');
Route::put('/events/update/{event}', [EventController::class,'update'])->middleware('auth')->name('serv.upd');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard',[EventController::class, 'dashboard'])->middleware('auth');

