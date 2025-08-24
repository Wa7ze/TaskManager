<!DOCTYPE html>
<html>
<head>
    <title>Mini Project Hub</title>
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
            max-width: 600px;
        }
    </style>
</head>
<body>
<div class="container my-5 text-center">
    <h1 class="mb-4">🚀 Mini Project Hub</h1>
    <p>Select an assignment to explore:</p>

    <div class="d-flex flex-column gap-3 mt-4">
        <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-lg">📋 Task Manager</a>
        <a href="{{ route('products.index') }}" class="btn btn-success btn-lg">📦 Product Catalog</a>
    </div>
</div>
</body>
</html>
