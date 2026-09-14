<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>@yield('titulo', 'Estoque')</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 900px; margin: 2rem auto; padding: 0 1rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { border: 1px solid #ccc; padding: .5rem; text-align: left; }
        .sucesso { background: #e6ffed; border: 1px solid #34a853; padding: .5rem; }
        .erro { color: #c00; }
        label { display: block; margin-top: .75rem; }
        input, select { padding: .35rem; min-width: 260px; }
    </style>
</head>
<body>
    <h1><a href="{{ route('produtos.index') }}">Estoque</a></h1>

    @if (session('sucesso'))
        <p class="sucesso">{{ session('sucesso') }}</p>
    @endif

    @yield('conteudo')
</body>
</html>