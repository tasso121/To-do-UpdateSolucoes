<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Gerenciador de Tarefas')</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>
<body>
    <header>
        <h1>@yield('header', 'Tarefas')</h1>
        <nav>
            <a href="{{ route('tasks.index') }}">Listar Tarefas</a> |
            <a href="{{ route('tasks.create') }}">Nova Tarefa</a> |
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Sair</button>
            </form>
        </nav>
    </header>

    <main>
        @include('partials.alerts')
        @yield('content')
    </main>
</body>
</html>
