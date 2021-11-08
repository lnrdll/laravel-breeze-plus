<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BreezePlus\DeleteProfileController;
use App\Http\Controllers\BreezePlus\UpdateProfileController;
use App\Http\Controllers\BreezePlus\UpdatePasswordController;

Route::view('/profile', 'breezePlus.index')
                ->middleware(['auth'])
                ->name('breeze-plus.index');

Route::put('/profile/update', [UpdateProfileController::class, 'update'])
                ->middleware(['auth'])
                ->name('breeze-plus.update');

Route::delete('/profile/delete', [DeleteProfileController::class, 'destroy'])
                ->middleware(['auth'])
                ->name('breeze-plus.delete');

Route::put('/profile/update-password', [UpdatePasswordController::class, 'update'])
                ->middleware(['auth'])
                ->name('breeze-plus.update-password');
