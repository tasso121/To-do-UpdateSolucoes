<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Services\Interfaces\TaskServiceInterface;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;


class TaskController extends Controller
{
    protected TaskServiceInterface $taskService;

    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request)
    {
        $tasks = $this->taskService->listTasks($request->only('status'));
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $this->taskService->createTask($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso.');
    }

    public function show(int $id)
    {
        $task = $this->taskService->getTask($id);
        return view('tasks.show', compact('task'));
    }

    public function edit(int $id)
    {
        $task = $this->taskService->getTask($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request, int $id)
    {
        $this->taskService->updateTask($id, $request->validated());
        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso.');
    }

    public function destroy(int $id)
    {
        $task = $this->taskService->getTask($id);

        if ($task->trashed()) {
            $this->taskService->forceDeleteTask($id);
            return redirect()->route('tasks.trashed')->with('success', 'Tarefa apagada definitivamente.');
        }

        $this->taskService->deleteTask($id);
        return redirect()->route('tasks.index')->with('success', 'Tarefa movida para a lixeira.');
    }

    public function restore(int $id)
    {
        $this->taskService->restoreTask($id);
        return redirect()->route('tasks.index')->with('success', 'Tarefa restaurada com sucesso.');
    }
    
    public function trashed(Request $request)
    {
        $tasks = $this->taskService->listTrashedTasks($request->only('status'));
        return view('tasks.trashed', compact('tasks'));
    }


}
