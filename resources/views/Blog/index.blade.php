@extends('layouts.app')

@section('title', 'Data Blog')

@section('content')

<div class="container">
    <a href="/blog/create" class="btn btn-primary mb-3">Tambah Data</a>

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
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1
                @endphp
                @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->description}}</td>
                    <td>
                        <img src="/image/{{$blog->image}}" alt="" class="img-fluid" width="90">
                    </td>
                    <td>
                        <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{route('blog.destroy', $blog->id)}}" method="POST">
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
