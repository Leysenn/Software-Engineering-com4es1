@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Create New Teacher</h2>

    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name:</label>
            <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender:</label>
            <select name="gender" class="form-select" required>
                <option value="">--Select--</option>
                <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="degree" class="form-label">Degree:</label>
            <input type="text" name="degree" value="{{ old('degree') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tel" class="form-label">Tel (Unique):</label>
            <input type="text" name="tel" value="{{ old('tel') }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
@endsection