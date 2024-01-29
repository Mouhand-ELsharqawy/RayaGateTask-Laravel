<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductController::class)->group(function(){
    Route::get('/product','index');
    Route::post('/product','store');
    Route::get('/product/{id}','show');
    Route::patch('/product/{id}','update');
    Route::delete('/product/{id}','destroy');
});