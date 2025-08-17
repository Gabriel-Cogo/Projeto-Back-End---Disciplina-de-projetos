@extends('layouts.app')

@section('title','Editar Paciente')

@section('content')
<div style="max-width:520px;margin:40px auto;background:#fff;border-radius:12px;
            box-shadow:0 4px 12px rgba(0,0,0,0.1);padding:28px;font-family:Arial, sans-serif;
            line-height:1.6;color:#333;">

    <h1 style="font-size:22px;font-weight:700;margin-bottom:22px;text-align:center;color:#222;">
        Editar Paciente #{{ $paciente->id }}
    </h1>

    <form method="POST" action="{{ route('pacientes.update', $paciente) }}">
        @csrf
        @method('PUT')

        <div style="margin-bottom:18px;">
            <label style="display:block;font-size:14px;font-weight:600;margin-bottom:6px;color:#444;">
                Nome
            </label>
            <input type="text" name="nome" value="{{ old('nome', $paciente->nome) }}" required
                   style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;
                          font-size:14px;" />
        </div>

        <div style="margin-bottom:6px;">
            <label style="display:block;font-size:14px;font-weight:600;margin-bottom:6px;color:#444;">
                CPF
            </label>
            <input type="text" name="cpf" value="{{ old('cpf', $paciente->cpf) }}" required placeholder="Somente números"
                   style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;
                          font-size:14px;" />
        </div>
        <p style="font-size:12px;color:#666;margin:8px 0 18px;">
            Use apenas números (ex.: 12345678900).
        </p>

        <div style="display:flex;gap:10px;align-items:center;justify-content:flex-end;">
            <a href="{{ route('pacientes.index') }}"
               style="display:inline-block;background:#e5e7eb;color:#111827;padding:10px 16px;
                      border-radius:6px;font-size:14px;text-decoration:none;">
                Cancelar
            </a>
            <button type="submit"
                    style="background:#2563eb;color:#fff;padding:10px 18px;border:none;border-radius:6px;
                           font-size:14px;font-weight:600;cursor:pointer;transition:background .2s;">
                Salvar alterações
            </button>
        </div>
    </form>
</div>
@endsection
