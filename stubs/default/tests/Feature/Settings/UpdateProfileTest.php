<?php

namespace Tests\Feature\Settings;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateProfileTest extends TestCase
{
    use refreshDatabase;

    /** @test */
    public function user_can_update_his_name_and_email_address()
    {
        $this->actingAs($user = User::factory()->create([
            'name' => 'old name',
            'email' => 'test@test.com',
        ]));

        $this->assertEquals('test@test.com', $user->email);
        $this->assertEquals('old name', $user->name);

        $this->put(route('settings.profile.update'), [
            'name' => 'bob',
            'email' => 'admin@admin.com',
        ])->assertRedirect(route('settings.index'));

        $this->assertEquals('admin@admin.com', $user->fresh()->email);
        $this->assertEquals('bob', $user->fresh()->name);

        $this->assertDatabaseHas('users', [
            'email' => $user->fresh()->email,
            'name' => $user->fresh()->name,
        ]);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        $this->actingAs(User::factory()->create());

        $this->put(route('settings.profile.update'), [
            'name' => '',
            'email' => '',
        ])->assertSessionHasErrors([
            'name' => 'The name field is required.',
            'email' => 'The email field is required.',
        ]);
    }

    /** @test */
    public function it_checks_the_email_validation()
    {
        $this->actingAs($user = User::factory()->create());

        $this->put(route('settings.profile.update'), [
            'name' => $user->name,
            'email' => 'fake@e',
        ])->assertInvalid('email');
    }
}
