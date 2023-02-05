@extends('layouts.app')

@section('title', 'Data List Dokter')

@section('content')

<div class="container">
    <a href="/doctor" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form  action="{{route('doctor.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Nama Dokter</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama"> 
                </div>
                @error('nama')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" class="form-control" name="image"> 
                </div>
                @error('image')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                         Submit 
                    </button>
                </div>
            </form>    
        </div> 
    </div>
</div>

@endsection
