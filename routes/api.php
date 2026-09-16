<?php


use App\Http\Resources\ProdutoResource;
use App\Models\Produto;
use Illuminate\Support\Facades\Route;

Route::get('produtos', fn()=> ProdutoResource::collection(Produto::with('categoria')->get()));
Route::get('produtos/{produto}', fn(Produto $produto)=> new ProdutoResource($produto->load('categoria')));
