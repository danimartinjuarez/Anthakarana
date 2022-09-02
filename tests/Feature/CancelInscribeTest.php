<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use App\Models\User;

use function PHPUnit\Framework\isFalse;

class CancelInscribe extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     *
     */
    use RefreshDatabase;
    public  function test_a_event_can_be_cancel_inscription() {
        $this-> withExceptionHandling();
        $event = Event::factory()->create();
        $this->assertCount(1, Event::all());
        $userNoAdmin = User::factory()->create(['isAdmin'=>false]);
        $this->actingAs($userNoAdmin);
        $response = $this->get(route('inscribeEvent', $event->id));
        $eventPlaces=Event::first()->sub_people;
        $response= $this->get(route('unscribeEvent',$event->id));
        $this->assertEquals($eventPlaces -1, Event::first()->sub_people);

        // $this->assertCount(0, Event::all());
    }
}
