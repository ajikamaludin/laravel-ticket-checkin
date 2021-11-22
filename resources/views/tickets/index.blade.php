@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ticket</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <a class="btn btn-outline-primary mb-3" href="{{ route('tickets.create') }}">Tambah</a>
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr>
                            <th scope="row">{{ $ticket->id }}</th>
                            <td>{{ $ticket->name }}</td>
                            <td>{{ $ticket->email }}</td>
                            <td>{{ $ticket->phone }}</td>
                            <td>
                                <div class="btn btn-primary">Edit</div>
                                <div class="btn btn-danger">Delete</div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $tickets->links() }}
            </div>
        </div>
    </div>
@endsection