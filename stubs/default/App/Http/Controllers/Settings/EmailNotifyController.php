<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailChangeNotification;
use App\Http\Requests\Settings\EmailNotifyRequest;

class EmailNotifyController extends Controller
{
    public function __invoke(EmailNotifyRequest $request)
    {
        Notification::route('mail', $request->email)
            ->notify(new EmailChangeNotification(Auth::user()->id));

        return back()->with(['status' => 'A verification email was sent to ' . $request->email]);
    }
}
