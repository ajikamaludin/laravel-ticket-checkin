@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
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
            </div>
        </div>
    </div>
@endsection