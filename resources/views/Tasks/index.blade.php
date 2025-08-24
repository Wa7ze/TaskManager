<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #000; color: #fff; }
        .card { border-radius: 20px; background-color: #1c1c1e; color: #fff; }
        .btn { border-radius: 12px; }
        .container { max-width: 700px; }
    </style>
</head>
<body>
<div class="container my-5">
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">← Back to Home</a>
    <h1 class="text-center mb-4">📝 Task Manager</h1>

    <!-- Search -->
    <form method="GET" action="{{ route('tasks.index') }}" class="d-flex gap-2 mb-3">
        <input type="text" name="search" value="{{ $search }}" class="form-control rounded" placeholder="Search tasks">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div class="text-center mb-4">
        <a href="{{ route('tasks.create') }}" class="btn btn-success">+ Add New Task</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center rounded">{{ session('success') }}</div>
    @endif

    @forelse($tasks as $task)
        <div class="card mb-3 p-3 shadow">
            <h4>{{ $task->name }}</h4>
            <p>{{ $task->description }}</p>

            <div class="d-flex gap-2">
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <div class="alert alert-dark text-center">No tasks found.</div>
    @endforelse
</div>
</body>
</html>
