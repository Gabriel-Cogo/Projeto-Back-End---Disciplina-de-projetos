@extends('layouts.app')

@section('title','Novo Paciente')

@section('content')
<div class="max-w-lg bg-white shadow rounded p-6">
    <h1 class="text-xl font-semibold mb-4">Cadastrar Paciente</h1>

    <form method="POST" action="{{ route('pacientes.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" name="nome" value="{{ old('nome') }}" required
                   class="mt-1 block w-full border-gray-300 rounded-md" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">CPF</label>
            <input type="text" name="cpf" value="{{ old('cpf') }}" required placeholder="Somente números"
                   class="mt-1 block w-full border-gray-300 rounded-md" />
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('pacientes.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Salvar</button>
        </div>
    </form>
</div>
@endsection
