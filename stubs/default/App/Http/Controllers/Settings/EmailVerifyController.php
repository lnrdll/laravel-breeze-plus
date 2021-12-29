<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateEmailRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class EmailVerifyController extends Controller
{
    public function verify(UpdateEmailRequest $request)
    {
        $request->user()->update([
            'email' => $request->email,
            'email_verified_at' => now(),
        ]);

        Cache::pull('verify_' . Auth::user()->id);

        return back()->with(['status' => 'Email change successful.']);
    }
}
