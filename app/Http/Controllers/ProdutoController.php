<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\StoreProdutoRequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::latest()->paginate(10);
        return view('produtos.index', compact('pordutos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoRequest $request)
    {
        Produto::create($request->all());
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
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RStoreProdutoRequest $request, Produto $produto)
    {
        $produto->update($request->all());
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
