<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordEmailLinkRequest;
use App\Services\ForgetPasswordService;

class ForgotPasswordController extends Controller
{
    public function __construct(protected ForgetPasswordService $forgetPasswordService)
    {
    }

    public function sendResetLinkEmail(ResetPasswordEmailLinkRequest $request)
    {
        $this->forgetPasswordService->sendResetLink($request->email);

        return $this->response('Parolni tiklash linki emailga yuborildi.', 201);
    }
}
