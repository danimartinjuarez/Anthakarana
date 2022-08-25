<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;

class CrudTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * 
     */
    use RefreshDatabase;

    public function test_list_event_in_homepage()
    {
        $this->withExceptionHandling();
        $events = Event::factory(2)->create();
        $event = $events[0];
        $response = $this->get('/');
        $response->assertStatus(200)
            ->assertViewIs('home');
        $response->assertSee($event->name);
    }
}
