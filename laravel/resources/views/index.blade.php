m action="{{ route('tasks.updateStatus',$task) }}" method="POST">
            @csrf @method('PATCH')
            <button>Toggle Status</button>
          </form>
          <a href="{{ route('tasks.edit',$task) }}">Edit</a>
          <form action="{{ route('tasks.destroy',$task) }}" method="POST">
            @csrf @method('DELETE')
            <button>Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
@endsection