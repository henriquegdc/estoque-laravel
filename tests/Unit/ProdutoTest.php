<?php

namespace Tests\Unit;

use App\Models\Produto;
use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    public function test_fillable_descarta_campo_nao_listado(): void
    {
       $produto = new Produto(['nome'=>'Teclado', 'id'=> 99]);

        //asserções a serem testadas
       $this->assertEquals('Teclado', $produto->nome);
       $this->assertNull($produto->id); 
    }
}