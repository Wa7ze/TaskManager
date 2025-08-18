<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
</head>
<body>
    <h1>All Tasks</h1>

    <!-- Search -->
    <form method="GET" action="{{ route('tasks.index') }}">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search tasks">
        <button type="submit">Search</button>
    </form>

    <a href="{{ route('tasks.create') }}">+ Add New Task</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @forelse($tasks as $task)
            <li>
                <strong>{{ $task->name }}</strong> - {{ $task->description }}
                <a href="{{ route('tasks.edit', $task) }}">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this task?')">Delete</button>
                </form>
            </li>
        @empty
            <li>No tasks found.</li>
        @endforelse
    </ul>
</body>
</html>
