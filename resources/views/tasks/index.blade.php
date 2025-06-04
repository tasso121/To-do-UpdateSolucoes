@extends('layouts.app')

@section('title', 'Lista de Tarefas')
@section('header', 'Lista de Tarefas')

@section('content')
    <div class="actions">
        <a href="{{ route('tasks.create') }}" class="button">Nova Tarefa</a>
        <a href="{{ route('tasks.trashed') }}" class="button">Ver Tarefas Apagadas</a>
    </div>

    <form method="GET" action="{{ route('tasks.index') }}" class="filter-form">
        <label for="status">Filtrar por status:</label>
        <select name="status" id="status" onchange="this.form.submit()">
            <option value="">Todos</option>
            <option value="pending"  {{ request('status') == 'pending'  ? 'selected' : '' }}>Pendente</option>
            <option value="completed"{{ request('status') == 'completed'? 'selected' : '' }}>Concluída</option>
        </select>
    </form>

    <table class="task-table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Status</th>
                <th>Data de Criação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->status === 'pending' ? 'Pendente' : 'Concluída' }}</td>
                    <td>{{ $task->created_at->timezone('America/Fortaleza')->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="button">Editar</a>

                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button button-danger"
                                    onclick="return confirm('Deseja excluir esta tarefa?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Não há tarefas cadastradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $tasks->withQueryString()->links() }}
@endsection
