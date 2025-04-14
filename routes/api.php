<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;

Route::post('login', [AuthController::class, 'login']);
Route::post('user-register', [UserController::class, 'register']);
Route::post('users/reset-password', [ResetPasswordController::class, 'reset']);
Route::post('users/verification-code', [UserController::class, 'verificationCode']);
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::put('users/{id}/password', [UserController::class, 'changePassword']);
    Route::post('certificates/download/{id}', [PdfController::class, 'certPdfDownload']);

    Route::apiResources([
        'users' => PersonController::class,
        'photos' => PhotoController::class,
        'courses' => CourseController::class,
        'certificates' => CertificateController::class,
    ]);
});
