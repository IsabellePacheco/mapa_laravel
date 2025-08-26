<?php
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MapsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return redirect()->route('locations.index');
});
Route::resource('locations', LocationController::class);


Route::get('/maps', [MapsController::class, 'index'])->name('maps.index');