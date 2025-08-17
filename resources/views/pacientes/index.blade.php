@extends('layouts.app')

@section('title','Pacientes')

@section('content')
<div style="max-width:900px;margin:40px auto;background:#fff;border-radius:12px;
            box-shadow:0 4px 12px rgba(0,0,0,0.1);padding:28px;font-family:Arial, sans-serif;
            line-height:1.6;color:#333;">

    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
        <h1 style="font-size:22px;font-weight:700;color:#222;">Pacientes</h1>
        <a href="{{ route('pacientes.create') }}"
           style="background:#2563eb;color:#fff;padding:10px 18px;border-radius:6px;
                  font-size:14px;font-weight:600;text-decoration:none;transition:background .2s;">
            Novo Paciente
        </a>
    </div>

    @if($pacientes->count() === 0)
        <p style="color:#666;font-size:14px;">Nenhum paciente cadastrado ainda.</p>
    @else
        <div style="overflow-x:auto;">
            <table style="width:100%;border-collapse:collapse;font-size:14px;">
                <thead>
                    <tr style="background:#f9fafb;text-align:left;color:#444;border-bottom:2px solid #e5e7eb;">
                        <th style="padding:10px;">ID</th>
                        <th style="padding:10px;">Nome</th>
                        <th style="padding:10px;">CPF</th>
                        <th style="padding:10px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $p)
                        <tr style="border-bottom:1px solid #eee;">
                            <td style="padding:10px;">{{ $p->id }}</td>
                            <td style="padding:10px;">{{ $p->nome }}</td>
                            <td style="padding:10px;">{{ $p->cpf }}</td>
                            <td style="padding:10px;">
                                <a href="{{ route('pacientes.edit', $p) }}"
                                   style="color:#2563eb;font-weight:600;text-decoration:none;margin-right:10px;">
                                    Editar
                                </a>
                                <form action="{{ route('pacientes.destroy', $p) }}" method="POST" style="display:inline;"
                                      onsubmit="return confirm('Tem certeza que deseja remover este paciente?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            style="background:none;border:none;color:#dc2626;font-weight:600;
                                                   cursor:pointer;text-decoration:underline;">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="margin-top:20px;">
                {{ $pacientes->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
