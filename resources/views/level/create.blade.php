@extends('layouts.app')
@section('title', 'Tambah Level')

@section('content')

<form action="{{route('level.store')}}" method="post">
    @csrf

    @if (session('error'))
<div class="alert alert-danger">{{session('error')}}</div>
    @endif

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Nama Level *</label>
        </div>
        <div class="col-sm-5">
            <input required type="text" class="form-control" name="level_name" placeholder="Nama level">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-10">
          <button class="btn btn-primary" type="submit">Simpan</button>
          <a href="{{ route('level.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</form>

@endsection
