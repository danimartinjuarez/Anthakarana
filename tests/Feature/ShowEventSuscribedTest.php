<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use App\Models\User;

use function PHPUnit\Framework\isFalse;

class ShowEventsInSubscribed extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     *
     */
    use RefreshDatabase;
    public  function test_a_event_can_be_show_in_EventsSuscribe() {
        $this-> withExceptionHandling();
        $event = Event::factory()->create();
        $this->assertCount(1, Event::all());
        $userNoAdmin = User::factory()->create(['isAdmin'=>false]);
        $this->actingAs($userNoAdmin);
        $response = $this->get(route('inscribeEvent', $event->id));
        $response= $this->get(route('eventssubscribed',$event->id));
        $response->assertSee($event->title);

        // $this->assertCount(0, Event::all());
    }
}
