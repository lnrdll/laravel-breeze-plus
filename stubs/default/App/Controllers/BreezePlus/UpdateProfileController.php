<?php

namespace App\Http\Controllers\BreezePlus;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\RedirectResponse;

class UpdateProfileController extends Controller
{
    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        auth()->user()->update($request->validated());

        return redirect()->route('breeze-plus.profile');
    }
}
