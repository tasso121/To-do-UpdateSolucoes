<?php

namespace App\Services\Eloquent;

use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Services\Interfaces\TaskServiceInterface;

class TaskService implements TaskServiceInterface
{
    protected TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function listTasks(array $filters = [])
    {
        return $this->taskRepository->all($filters);
    }

    public function getTask(int $id)
    {
        return $this->taskRepository->find($id);
    }

    public function createTask(array $data)
    {
        return $this->taskRepository->create($data);
    }

    public function updateTask(int $id, array $data)
    {
        return $this->taskRepository->update($id, $data);
    }

    public function deleteTask(int $id)
    {
        return $this->taskRepository->delete($id);
    }

    public function forceDeleteTask(int $id)
    {
        return $this->taskRepository->forceDelete($id);
    }
    
    public function restoreTask(int $id)
    {
        return $this->taskRepository->restore($id);
    }
    
    public function listTrashedTasks(array $filters = [])
    {
        return $this->taskRepository->trashed($filters);
    }
}
