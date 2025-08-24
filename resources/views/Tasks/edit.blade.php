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
</style>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #000; color: #fff; }
        .card { border-radius: 20px; background-color: #1c1c1e; color: #fff; }
        .btn { border-radius: 12px; }
        .container { max-width: 600px; }
    </style>
</head>
<body>
<div class="container my-5">
    <div class="card p-4 shadow">
        <h2 class="text-center mb-4">✏️ Edit Task</h2>

        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" value="{{ $task->name }}" class="form-control rounded" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description:</label>
                <textarea name="description" class="form-control rounded">{{ $task->description }}</textarea>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
