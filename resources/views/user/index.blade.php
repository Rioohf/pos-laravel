@extends('layouts.app')
@section('title', 'Data User')

@section('content')


<div class="table-responsive">
    @if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
        @endif
    <div align="right" class="mb-3">
        <a href="{{route('user.create')}}" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table table-bordered" id="example1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ( $users as $user )
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{$user->levels->level_name}}</td>
                <td>
                    <a href="{{route('user.edit', $user->id)}}" class="btn btn-success btn-xs">Edit</a>
                    {{-- <a href="{{route('user.destroy', $user->id)}}" class="btn btn-danger btn-xs">Delete</a> --}}
                    <form class="d-inline" action="{{route('user.destroy', $user->id)}}" method="post">
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
