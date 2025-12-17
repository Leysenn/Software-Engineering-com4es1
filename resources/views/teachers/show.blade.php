@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Teacher Details: {{ $teacher->full_name }}</h2>
    
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $teacher->tid }}</p>
            <p><strong>Full Name:</strong> {{ $teacher->full_name }}</p>
            <p><strong>Gender:</strong> {{ $teacher->gender }}</p>
            <p><strong>Degree:</strong> {{ $teacher->degree }}</p>
            <p><strong>Tell:</strong> {{ $teacher->tel }}</p>
            <p><strong>Created At:</strong> {{ $teacher->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $teacher->updated_at }}</p>
        </div>
    </div>

    <a href="{{ route('teachers.edit', $teacher->tid) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('teachers.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection