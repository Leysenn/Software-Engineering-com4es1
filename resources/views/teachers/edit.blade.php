@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Edit Teacher: {{ $teacher->full_name }}</h2>

    <form action="{{ route('teachers.update', $teacher->tid) }}" method="POST">
        @csrf
        @method('PUT') 

        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name:</label>
            <input type="text" name="full_name" value="{{ old('full_name', $teacher->full_name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender:</label>
            <select name="gender" class="form-select" required>
                <option value="">--Select--</option>
                <option value="M" {{ old('gender', $teacher->gender) == 'M' ? 'selected' : '' }}>Male</option>
                <option value="F" {{ old('gender', $teacher->gender) == 'F' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="degree" class="form-label">Degree:</label>
            <input type="text" name="degree" value="{{ old('degree', $teacher->degree) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tel" class="form-label">Tel (Unique):</label>
            <input type="text" name="tel" value="{{ old('tel', $teacher->tel) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection