<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailChangeNotification;
use App\Http\Requests\Settings\EmailNotifyRequest;

class EmailNotifyController extends Controller
{
    public function __invoke(EmailNotifyRequest $request)
    {
        Cache::put('verify_' . Auth::user()->id, $request->email, now()->addHour());

        Notification::route('mail', $request->email)
            ->notify(new EmailChangeNotification(Auth::user()->id));

        return back()->with(['status' => 'A verification email was sent to ' . $request->email]);
    }
}
