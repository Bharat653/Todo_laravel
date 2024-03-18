@if (isset($todolist))
    @foreach ($todolist as $todo)
        <tr>
            <td>{{ $todo->id }}</td>
            <td>{{ $todo->todo_name }}</td>
            <td>{{ $todo->project_id }}</td>
            <td> <a href="{{ route('tododata.edit', $todo->id) }}" class="btn btn-dark">Edit</a> </td>
            <td>
                <form action="{{ route('tododata.destroy', $todo->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </td>
        </tr>
    @endforeach
@endif
