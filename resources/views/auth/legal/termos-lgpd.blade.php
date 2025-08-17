@extends('layouts.app')

@section('title','Termos de Uso de Dados (LGPD)')

@section('content')
<div style="max-width:700px;margin:40px auto;background:#fff;border-radius:12px;
            box-shadow:0 4px 12px rgba(0,0,0,0.1);padding:30px;font-family:Arial, sans-serif;
            line-height:1.6;color:#333;">

    <h1 style="font-size:24px;font-weight:700;margin-bottom:20px;text-align:center;color:#222;">
        Termos de Uso de Dados (LGPD)
    </h1>

    <p style="margin-bottom:15px;">
        Este sistema armazena dados pessoais de pacientes para fins acadêmicos de demonstração.
        Os dados são protegidos por autenticação e restrição de acesso por usuário.
        Não há compartilhamento externo.
    </p>

    <h2 style="font-size:18px;font-weight:600;margin:25px 0 10px;color:#2563eb;">
        Coleta e Tratamento
    </h2>
    <ul style="margin-left:20px;margin-bottom:20px;">
        <li style="margin-bottom:8px;">Dados coletados: nome e CPF do paciente.</li>
        <li style="margin-bottom:8px;">Controlador: o usuário administrador autenticado.</li>
        <li style="margin-bottom:8px;">Base legal: legítimo interesse acadêmico de demonstração.</li>
    </ul>

    <h2 style="font-size:18px;font-weight:600;margin:25px 0 10px;color:#2563eb;">
        Direitos do Titular
    </h2>
    <p style="margin-bottom:20px;">
        Mediante solicitação, o titular pode requerer atualização, exclusão e acesso aos dados cadastrados.
    </p>

    <div style="margin-top:30px;text-align:center;">
        <a href="{{ route('register') }}"
           style="background:#2563eb;color:#fff;padding:10px 20px;border-radius:6px;
                  font-size:14px;font-weight:600;text-decoration:none;
                  transition:background 0.3s;">
            Voltar ao cadastro
        </a>
    </div>
</div>
@endsection
