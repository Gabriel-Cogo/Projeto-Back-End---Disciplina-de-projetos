@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<div class="bg-white shadow rounded p-6">
    <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>
    <p class="mb-4">Gerencie os pacientes cadastrados por você.</p>
    <a href="{{ route('pacientes.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Ir para Pacientes
    </a>
</div>
@endsection
