<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\CourseController;
use \App\Http\Controllers\LessonController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\UserDocumentController;
use \App\Http\Controllers\LiveTeachingController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('courses', CourseController::class)->only([
    'index', 'show'
]);

Route::resource('courses.lessons', LessonController::class)->only([
    'show'
]);

Route::get('live-teaching', [LiveTeachingController::class, 'index'])->name('live-teaching.index');
Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class)->only([
        'show', 'update'
    ]);
    
    Route::resource('users-courses', UserCourseController::class)->only([
        'store', 'update'
    ]);

    Route::resource('users-documents', UserDocumentController::class)->only([
        'store'
    ]);

    Route::resource('reviews', ReviewController::class)->only([
        'store', 'update'
    ]);
    Route::get('live-teaching/start-live', [LiveTeachingController::class, 'startLive'])->name('live-teaching.start-live');
    Route::get('live-teaching/join-live/{id}', [LiveTeachingController::class, 'joinLive'])->name('live-teaching.join-live');
    Route::put('live-teaching/off-live', [LiveTeachingController::class, 'offLive'])->name('live-teaching.off-live');
});

Auth::routes();
