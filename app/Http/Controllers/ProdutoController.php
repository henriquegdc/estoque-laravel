<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Http\Requests\StoreProdutoRequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // with() é eager loading: 2 queries no total.
        // Sem ele, cada linha da tabela dispara 1 query nova. Isso é o problema N+1.
        $produtos = Produto::with('categoria')->latest()->paginate(10);
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create', ['categorias' => Categoria::orderBy('nome')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoRequest $request)
    {
        Produto::create($request->validated());
        return redirect()->route('produtos.index')->with('sucesso', 'Produto criado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
       return redirect()->route('produtos.edit', $produto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        return view('produtos.edit', [
            'produto' => $produto,
            'categorias' => Categoria::orderBy('nome')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProdutoRequest $request, Produto $produto)
    {
        $produto->update($request->validated());
        return redirect()->route('produtos.index')->with('sucesso', 'Produto atualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('sucesso', 'Produto removido.');
    }
}
