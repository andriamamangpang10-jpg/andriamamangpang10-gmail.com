class TaskController extends Controller
{
    public function index() {
        $tasks = Task::orderByRaw("status = 'Completed'")->orderBy('due_date')->get();
        return view('tasks.index', [
            'tasks' => $tasks,
            'total' => $tasks->count(),
            'completed' => $tasks->where('status','Completed')->count(),
            'pending' => $tasks->where('status','Pending')->count(),
        ]);
    }

    public function create() { return view('tasks.create'); }

    public function store(Request $request) {
        $data = $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'nullable|date',
        ]);
        Task::create($data);
        return redirect()->route('tasks.index')->with('success','Task added.');
    }

    public function edit(Task $task) { return view('tasks.edit', compact('task')); }

    public function update(Request $request, Task $task) {
        $data = $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'nullable|date',
        ]);
        $task->update($data);
        return redirect()->route('tasks.index')->with('success','Task updated.');
    }

    public function destroy(Task $task) {
        $task->delete();
        return redirect()->route('tasks.index')->with('success','Task deleted.');
    }

    public function updateStatus(Task $task) {
        $task->status = $task->status === 'Pending' ? 'Completed' : 'Pending';
        $task->save();
        return redirect()->route('tasks.index')->with('success','Status updated.');
    }
}