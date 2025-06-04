# Gerenciador de Tarefas (To-Do List)

Aplicação desenvolvida em Laravel para gerenciamento de tarefas, como parte de um desafio técnico. O projeto permite cadastrar, listar, editar, excluir (soft delete) e restaurar tarefas, com autenticação protegendo as funcionalidades.

---

## ✨ Funcionalidades

- Cadastro de tarefas com título, descrição e status
- Listagem paginada com filtro por status
- Edição e exclusão com soft delete
- Restauração de tarefas excluídas
- Cada usuário vê apenas suas próprias tarefas
- Autenticação com Laravel Breeze

---

## 🧱 Tecnologias Utilizadas

- Laravel 12
- PHP 8.3
- Breeze (Blade + Auth)
- MySQL
- Blade Templates

---

## ⚙️ Instalação e Execução

### 1. Clone o repositório ou extraia o `.zip`
```bash
git clone https://github.com/seu-usuario/seu-repo.git
cd seu-repo
```

### 2. Instale as dependências PHP

composer install

### 3. Instale as dependências front-end

npm install && npm run build

### 4. Configure o ambiente

cp .env.example .env
php artisan key:generate

Edite o .env com os dados do seu banco (MySQL).

### 5. Execute as migrations e seeders

php artisan migrate --seed

### 6. Inicie o servidor

php artisan serve  
Acesse: http://localhost:8000

👥 Usuários pré-cadastrados:

- Email: teste1@exemplo.com — Senha: senha123  
- Email: teste2@exemplo.com — Senha: senha123


Você também pode se cadastrar via /register.
