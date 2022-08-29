<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    
    public function index()
    {
        
        $events = Event::get();
        return view('home', compact('events'));
    }

    
    public function create()
    {
        return view('createEvent');
    }

    
    public function store(Request $request)
    {
        $event = request()->except('_token');
        Event::create($event);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('showEvent', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view ('editEvent', compact('event'));
    }

   
    public function update(Request $request, $id)
    {
        $event = request()->except(['_token','_method']);
        Event::where('id', '=', $id)->update($event);
        return redirect ()->route('home');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);
        return redirect()->route('home');
    }


}
