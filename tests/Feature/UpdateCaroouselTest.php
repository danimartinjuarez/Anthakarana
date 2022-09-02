<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateCaroousel extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_a_caroousel_can_be_update() {
        $this-> withExceptionHandling();
        $event = Event::factory()->create(['caroousel' => true]);
        $this->assertCount(1, Event::all());

        $userAdmin = User::factory()->create(['isAdmin'=>true]);
        $this->actingAs($userAdmin);

        $response= $this->patch(route('updateCaroousel', $event->id), ['caroousel' => false]);
        $this->assertEquals(false, Event::first()->caroousel);

        $userNoAdmin = User::factory()->create(['isAdmin'=>false]);
        $this->actingAs($userNoAdmin);

        $response= $this->patch(route('updateCaroousel', $event->id), ['caroousel' => true]);
        $this->assertEquals(false, Event::first()->caroousel);
    }
}
