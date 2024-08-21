@extends('layouts.app')
@section('title', 'Edit Kategori')

@section('content')

<form action="{{route('category.update', $edit->id)}}" method="post">
    @csrf
    @method('PUT')

    @if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
        @endif

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Nama Kategori *</label>
        </div>
        <div class="col-sm-5">
            <input value="{{ $edit->category_name }}" required type="text" class="form-control" name="category_name" placeholder="Nama Kategori">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-10">
          <button class="btn btn-primary" type="submit">Simpan</button>
          <a href="{{ route('category.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</form>

@endsection
