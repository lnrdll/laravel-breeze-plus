<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateEmailRequest;

class EmailVerifyController extends Controller
{
    public function verify(UpdateEmailRequest $request)
    {
        $request->user()->forceFill([
            'email' => $request->email,
            'email_verified_at' => now(),
        ]);

        return back()->with(['status' => 'Email change successful.']);
    }
}
