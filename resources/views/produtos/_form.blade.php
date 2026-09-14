<label>Nome
    <input type="text" name="nome" value="{{ $produto->nome ?? '' }}">
</label>

<label>SKU
    <input type="text" name="sku" value="{{ $produto->sku ?? '' }}">
</label>

<label>Preço
    <input type="number" step="0.01" name="preco" value="{{ $produto->preco ?? '' }}">
</label>

<label>Quantidade
    <input type="number" name="quantidade" value="{{ $produto->quantidade ?? 0 }}">
</label>

<label>
    <input type="hidden" name="ativo" value="0">
    <input type="checkbox" name="ativo" value="1"
           {{ ($produto->ativo ?? true) ? 'checked' : '' }}> Ativo
</label>

<p><button type="submit">Salvar</button></p>