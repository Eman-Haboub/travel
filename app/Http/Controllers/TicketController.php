<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Trip;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('role:admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $tickets = auth()->user()->tickets()->with('trip')->latest()->get();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $trips = Trip::all();
        return view('tickets.create', compact('trips'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'ticket_code' => 'required|unique:tickets,ticket_code',
            'issue_date' => 'required|date',
            'valid_from' => 'required|date',
            'valid_to' => 'required|date|after_or_equal:valid_from',
        ]);

        Ticket::create([
            'trip_id' => $request->trip_id,
            'user_id' => auth()->id(),
            'ticket_code' => $request->ticket_code,
            'issue_date' => $request->issue_date,
            'valid_from' => $request->valid_from,
            'valid_to' => $request->valid_to,
        ]);

        return redirect()->route('tickets.index')->with('success', 'تم إنشاء التذكرة بنجاح.');
    }

    public function show(Ticket $ticket)
    {
        if (auth()->id() !== $ticket->user_id && !auth()->user()->hasRole('admin')) {
            abort(403, 'غير مصرح لك بعرض هذه التذكرة.');
        }

        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        $trips = Trip::all();
        return view('tickets.edit', compact('ticket', 'trips'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'ticket_code' => 'required|unique:tickets,ticket_code,' . $ticket->id,
            'issue_date' => 'required|date',
            'valid_from' => 'required|date',
            'valid_to' => 'required|date|after_or_equal:valid_from',
        ]);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')->with('success', 'تم تحديث التذكرة بنجاح.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'تم حذف التذكرة بنجاح.');
    }
}
