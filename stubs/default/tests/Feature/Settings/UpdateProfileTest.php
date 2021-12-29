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

        $this->assertEquals('old name', $user->name);

        $this->put(route('settings.profile.update'), [
            'name' => 'bob',
        ])->assertRedirect(route('settings.profile.index'));

        $this->assertEquals('bob', $user->fresh()->name);

        $this->assertDatabaseHas('users', [
            'name' => $user->fresh()->name,
        ]);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        $this->actingAs(User::factory()->create());

        $this->put(route('settings.profile.update'), [
            'name' => '',
        ])->assertSessionHasErrors([
            'name' => 'The name field is required.',
        ]);
    }

    public function it_checks_the_email_validation()
    {
        $this->actingAs($user = User::factory()->create());

        $this->put(route('settings.profile.update'), [
            'name' => $user->name,
            'email' => 'fake@e',
        ])->assertInvalid('email');
    }
}
