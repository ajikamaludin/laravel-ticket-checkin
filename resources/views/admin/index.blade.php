@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-6">
            <div class="mb-3">
                <h2>Pendaftaran Konser X</h2>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nama">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">No. Telp</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="089XXXXX">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Daftar">
            </div>
        </div>
    </div>
@endsection