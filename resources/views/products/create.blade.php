<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h1>Create Product</h1>

    <form method="POST" action="{{ route('products.store') }}" class="row g-3 needs-validation">
      @csrf
      <div class="mb-3">
        <label for="titleText" class="form-label">Title</label>
        <input type="text" name="title" id="titleText" class="form-control" placeholder="Enter Title" required>
      </div>
      <div class="mb-3">
        <label for="qtyText" class="form-label">Qty</label>
        <input type="number" min="0" max="1000" name="qty" id="qtyText" class="form-control" placeholder="Enter Qty" required>
      </div>
      <div class="mb-3">
        <label for="priceText" class="form-label">Price</label>
        <input type="number" min="0" max="5000" step="0.01" name="price" id="priceText" class="form-control" placeholder="Enter Price" required>
      </div>
      <div class="mb-3">
        <label for="in_stockText" class="form-label">In Stock</label>
        <section name="in_stock" id="in_stock" class="form_control" required>
          <option value=""Select Stock></option>
          <option value="1"In stock></option>
          <option value="0">No Stock</option>
        </section>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
      </div>
    </form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
  </script>
</body>

</html>