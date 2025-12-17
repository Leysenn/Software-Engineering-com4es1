@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Teacher List</h2>
    <a href="{{ route('teachers.create') }}" class="btn btn-success mb-3">Create CRUD for Table Teacher</a>

    <table class="table table-hover table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Degree</th>
                <th>Tell</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->tid }}</td> 
                <td>{{ $teacher->full_name }}</td>
                <td>{{ $teacher->gender }}</td>
                <td>{{ $teacher->degree }}</td>
                <td>{{ $teacher->tel }}</td>
                <td>
                    {{-- SHOW button uses GET method --}}
                    <a href="{{ route('teachers.show', $teacher->tid) }}" class="btn btn-info btn-sm">Show</a>
                    
                    {{-- EDIT button uses GET method --}}
                    <a href="{{ route('teachers.edit', $teacher->tid) }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    {{-- DELETE button uses POST method with @method('DELETE') --}}
                    <form id="delete-form-{{ $teacher->tid }}" action="{{ route('teachers.destroy', $teacher->tid) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $teacher->tid }}')">
        Delete
    </button>
</form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{-- Display pagination links using Bootstrap styling --}}
        {{ $teachers->links('pagination::bootstrap-5') }} 
    </div>

    
    <script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This item will be permanently deleted.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33', // Red color for delete
        cancelButtonColor: '#3085d6', // Blue color for cancel
        confirmButtonText: 'Yes, delete!',
        cancelButtonText: 'Cancel',
        reverseButtons: true // Matches the layout in your image
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the specific form
            document.getElementById('delete-form-' + id).submit();
        }
    })
}
</script>
@endsection