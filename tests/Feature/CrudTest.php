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
            'date' => '2008-06-23 02:11:28',
            'start_hour'=>'10:00'
        ]);
        $this->assertCount(1, Event::all());
    }
    public function test_a_event_can_be_update() {
        $this-> withExceptionHandling();
        $event = Event::factory()->create();
        $this->assertCount(1, Event::all());
        $response= $this->patch(route('updateEvent', $event->id), ['title' => 'new title']);
        $this->assertEquals('new title', Event::first()->title);
        
    }
    public function test_a_event_can_be_show() {
        $this-> withExceptionHandling();
        $event = Event::factory()->create();
        $this->assertCount(1, Event::all());
        $response = $this->get(route('showEvent', $event->id));
        // $this->assertCount(0, Event::all());
    }
}
