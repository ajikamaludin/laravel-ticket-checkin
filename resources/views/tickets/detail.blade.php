@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ticket</h1>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                    @csrf
                    <div class="mb-3">
                        <p>Ticket ID: {{ $ticket->ticket_id }}</p>
                        <p>Nama: {{ $ticket->name }}</p>
                        <p>Check In: {{ $ticket->is_checkin == 0 ? 'Belum Check' : 'Sudah Check' }}</p>
                    </div>
            </div>
        </div>
    </div>
@endsection