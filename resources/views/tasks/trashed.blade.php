@extends('layouts.app')

@section('title', 'Tarefas Apagadas')
@section('header', 'Tarefas Apagadas')

@section('content')
    <div class="actions">
        <a href="{{ route('tasks.index') }}" class="button">← Voltar às Tarefas Ativas</a>
    </div>

    <form method="GET" action="{{ route('tasks.trashed') }}" class="filter-form">
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
                <th>Data de Exclusão</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->status === 'pending' ? 'Pendente' : 'Concluída' }}</td>
                    <td>{{ $task->deleted_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <form action="{{ route('tasks.restore', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="button">Restaurar</button>
                        </form>

                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="button button-danger"
                                onclick="return confirm('Esta tarefa será apagada DEFINITIVAMENTE. Continuar?')"
                            >Excluir Definitivamente</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tasks->withQueryString()->links() }}
@endsection
