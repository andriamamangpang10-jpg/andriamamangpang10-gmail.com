class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name', 'description', 'status', 'due_date',
    ];

    protected $casts = ['due_date' => 'date'];
}