<form method="POST" action="{{ $action }}">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <label for="title">Título</label>
    <input type="text" id="title" name="title" value="{{ old('title', $task->title ?? '') }}" required maxlength="255">

    <label for="description">Descrição</label>
    <textarea id="description" name="description">{{ old('description', $task->description ?? '') }}</textarea>

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="pending" {{ old('status', $task->status ?? '') === 'pending' ? 'selected' : '' }}>Pendente</option>
        <option value="completed" {{ old('status', $task->status ?? '') === 'completed' ? 'selected' : '' }}>Concluída</option>
    </select>

    <button type="submit">{{ $buttonLabel }}</button>
</form>
