<?php

namespace Tests\Unit;

use App\Models\Categoria;
use PHPUnit\Framework\TestCase;

class CategoriaTest extends TestCase{
    
    public function test_fillable_descarta_campo_nao_listado(): void
    {
        $categoria = new Categoria(['nome'=>'Periféricos', 'id'=> 69]);
        $this->assertEquals('Periféricos', $categoria->nome);
        $this->assertNull($categoria->id);
    }

}
