@extends('layouts.app')

@section('title', 'Nova Tarefa')
@section('header', 'Criar Nova Tarefa')

@section('content')
    <a href="{{ route('tasks.index') }}">← Voltar</a>
    @include('tasks.form', [
        'action' => route('tasks.store'),
        'isEdit' => false,
        'buttonLabel' => 'Criar Tarefa'
    ])
@endsection
