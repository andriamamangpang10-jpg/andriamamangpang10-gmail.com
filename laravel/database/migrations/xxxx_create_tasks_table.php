public function up(): void
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('task_name');
        $table->text('description')->nullable();
        $table->enum('status', ['Pending', 'Completed'])->default('Pending');
        $table->date('due_date')->nullable();
        $table->timestamps();
    });
}