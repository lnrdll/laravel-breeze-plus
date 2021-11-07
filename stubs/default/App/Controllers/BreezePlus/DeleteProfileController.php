<?php

namespace App\Http\Controllers\BreezePlus;

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
