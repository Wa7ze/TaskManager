<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>
    <h1>Create Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <br>
        <label>Description:</label>
        <textarea name="description"></textarea>
        <br>
        <button type="submit">Save</button>
    </form>

    <a href="{{ route('tasks.index') }}">Back</a>
</body>
</html>
