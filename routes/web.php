<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('layouts.dashboard');
});

Route::get('/home', function () {
    return view('layouts.home');
});

Route::prefix('students')->controller(StudentController::class)->group(function () {
    Route::get('', 'index')->name('students.index');
    Route::get('/create', 'create')->name('students.create');  // ✅ تأكد من هذا
    Route::post('', 'store')->name('students.store');
    Route::get('/{student}/edit', 'edit')->name('students.edit');
    Route::put('/{student}', 'update')->name('students.update');
    Route::delete('/{student}', 'destroy')->name('students.destroy');
    Route::put('/{id}/restore', 'restore')->name('students.restore');
});
