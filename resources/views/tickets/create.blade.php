@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ticket</h1>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('tickets.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="nama" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="text" name="email" class="form-control" placeholder="name@example.com" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Telp</label>
                        <input type="text" name="phone" class="form-control" placeholder="089XXXXX" value="{{ old('phone') }}">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection