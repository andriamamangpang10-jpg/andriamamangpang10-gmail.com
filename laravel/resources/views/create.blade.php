@extends('layouts.app')
@section('content')
  <form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <input name="task_name" required>
    <textarea name="description"></textarea>
    <select name="status">
      <option>Pending</option><option>Completed</option>
    </select>
    <input type="date" name="due_date">
    <button type="submit">Save Task</button>
  </form>
@endsection