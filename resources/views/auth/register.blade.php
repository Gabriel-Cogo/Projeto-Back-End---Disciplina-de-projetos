@extends('layouts.app')

@section('title','Cadastro de Administrador')

@section('content')
<div class="max-w-md mx-auto bg-white shadow rounded p-6">
    <h1 class="text-xl font-semibold mb-4">Criar conta (Administrador)</h1>

    <form method="POST" action="{{ route('register.post') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                   class="mt-1 block w-full border-gray-300 rounded-md" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">E-mail</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="mt-1 block w-full border-gray-300 rounded-md" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Senha</label>
            <input type="password" name="password" required
                   class="mt-1 block w-full border-gray-300 rounded-md" />
            <p class="text-xs text-gray-500 mt-1">Mínimo 8 caracteres, com letras e números.</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
            <input type="password" name="password_confirmation" required
                   class="mt-1 block w-full border-gray-300 rounded-md" />
        </div>

        <div class="flex items-start">
            <input id="lgpd_terms" name="lgpd_terms" type="checkbox" required class="h-4 w-4 border-gray-300 rounded mt-1">
            <label for="lgpd_terms" class="ml-2 text-sm text-gray-700">
                Declaro que li e aceito os
                <a href="#" class="text-blue-600 hover:underline">Termos de Uso de Dados (LGPD)</a>.
            </label>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Criar conta
            </button>
            <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">Já tenho conta</a>
        </div>
    </form>
</div>
@endsection
