@extends('layouts.app')

@section('title', 'Data List Dokter')

@section('content')

<div class="container">
    <a href="/doctor/create" class="btn btn-primary mb-3">Tambah Data</a>

    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>{{$message}}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gambar</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1
                @endphp
                @foreach ($doctors as $sdoctor)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$doctor->nama}}</td>
                    <td>
                        <img src="/image/{{$doctor->image}}" alt="" class="img-fluid" width="90">
                    </td>
                    <td>
                        <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{route('doctor.destroy', $doctor->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
