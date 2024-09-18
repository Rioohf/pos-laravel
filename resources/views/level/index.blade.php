@extends('layouts.app')
@section('title', 'Data Level')

@section('content')


<div class="table-responsive">

    @if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <div align="right" class="mb-3">
        <a href="{{route('level.create')}}" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table table-bordered" id="example1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ( $levels as $level )
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $level->level_name }}</td>
                <td>
                    <a href="{{route('level.edit', $level->id)}}" class="btn btn-success btn-xs">Edit</a>
                    {{-- <a href="{{route('level.destroy', $level->id)}}" class="btn btn-danger btn-xs">Delete</a> --}}
                    <a href="{{ route('level.destroy', $level->id) }}" class="btn btn-danger btn-xs" data-confirm-delete="true">Delete</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
