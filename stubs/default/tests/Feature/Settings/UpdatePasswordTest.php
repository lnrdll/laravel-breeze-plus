<?php

namespace Tests\Feature\Settings;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UpdatePasswordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_update_his_password()
    {
        $this->actingAs($user = User::factory()->create());

        $this->put(route('settings.password.update'), [
            'current_password' => 'password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ])->assertRedirect(route('settings.profile.index'));

        $this->assertTrue(Hash::check('new-password', $user->fresh()->password));
    }

    /** @test */
    public function current_password_is_required()
    {
        $this->actingAs($user = User::factory()->create());

        $this->put(route('settings.password.update'), [
            'current_password' => '',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ])->assertInvalid('current_password');
    }

    /** @test */
    public function the_old_password_must_be_correct_before_changing_to_new_one()
    {
        $this->actingAs($user = User::factory()->create());

        $this->put(route('settings.password.update'), [
            'current_password' => 'wrong-password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ])->assertInvalid('current_password');

        $this->assertTrue(Hash::check('password', $user->fresh()->password));
    }

    /** @test */
    public function the_new_password_must_match()
    {
        $this->actingAs($user = User::factory()->create());

        $this->put(route('settings.password.update'), [
            'current_password' => 'password',
            'password' => 'new-password',
            'password_confirmation' => 'wrong-password',
        ])->assertInvalid('password');

        $this->assertTrue(Hash::check('password', $user->fresh()->password));
    }
}
