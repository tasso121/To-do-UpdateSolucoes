<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::where('email', 'teste1@exemplo.com')->first();
        $user2 = User::where('email', 'teste2@exemplo.com')->first();

        Task::create([
            'title' => 'Comprar leite',
            'description' => 'Ir ao mercado',
            'status' => 'pending',
            'user_id' => $user1->id,
        ]);

        Task::create([
            'title' => 'Estudar Laravel',
            'description' => 'Focar em Eloquent e migrations',
            'status' => 'completed',
            'user_id' => $user1->id,
        ]);

        Task::create([
            'title' => 'Arrumar quarto',
            'description' => 'Organizar livros',
            'status' => 'pending',
            'user_id' => $user2->id,
        ]);

        Task::create([
            'title' => 'Ler um livro',
            'description' => 'Finalizar o capítulo 5 de DDD',
            'status' => 'pending',
            'user_id' => $user1->id,
        ]);

        Task::create([
            'title' => 'Fazer backup',
            'description' => 'Salvar arquivos importantes em nuvem',
            'status' => 'completed',
            'user_id' => $user2->id,
        ]);

    }
}
