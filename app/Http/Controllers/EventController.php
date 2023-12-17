<?php

namespace App\Http\Controllers;

use App\Events\UserLog;
use App\Models\Event;
use App\Notifications\MailNotif;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::paginate(5);
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'guest' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $event = new Event([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'location' => $request->input('location'),
            'guest' => $request->input('guest'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
        ]);

        $event->save();

        $user = auth()->user()->name;
        $log_entry = $user . " Added a new event with ID #" . $event->id . ": \"" . $event->name . "\"";
        event(new UserLog($log_entry));

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'guest' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $event->update([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'location' => $request->input('location'),
            'guest' => $request->input('guest'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
        ]);

        $user = auth()->user()->name;
        $log_entry = $user . " updated event ID #" . $event->id . ": \"" . $event->name . "\"";
        event(new UserLog($log_entry));

        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        $user = auth()->user()->name;

        $log_entry = $user . " removed \"" . $event->name . "\" with the ID #" . $event->id;
        event(new UserLog($log_entry));

        return redirect()->route('events.index')->with('success', 'Deleted successfully.');
    }

    public function info(Request $request, Event $event)
    {
        $user = $request->user();

        $mailNotif = [
            'body' => 'Event Information',
            'eventName' => $event->name,
            'eventDate' => $event->date,
            'eventLocation' => $event->location,
            'eventGuest' => $event->guest,
            'eventType' => $event->type,
            'eventDescription' => $event->description,
            'thankyou' => 'Thank you for your interest in our events!',
        ];

        $user->notify(new MailNotif($mailNotif));

        $event->save();

        return redirect()->route('events.index')->with('success', 'Info sent to your email.');
    }
}
