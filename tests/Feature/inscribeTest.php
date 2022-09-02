<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use App\Models\User;

use function PHPUnit\Framework\isFalse;

class inscribeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * 
     */
    use RefreshDatabase;
    public function test_inscribe_in_event(){
        $this->withExceptionHandling();
        $event = Event::factory(1)->create();
        $this->assertCount(1, Event::all());
        $userNoAdmin = User::factory()->create(['isAdmin'=>true]);
        $this->actingAs($userNoAdmin);
        $eventPlaces=$event->sub_people;
        $response = $this->inscribe(route('inscribe', $event->id));
        $this->assertEquals($eventPlaces +1, $event->sub_people);


    }

}