@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<div style="max-width:900px;margin:40px auto;background:#fff;border-radius:12px;
            box-shadow:0 4px 12px rgba(0,0,0,0.1);padding:28px;font-family:Arial, sans-serif;
            line-height:1.6;color:#333;">

    <h1 style="font-size:22px;font-weight:700;margin-bottom:8px;color:#222;">
        Dashboard
    </h1>
    <p style="margin-bottom:18px;color:#555;">
        Gerencie os pacientes cadastrados por você.
    </p>

    <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:6px;">
        <a href="{{ route('pacientes.index') }}"
           style="display:inline-block;background:#2563eb;color:#fff;padding:10px 18px;border-radius:6px;
                  font-size:14px;font-weight:600;text-decoration:none;transition:background .2s;">
            Ir para Pacientes
        </a>

        <a href="{{ route('pacientes.create') }}"
           style="display:inline-block;background:#16a34a;color:#fff;padding:10px 18px;border-radius:6px;
                  font-size:14px;font-weight:600;text-decoration:none;transition:background .2s;">
            Cadastrar Paciente
        </a>
    </div>

    {{-- Bloco opcional de “cards” rápidos (pode remover se não quiser) --}}
    @isset($stats)
    <div style="margin-top:24px;display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;">
        <div style="background:#f9fafb;border:1px solid #eef2f7;border-radius:10px;padding:16px;">
            <div style="font-size:12px;color:#6b7280;">Total de Pacientes</div>
            <div style="font-size:22px;font-weight:700;color:#111827;">{{ $stats['total'] ?? 0 }}</div>
        </div>
        <div style="background:#f9fafb;border:1px solid #eef2f7;border-radius:10px;padding:16px;">
            <div style="font-size:12px;color:#6b7280;">Cadastrados Recentemente</div>
            <div style="font-size:22px;font-weight:700;color:#111827;">{{ $stats['recentes'] ?? 0 }}</div>
        </div>
    </div>
    @endisset
</div>
@endsection
