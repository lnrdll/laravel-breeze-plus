<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class DeleteProfileController extends Controller
{
    public function destroy(): RedirectResponse
    {
        $user = auth()->user();

        auth()->logout();

        $user->delete();

        return redirect('/');
    }
}
