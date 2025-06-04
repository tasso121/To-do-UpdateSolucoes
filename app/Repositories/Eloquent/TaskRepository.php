<?php

namespace App\Repositories\Eloquent;

use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function all(array $filters = [])
    {
        $query = Task::where('user_id', auth()->id());

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        return $query->orderByDesc('created_at')->paginate(10);
    }

    public function find(int $id)
    {
        return Task::withTrashed()
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();
    }

    public function create(array $data)
    {
        $data['user_id'] = auth()->id(); 
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

    public function forceDelete(int $id)
    {
        $task = Task::withTrashed()
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return $task->forceDelete();
    }

    public function restore(int $id)
    {
        $task = Task::onlyTrashed()
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return $task->restore();
    }

    public function trashed(array $filters = [])
    {
        $query = Task::onlyTrashed()
            ->where('user_id', auth()->id());

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        return $query->orderByDesc('deleted_at')->paginate(10);
    }
}

