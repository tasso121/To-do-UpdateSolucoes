<?php

namespace App\Services\Interfaces;

interface TaskServiceInterface
{
    public function listTasks(array $filters = []);
    public function getTask(int $id);
    public function createTask(array $data);
    public function updateTask(int $id, array $data);
    public function deleteTask(int $id);
    public function ForcedeleteTask(int $id);
    public function restoreTask(int $id);
    public function listTrashedTasks(array $filters = []);
}
