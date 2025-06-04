<?php

namespace App\Repositories\Eloquent;

use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function all(array $filters = [])
    {
        $query = Task::query();

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        return $query->orderByDesc('created_at')->paginate(10);
    }

    public function find(int $id)
    {
        return Task::withTrashed()->findOrFail($id);
    }

    public function create(array $data)
    {
        return Task::create($data);
    }

    public function update(int $id, array $data)
    {
        $task = $this->find($id);
        $task->update($data);
        return $task;
    }

    public function delete(int $id)
    {
        $task = $this->find($id);
        return $task->delete();
    }

    public function restore(int $id)
    {
        $task = Task::onlyTrashed()->findOrFail($id);
        return $task->restore();
    }
    
    public function trashed(array $filters = [])
    {
        $query = Task::onlyTrashed();

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        return $query
            ->orderByDesc('deleted_at')
            ->paginate(10);
    }
}
