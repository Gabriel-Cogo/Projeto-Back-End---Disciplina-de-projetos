@extends('layouts.app')

@section('title','Login')

@section('content')
<div style="max-width:400px;margin:40px auto;background:#fff;border-radius:12px;
            box-shadow:0 4px 12px rgba(0,0,0,0.1);padding:30px;font-family:Arial, sans-serif;">

    <h1 style="font-size:22px;font-weight:600;margin-bottom:20px;text-align:center;color:#333;">
        Acessar o Sistema
    </h1>

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <div style="margin-bottom:15px;">
            <label style="display:block;font-size:14px;font-weight:600;color:#555;margin-bottom:5px;">
                E-mail
            </label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                   style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;font-size:14px;" />
        </div>

        <div style="margin-bottom:15px;">
            <label style="display:block;font-size:14px;font-weight:600;color:#555;margin-bottom:5px;">
                Senha
            </label>
            <input type="password" name="password" required
                   style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;font-size:14px;" />
        </div>

        <div style="margin-bottom:15px;display:flex;align-items:center;">
            <input id="remember" name="remember" type="checkbox"
                   style="margin-right:6px;width:16px;height:16px;border:1px solid #bbb;border-radius:3px;">
            <label for="remember" style="font-size:13px;color:#555;">Lembrar de mim</label>
        </div>

        <div style="display:flex;justify-content:space-between;align-items:center;">
            <button type="submit"
                    style="background:#2563eb;color:#fff;font-size:14px;font-weight:600;
                           padding:10px 18px;border:none;border-radius:6px;cursor:pointer;
                           transition:background 0.3s;">
                Entrar
            </button>

            <a href="{{ route('register') }}"
               style="font-size:13px;color:#2563eb;text-decoration:none;font-weight:500;">
                Criar conta
            </a>
        </div>
    </form>

    <div style="margin-top:25px;text-align:center;font-size:13px;color:#666;">
        Não tem conta ainda?
        <a href="{{ route('register') }}" style="color:#2563eb;font-weight:600;text-decoration:none;">
            Crie uma agora
        </a><br>
        <small>
            Ao criar conta, você concorda com os
            <a href="{{ route('legal.termos') }}" style="color:#2563eb;text-decoration:none;">
                Termos de Uso de Dados (LGPD)
            </a>.
        </small>
    </div>
</div>
@endsection
