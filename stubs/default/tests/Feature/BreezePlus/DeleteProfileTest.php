<?php

namespace Tests\Feature\BreezePlus;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteProfileTest extends TestCase
{
    use refreshDatabase;

    /** @test */
    public function user_account_can_be_deleted()
    {
        $this->actingAs($user = User::factory()->create());

        $this->assertDatabaseHas('users', $user->only('id'));

        $this->delete(route('breeze-plus.delete'))->assertRedirect('/');

        $this->assertDatabaseMissing('users', $user->only('id'));
    }
}
