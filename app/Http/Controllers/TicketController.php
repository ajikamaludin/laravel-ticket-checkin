<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate(5);
        return view('tickets.index', ['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $ticket = Ticket::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'ticket_id' => Str::random(6),
        ]);

        return redirect()->route('tickets.index')->with('message', 'tiket berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', ['ticket' => $ticket]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $ticket->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('tickets.index')->with('message', 'tiket berhasil di simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('message', 'tiket berhasil di hapus');
    }

    public function search()
    {
        return view('tickets.check');
    }

    public function check(Request $request)
    {
        // Option 1
        // $ticket = Ticket::where('ticket_id', $request->ticket_id)->where('is_checkin', 0)->first();

        // if ($ticket == null) {
        //     return redirect()->back()->with('message', 'tiket tidak ditemukan');
        // }

        // Option 2
        $ticket = Ticket::where('ticket_id', $request->ticket_id)->first();

        if ($ticket == null) {
            return redirect()->back()->with('message', 'tiket tidak ditemukan');
        }

        if ($ticket->is_checkin == 1) {
            return redirect()->back()->with('message', 'tiket sudah check in');
        }

        $ticket->is_checkin = 1;
        $ticket->save();

        return view('tickets.detail', ['ticket' => $ticket]);
    }
}
