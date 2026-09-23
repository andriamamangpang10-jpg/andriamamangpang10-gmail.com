<nav class="navbar navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('tasks.index') }}">📋 Task Manager</a>
  </div>
</nav>
<div class="container mb-5">
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @yield('content')
</div>