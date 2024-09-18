@extends('layouts.app')
@section('title', 'Edit Level')

@section('content')

<form action="{{route('level.update', $edit->id)}}" method="post">
    @csrf
    @method('PUT')

    @if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
        @endif

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Nama level *</label>
        </div>
        <div class="col-sm-5">
            <input value="{{ $edit->level_name }}" required type="text" class="form-control" name="level_name" placeholder="Nama Level">
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
