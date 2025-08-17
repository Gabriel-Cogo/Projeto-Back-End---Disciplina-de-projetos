@extends('layouts.app')

@section('title','Cadastro de Administrador')

@section('content')
<div style="max-width:500px;margin:40px auto;background:#fff;border-radius:12px;
            box-shadow:0 4px 12px rgba(0,0,0,0.1);padding:30px;font-family:Arial, sans-serif;
            line-height:1.6;color:#333;">

    <h1 style="font-size:22px;font-weight:700;margin-bottom:25px;text-align:center;color:#222;">
        Criar conta (Administrador)
    </h1>

    <form method="POST" action="{{ route('register.post') }}">
        @csrf

        <div style="margin-bottom:18px;">
            <label style="display:block;font-size:14px;font-weight:600;margin-bottom:6px;color:#444;">
                Nome
            </label>
            <input type="text" name="name" value="{{ old('name') }}" required
                   style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;
                          font-size:14px;" />
        </div>

        <div style="margin-bottom:18px;">
            <label style="display:block;font-size:14px;font-weight:600;margin-bottom:6px;color:#444;">
                E-mail
            </label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;
                          font-size:14px;" />
        </div>

        <div style="margin-bottom:18px;">
            <label style="display:block;font-size:14px;font-weight:600;margin-bottom:6px;color:#444;">
                Senha
            </label>
            <input type="password" name="password" required
                   style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;
                          font-size:14px;" />
            <p style="font-size:12px;color:#666;margin-top:6px;">
                Mínimo 8 caracteres, com letras e números.
            </p>
        </div>

        <div style="margin-bottom:18px;">
            <label style="display:block;font-size:14px;font-weight:600;margin-bottom:6px;color:#444;">
                Confirmar Senha
            </label>
            <input type="password" name="password_confirmation" required
                   style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;
                          font-size:14px;" />
        </div>

        <div style="display:flex;align-items:flex-start;margin-bottom:20px;">
            <input id="lgpd_terms" name="lgpd_terms" type="checkbox" required
                   style="margin-top:4px;width:16px;height:16px;" />
            <label for="lgpd_terms" style="margin-left:8px;font-size:13px;color:#444;line-height:1.4;">
                Declaro que li e aceito os
                <a href="{{ route('legal.termos') }}" style="color:#2563eb;text-decoration:none;">
                    Termos de Uso de Dados (LGPD)
                </a>.
            </label>
        </div>

        <div style="display:flex;align-items:center;justify-content:space-between;">
            <button type="submit"
                    style="background:#16a34a;color:#fff;padding:10px 18px;border:none;border-radius:6px;
                           font-size:14px;font-weight:600;cursor:pointer;transition:background 0.3s;">
                Criar conta
            </button>
            <a href="{{ route('login') }}" style="font-size:13px;color:#2563eb;text-decoration:none;">
                Já tenho conta
            </a>
        </div>
    </form>
</div>
@endsection
