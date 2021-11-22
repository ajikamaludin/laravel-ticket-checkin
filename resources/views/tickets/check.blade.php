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
                <form action="{{ route('tickets.check') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Ticket ID</label>
                        <input type="text" name="ticket_id" class="form-control" placeholder="Ticket ID" value="">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" value="Cari">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection