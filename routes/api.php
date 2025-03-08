<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursePersonController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('change-password', [AuthController::class, 'changePassword']);
    Route::post('certificates/download/{id}', [PdfController::class, 'certPdfDownload']);

    Route::apiResources([
        'users' => PersonController::class,
        'photos' => PhotoController::class,
        'courses' => CourseController::class,
        'teachers' => TeacherController::class,
        'certificates' => CertificateController::class,
        'course-and-person' => CoursePersonController::class,
    ]);
});
