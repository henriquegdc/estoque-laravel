@extends('layouts.app')
@section('titulo', 'Produtos')

@section('conteudo')
    <a href="{{ route('produtos.create') }}">Novo produto</a>

    <table>
        <thead>
            <tr><th>Nome</th><th>SKU</th><th>Preço</th><th>Qtd</th><th>Ativo</th><th>Categoria</th><th>Ações</th></tr>
        </thead>
        <tbody>
            @forelse ($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->sku }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td>{{ $produto->ativo ? 'Sim' : 'Não' }}</td>
                    <td>{{ $produto->categoria?->nome ?? 'Sem categoria' }}</td>
                    <td>
                        <a href="{{ route('produtos.edit', $produto) }}">Editar</a>
                        <form action="{{ route('produtos.destroy', $produto) }}" method="POST"
                              style="display:inline" onsubmit="return confirm('Remover?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remover</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7">Nenhum produto cadastrado.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $produtos->links() }}
@endsection