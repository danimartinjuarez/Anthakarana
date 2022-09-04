<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use App\Models\User;

use function PHPUnit\Framework\isFalse;

class CrudUsersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     *
     */
    use RefreshDatabase;

    public function test_list_user_in_indexUsers()
    {
        $this->withExceptionHandling();
        $userAdmin = User::factory()->create(['isAdmin'=>true]);
        $this->actingAs($userAdmin);
        $response = $this->get(route('indexUsers'));
        $response->assertStatus(200)
            ->assertViewIs('indexUsers');
        $response->assertSee($userAdmin->name);
    }

    public function test_a_user_can_be_deleted() {
        $this-> withExceptionHandling();

        $userNoAdmin = User::factory()->create(['isAdmin'=>false]);
        $this->actingAs($userNoAdmin);
        $response = $this->delete(route('deleteUser', $userNoAdmin->id));
        $this->assertCount(1, User::all());

        $userAdmin = User::factory()->create(['isAdmin'=>true]);
        $this->actingAs($userAdmin);
        $response = $this->delete(route('deleteUser', $userNoAdmin->id));
        $this->assertCount(1, User::all());
        $response = $this->delete(route('deleteUser', $userAdmin->id));
        $this->assertCount(1, User::all());

    }
}
