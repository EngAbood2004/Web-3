<?php

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/AA/{id}', function ($id) {
    return view('welcome.welcome', ['id' => $id]);
});
Route::get('/BB', function () {
    return view('index');
});
