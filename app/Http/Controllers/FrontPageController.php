<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Ticket;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index()
    {
        return view('frontpage.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        
        // Method 1
        // $ticket = new Ticket;
        // $ticket->name = $request->name;
        // $ticket->email = $request->email;
        // $ticket->phone = $request->phone;
        // $ticket->ticket_id = 'tiket1';
        // $ticket->save();

        // Method 2 , requirement fillable in model
        $ticket = Ticket::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'ticket_id' => Str::random(6),
        ]);

        return redirect()->route('frontpage.index')->with('message', 'tiket berhasil di order #'.$ticket->ticket_id);
    }
}
