<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    public function index()
    {
        $showVerificationMessage = Cache::has('verify_' . Auth::user()->id);

        $emailToVerify = Cache::get('verify_' . Auth::user()->id);

        return view('settings.index', [
            'showVerificationMessage' => $showVerificationMessage,
            'emailToVerify' => $emailToVerify,
        ]);
    }
}
