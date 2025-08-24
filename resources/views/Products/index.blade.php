<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #000; /* black background */
        color: #fff;
    }
    .card {
        border-radius: 20px; /* iOS-like smooth corners */
        background-color: #1c1c1e; /* dark gray like iOS */
        color: #fff;
    }
    .btn {
        border-radius: 12px; /* smooth buttons */
    }
    .container {
        max-width: 700px;
    }
    .btn-secondary {
        display: inline-block;
        padding: 10px 20px;
        background: #444;
        color: #fff;
        text-decoration: none;
        border-radius: 12px;
        transition: 0.3s ease;
    }
    .btn-secondary:hover {
        background: #666;
    }
</style>
<!DOCTYPE html>
<html>
<head>
    <title>Product Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .card {
            border-radius: 20px;
            background-color: #1c1c1e;
            color: #fff;
        }
        .btn {
            border-radius: 12px;
        }
        .container {
            max-width: 700px;
        }
        .btn-secondary {
            display: inline-block;
            padding: 10px 20px;
            background: #444;
            color: #fff;
            text-decoration: none;
            border-radius: 12px;
            transition: 0.3s ease;
        }
        .btn-secondary:hover {
            background: #666;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">← Back to Home</a>
    <h1 class="text-center mb-4">📦 Product Catalog</h1>

    <!-- Search + Filter -->
    <form method="GET" action="{{ route('products.index') }}" class="d-flex gap-2 mb-3">
        <input type="text" name="search" value="{{ $search }}" class="form-control rounded" placeholder="Search by name">
        <input type="text" name="category" value="{{ $category }}" class="form-control rounded" placeholder="Filter by category">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div class="text-center mb-4">
        <a href="{{ route('products.create') }}" class="btn btn-success">+ Add New Product</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center rounded">{{ session('success') }}</div>
    @endif

    @forelse($products as $product)
        <div class="card mb-3 p-3 shadow">
            <h4>{{ $product->name }}</h4>
            <p class="mb-1"><strong>Category:</strong> {{ $product->category_name }}</p>
            <p class="mb-1"><strong>Price:</strong> ${{ $product->price }}</p>
            <p>{{ $product->description }}</p>

            <div class="d-flex gap-2">
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <div class="alert alert-dark text-center">No products found.</div>
    @endforelse
</div>
</body>
</html>
