Sistema de Gerenciamento de Pacientes (Back-End com Laravel)

Este projeto foi desenvolvido como parte da disciplina de Projetos, com foco no Back-end.
A aplicação foi feita em Laravel 12 (PHP) e simula um sistema de gerenciamento de pacientes, com autenticação de administradores, CRUD completo de pacientes e conformidade com a LGPD.


Tecnologias:

PHP 8.2+

Laravel 12

MySQL (banco relacional)

Laravel Sanctum (autenticação com token)

Blade (views com HTML + CSS inline)

XAMPP (ambiente local)

GitHub (código aberto e versionado)


Funcionalidades:

Cadastro e login de administradores

Autenticação segura (hash de senha)

CRUD de pacientes (cadastrar, listar, editar, excluir)

Proteção de rotas (apenas logados acessam o sistema)

Aceite obrigatório da LGPD no cadastro

Logs de eventos importantes (cadastro, login, exclusão)

Interface simples com Blade + CSS inline

API documentada com exemplos de requisições e respostas


Requisitos Funcionais:

RF01 – Cadastro de Pacientes

RF02 – Listagem de Pacientes

RF03 – Edição de Pacientes

RF04 – Exclusão de Pacientes

RF05 – Autenticação de Usuário

RF06 – Cadastro de Administrador

RF07 – Proteção de Rotas


Requisitos Não Funcionais:

RNF01 – Uso do Laravel

RNF02 – Banco de Dados Relacional (MySQL)

RNF03 – Segurança e LGPD

RNF04 – Autenticação com Sanctum (JWT)

RNF05 – Testes locais (Postman + XAMPP)

RNF06 – Código aberto no GitHub


Endpoints da API:
Autenticação

Registrar Administrador
POST /api/register

{ "name": "Admin", "email": "admin@email.com", "password": "senha123", "password_confirmation": "senha123" }


Resposta 201:

{ "message": "Usuário cadastrado com sucesso.", "token": "...", "user": { "id": 1, "name": "Admin", "email": "admin@email.com" } }


Login
POST /api/login

{ "email": "admin@email.com", "password": "senha123" }


Resposta 200:

{ "token": "...", "user": { "id": 1, "name": "Admin", "email": "admin@email.com" } }


Logout
POST /api/logout
Resposta 200:

{ "message": "Token revogado." }


Perfil do Usuário
GET /api/me
Resposta 200:

{ "id": 1, "name": "Admin", "email": "admin@email.com" }

Pacientes

Listar Pacientes
GET /api/pacientes
Resposta 200:

[ { "id":1, "nome":"João Silva", "cpf":"12345678900" } ]


Criar Paciente
POST /api/pacientes

{ "nome": "João Silva", "cpf": "12345678900" }


Resposta 201:

{ "id": 3, "nome": "João Silva", "cpf": "12345678900", "user_id": 1 }


Editar Paciente
PUT /api/pacientes/{id}

{ "nome": "João Silva Jr." }


Resposta 200:

{ "id": 1, "nome": "João Silva Jr.", "cpf": "12345678900", "user_id": 1 }


Excluir Paciente
DELETE /api/pacientes/{id}
Resposta 204 (sem conteúdo).


Rotas Web:

/login – Login de administrador

/register – Cadastro de administrador (com LGPD)

/dashboard – Painel principal

/pacientes – Lista de pacientes

/pacientes/create – Novo paciente

/pacientes/{id}/edit – Editar paciente

/termos-lgpd – Termos da LGPD


Como Rodar o Projeto Localmente:

Clone o repositório:

git clone https://github.com/SEU_USUARIO/Projeto-Back-End---Disciplina-de-projetos.git
cd Projeto-Back-End---Disciplina-de-projetos


Instale as dependências:

composer install
npm install && npm run dev


Configure o arquivo .env (banco, porta, etc.).

Rode as migrations:

php artisan migrate


Suba o servidor:

php artisan serve


Acesse no navegador:
http://localhost:8000


Referências:

Documentação do Laravel

MySQL Documentation

LGPD – Lei Geral de Proteção de Dados
