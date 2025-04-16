<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Services\ResetPasswordService;


class ResetPasswordController extends Controller
{
    public function __construct(protected ResetPasswordService $service)
    {
    }

    public function reset(ResetPasswordRequest $request)
    {
        $this->service->resetPassword($request->validated());

        return $this->response('Parol muvaffaqiyatli yangilandi', 201);
    }
}
