<?php

use Illuminate\Support\Facades\Route;



Route::get('',function(){
return view('layouts.dashboard');
});
Route::get('/home',function(){
return view('layouts.home');
});
