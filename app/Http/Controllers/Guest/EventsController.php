<?php

namespace App\Http\Controllers\Guest;

use App\Event;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventsRequest;
use App\Http\Requests\Admin\UpdateEventsRequest;

class EventsController extends Controller
{
    /**
     * Display a listing of Event.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('guest.home', compact('events'));
    }

    /**
     * Display Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $now = Carbon::now()->toDateString();
        // don't display tickets which are not available
        $match = [
            ['event_id', '=', $id],
            ['available_from', '<=', $now],
            ['available_to', '>=', $now]
        ];

        // used collect method to be able to sortBy
        $tickets = Ticket::where($match)->orderBy('price')->get();

        $event = Event::findOrFail($id);

        return view('guest.events.show', compact('event', 'tickets'));
    }
}
