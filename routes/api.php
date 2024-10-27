<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('change-password', [AuthController::class, 'changePassword']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::apiResources([
        'courses' => CourseController::class,
        'students' => PersonController::class,
        'teachers' => TeacherController::class,
        'certificates' => CertificateController::class,
    ]);
});
