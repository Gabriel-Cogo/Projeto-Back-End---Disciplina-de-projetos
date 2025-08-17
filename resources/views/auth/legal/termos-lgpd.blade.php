@extends('layouts.app')

@section('title','Termos de Uso de Dados (LGPD)')

@section('content')
<div class="bg-white shadow rounded p-6 prose max-w-none">
    <h1>Termos de Uso de Dados (LGPD)</h1>
    <p>Este sistema armazena dados pessoais de pacientes para fins acadêmicos de demonstração. Os dados são protegidos por autenticação e restrição de acesso por usuário. Não há compartilhamento externo.</p>
    <h2>Coleta e Tratamento</h2>
    <ul>
        <li>Dados coletados: nome e CPF do paciente.</li>
        <li>Controlador: o usuário administrador autenticado.</li>
        <li>Base legal: legítimo interesse acadêmico de demonstração.</li>
    </ul>
    <h2>Direitos do Titular</h2>
    <p>Mediante solicitação, o titular pode requerer atualização, exclusão e acesso aos dados cadastrados.</p>
    <p class="mt-4">
        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Voltar ao cadastro</a>
    </p>
</div>
@endsection
