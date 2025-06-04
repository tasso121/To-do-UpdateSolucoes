<?php

namespace App\Repositories\Interfaces;

interface TaskRepositoryInterface
{
    public function all(array $filters = []);
    public function find(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
    public function restore(int $id);
    public function trashed(array $filters = []);
}
