@extends('layouts.app')
@section('content')
  <form action="{{ route('tasks.update',$task) }}" method="POST">
    @csrf @method('PUT')
    <input name="task_name" value="{{ $task->task_name }}" required>
    <textarea name="description">{{ $task->description }}</textarea>
    <select name="status">
      <option @selected($task->status==='Pending')>Pending</option>
      <option @selected($task->status==='Completed')>Completed</option>
    </select>
    <input type="date" name="due_date" value="{{ $task->due_date?->format('Y-m-d') }}">
    <button type="submit">Update Task</button>
  </form>
@endsection