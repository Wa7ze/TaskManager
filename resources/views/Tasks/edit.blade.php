<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $task->name }}" required>
        <br>
        <label>Description:</label>
        <textarea name="description">{{ $task->description }}</textarea>
        <br>
        <button type="submit">Update</button>
    </form>

    <a href="{{ route('tasks.index') }}">Back</a>
</body>
</html>
