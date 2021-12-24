<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Settings\DeleteProfileController;
use App\Http\Controllers\Settings\UpdateProfileController;
use App\Http\Controllers\Settings\UpdatePasswordController;

Route::view('/settings', 'settings.index')
                ->middleware(['auth'])
                ->name('settings.index');

Route::put('/settings/profile/update', [UpdateProfileController::class, 'update'])
                ->middleware(['auth'])
                ->name('settings.profile.update');

Route::delete('/settings/account/delete', [DeleteProfileController::class, 'destroy'])
                ->middleware(['auth'])
                ->name('settings.account.delete');

Route::put('/settings/password/update', [UpdatePasswordController::class, 'update'])
                ->middleware(['auth'])
                ->name('settings.password.update');
