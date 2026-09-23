<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
</head>
<body>

    <h1>Add New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <label>Task Name:</label><br>
        <input type="text" name="task_name" value="{{ old('task_name') }}"><br><br>

        <label>Description:</label><br>
        <textarea name="description">{{ old('description') }}</textarea><br><br>

        <label>Status:</label><br>
        <select name="status">
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select><br><br>

        <label>Due Date:</label><br>
        <input type="date" name="due_date"><br><br>

        <button type="submit">Save Task</button>
        <a href="{{ route('tasks.index') }}">Cancel</a>
    </form>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</body>
</html>