<?php

namespace App\Http\Controllers\BreezePlus;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function update(UpdatePasswordRequest $request): RedirectResponse
    {
        $request->validated();

        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('breeze-plus.profile');
    }
}
