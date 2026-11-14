<?php

use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('servicios.index');
});

Route::resource('servicios', ServicioController::class);
