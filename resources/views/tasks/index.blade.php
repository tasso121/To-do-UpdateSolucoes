@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('content')
    <a href="{{ route('tasks.create') }}">Nova Tarefa</a>

    <form method="GET" action="{{ route('tasks.index') }}">
        <select name="status" onchange="this.form.submit()">
            <option value="">-- Filtrar por status --</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pendente</option>
            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Concluída</option>
        </select>
    </form>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Status</th>
                <th>Data de Criação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->status == 'pending' ? 'Pendente' : 'Concluída' }}</td>
                <td>{{ $task->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}">Editar</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Deseja excluir esta tarefa?')">Excluir</button>
                    </form>
                    @if($task->deleted_at)
                        <form action="{{ route('tasks.restore', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Restaurar</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tasks->withQueryString()->links() }}
@endsection
