@extends('layouts.app')
@section('title', 'Tambah Produk')

@section('content')

<form action="{{route('product.store')}}" method="post">
    @csrf

    @if (session('error'))
<div class="alert alert-danger">{{session('error')}}</div>
    @endif

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Nama Kategori *</label>
        </div>
        <div class="col-sm-5">
            <select required name="category_id" id="" class="form-control">
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category )
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Nama Produk *</label>
        </div>
        <div class="col-sm-5">
            <input required type="text" class="form-control" name="product_name" placeholder="Nama Produk">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Jumlah Produk *</label>
        </div>
        <div class="col-sm-5">
            <input required type="number" class="form-control" name="product_qty" placeholder="Jumlah Produk">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Harga Produk *</label>
        </div>
        <div class="col-sm-5">
            <input required type="number" class="form-control" name="product_price" placeholder="Harga Produk">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-10">
          <button class="btn btn-primary" type="submit">Simpan</button>
          <a href="{{ route('product.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</form>

@endsection
