<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>@yield('title','Sistema de Pacientes')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tailwind via CDN (sem build) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Form styles opcionais (simples) --}}
    <style>
        input, select, textarea { @apply border border-gray-300 rounded-md px-3 py-2 w-full; }
        label { @apply block text-sm font-medium text-gray-700; }
        table th, table td { @apply px-3 py-2; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-white border-b shadow-sm">
        <div class="max-w-5xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('dashboard') }}" class="font-semibold text-gray-800">Sistema de Pacientes</a>
            @auth
            <div class="flex items-center gap-3">
                <span class="text-sm text-gray-600">Olá, {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-600 hover:underline">Sair</button>
                </form>
            </div>
            @endauth
        </div>
    </nav>

    <main class="max-w-5xl mx-auto p-4">
        {{-- Flash messages --}}
        @if (session('success'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-800">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
