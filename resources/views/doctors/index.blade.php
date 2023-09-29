{{-- resources/views/doctors/index.blade.php --}}

@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Doctors</h1>
    
    <a href="{{ route('doctors.create') }}" class="btn btn-primary mb-3">Add New Doctor</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Speciality</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->id }}</td>
                    <td>{{ $doctor->username }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ $doctor->speciality }}</td>
                    <td>
                        <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
