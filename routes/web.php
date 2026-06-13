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
    Route::get('', 'index')->name('students.index');           // تعديل
    Route::get('/create', 'create')->name('student');          // تعديل
    Route::post('', 'store')->name('students.store');
    Route::get('/{student}/edit', 'edit')->name('students.edit');  // تعديل
    Route::put('/{student}', 'update')->name('students.update');
    Route::delete('/{student}', 'destroy')->name('students.destroy'); // إضافة جديدة
    Route::put('/{id}/restore', 'restore')->name('students.restore'); // إضافة جديدة
});
