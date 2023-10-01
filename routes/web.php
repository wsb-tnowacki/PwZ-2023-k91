<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout');
}); 
Route::get('/kontakt', function () {
    return view('ogolny.kontakt');
}); 
Route::get('/onas', function () {
    $zadania = [
        'Zadanie 1',
        'Zadanie 2',
        'Zadanie 3'
    ];
    //return view('ogolny.onas',['zadania' => $zadania]);
    return view('ogolny.onas')->with(['zadania' => $zadania]);
}); 