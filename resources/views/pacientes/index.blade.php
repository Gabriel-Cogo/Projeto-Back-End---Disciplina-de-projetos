@extends('layouts.app')

@section('title','Pacientes')

@section('content')
<div class="bg-white shadow rounded p-6">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-semibold">Pacientes</h1>
        <a href="{{ route('pacientes.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Novo Paciente
        </a>
    </div>

    @if($pacientes->count() === 0)
        <p class="text-gray-600">Nenhum paciente cadastrado ainda.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="text-left text-gray-600 border-b">
                        <th class="py-2 pr-4">ID</th>
                        <th class="py-2 pr-4">Nome</th>
                        <th class="py-2 pr-4">CPF</th>
                        <th class="py-2 pr-4">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $p)
                        <tr class="border-b">
                            <td class="py-2 pr-4">{{ $p->id }}</td>
                            <td class="py-2 pr-4">{{ $p->nome }}</td>
                            <td class="py-2 pr-4">{{ $p->cpf }}</td>
                            <td class="py-2 pr-4">
                                <a href="{{ route('pacientes.edit', $p) }}" class="text-blue-600 hover:underline mr-3">Editar</a>
                                <form action="{{ route('pacientes.destroy', $p) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Tem certeza que deseja remover este paciente?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $pacientes->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
