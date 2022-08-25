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

    public function test_a_event_can_be_create() {
        $this-> withExceptionHandling();
        $response = $this->post(route('storeEvent'), [
            'title' => 'new title',
            'description' => 'new description',
            'people' => '15',
            'image' => 'new image',
            'date' => '2008-06-23 02:11:28'
        ]);
        $this->assertCount(1, Event::all());
    }
}
