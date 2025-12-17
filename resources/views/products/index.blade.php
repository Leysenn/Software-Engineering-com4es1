<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Product Index</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Create New</a>
        <table class="table table-hover">
            <thead class="table table-primary">
                <th>PID</th>
                <th>Title</th>
                <th>Qty</th>
                <th>Price</th>
                <th>In Stock</th>
                <th>Actions</th>
            </thead>
            <tbody class="table table-light">
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->pid }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        @if ($product->in_stock == 1)
                        <span class="badge bg-primary">In Stock</span>
                        @else
                        <span class="badge bg-danger">No Stock</span>
                        @endif
                    </td>
                    
                    <td>
                        <form method="POST" action="{{ route('products.destroy', $product->pid) }}" class="d-inline">
                            @csrf
                            @method('VIEW') <button type="submit" class="btn btn-primary btn-view">View</button>
                        </form>
                        <form method="POST" action="{{ route('products.destroy', $product->pid) }}" class="d-inline">
                            @csrf
                            @method('EDIT') <button type="submit" class="btn btn-secondary btn-edit">Edit</button>
                        </form>
                        <form method="POST" action="{{ route('products.destroy', $product->pid) }}" class="d-inline">
                            @csrf
                            @method('DELETE') <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

    <script>
        // Your custom script now runs after SweetAlert2 is loaded
        document.querySelectorAll('.btn-delete').forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                let form = this.closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This item will be permanently deleted.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</body>

</html>