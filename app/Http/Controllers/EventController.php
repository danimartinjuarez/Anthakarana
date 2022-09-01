<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::orderBy('date', 'DESC')->paginate(6);
        $caroousel = Event::all();
        return view('home', compact('events', 'caroousel'));
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
        $user = User::find(Auth::id());
        $user->event();
        $eventsuscribe = $user->event;
        return view('showEvent', compact('event'), compact('eventsuscribe'));
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
        return view('editEvent', compact('event'));
    }


    public function update(Request $request, $id)
    {
        $event = request()->except(['_token', '_method']);
        Event::where('id', '=', $id)->update($event);
        return redirect()->route('home');
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


    public function inscribe($id)
    {
        $user = User::find(Auth::id());
        $event = Event::find($id);
        $user->event()->attach($event);
        return redirect()->route('home');
    }

    public function cancelInscription($id)
    {
        $user = User::find(Auth::id());
        $event = Event::find($id);

        $user->event()->detach($event);
        return redirect()->route('home');
    }
    public function eventsSubscribe()
    {
        $user = User::find(Auth::id());
        $user->event();
        return view('eventssubscribe', compact('user'));
    }
}
