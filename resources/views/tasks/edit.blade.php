@extends('layouts.app')

@section('title', 'Editar Tarefa')
@section('header', 'Editar Tarefa')

@section('content')
    <a href="{{ route('tasks.index') }}">← Voltar</a>
    @include('tasks.form', [
        'action' => route('tasks.update', $task->id),
        'isEdit' => true,
        'buttonLabel' => 'Atualizar Tarefa',
        'task' => $task
    ])
@endsection
