@extends('layouts.app')
@section('title', 'Data Kategori')

@section('content')


<div class="table-responsive">

    @if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <div align="right" class="mb-3">
        <a href="{{route('category.create')}}" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table table-bordered" id="example1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ( $categories as $category )
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $category->category_name }}</td>
                <td>
                    <a href="{{route('category.edit', $category->id)}}" class="btn btn-success btn-xs">Edit</a>
                    {{-- <a href="{{route('category.destroy', $category->id)}}" class="btn btn-danger btn-xs">Delete</a> --}}
                    <form class="d-inline" action="{{route('category.destroy', $category->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
