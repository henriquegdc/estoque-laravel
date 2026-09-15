@if ($errors->any())
    <ul class="erro">
        @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
        @endforeach
    </ul>
@endif

<label>Nome
    <input type="text" name="nome" value="{{ old('nome', $produto->nome ?? '') }}">
</label>

<label>SKU
    <input type="text" name="sku" value="{{ old('sku', $produto->sku ?? '') }}">
</label>

<label>Preço
    <input type="number" step="0.01" name="preco" value="{{old('preco', $produto->preco ?? '' ) }}">
</label>

<label>Quantidade
    <input type="number" name="quantidade" value="{{ old('quantidade',$produto->quantidade ?? 0) }}">
</label>

<label>
    <input type="hidden" name="ativo" value="0">
    <input type="checkbox" name="ativo" value="1"
           {{ old('ativo', $produto->ativo ?? true) ? 'checked' : '' }}> Ativo
</label>

<label>Categoria
    <select name="categoria_id">
        <option value="">Sem categoria</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}"
                {{ (string) old('categoria_id', $produto->categoria_id ?? '') === (string) $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nome }}
            </option>
        @endforeach
    </select>
</label>

<p><button type="submit">Salvar</button></p>