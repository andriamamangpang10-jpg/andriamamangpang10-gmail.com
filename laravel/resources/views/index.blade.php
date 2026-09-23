<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #333; color: #fff; }
        .btn { padding: 4px 10px; text-decoration: none; color: #fff; border-radius: 4px; }
        .edit { background: #007bff; }
        .delete { background: #dc3545; border: none; cursor: pointer; }
        .add { background: #28a745; }
    </style>
</head>
<body>

    <h1>Personal Task Manager</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <p><a class="btn add" href="{{ route('tasks.create') }}">+ Add Task</a></p>

    <table>
        <tr>
            <th>Task Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
        @forelse($tasks as $task)
        <tr>
            <td>{{ $task->task_name }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->status }}</td>
            <td>{{ $task->due_date }}</td>
            <td>
                <a class="btn edit" href="{{ route('tasks.edit', $task->id) }}">Edit</a>

                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn delete" onclick="return confirm('Delete this task?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No tasks yet.</td>
        </tr>
        @endforelse
    </table>

</body>
</html>