<?php

namespace Tests\Feature;

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoriaCrudTest extends TestCase{

    use RefreshDatabase; // Limpa o banco a cada teste.

    private function dados(array $extra = []): array
    {
        return array_merge([
            'nome' => 'Periféricos',
        ], $extra);
    }

    public function test_listagem_responde_e_mostra_a_categoria(): void
    {
        Categoria::create($this->dados());

        $this->get('/categorias')->assertStatus(200)->assertSee('Periféricos');

    }

    public function test_criacao_valida_grava_e_redireciona(): void
    {
        $resposta = $this->post('/categorias', $this->dados());
        
        $resposta->assertRedirect(route('categorias.index'));
        $resposta->assertSessionHas('sucesso');
        $this->assertDatabaseHas('categorias',['nome'=>'Periféricos']);

    }

    public function test_nome_vazio_e_recusado(): void
    {
        $resposta = $this->post('/categorias', $this->dados(['nome' => '']));

        $resposta->assertSessionHasErrors(['nome']);
        $this->assertDatabaseCount('categorias', 0);
    }

    public function test_nome_duplicado_e_recusado(): void
    {
        Categoria::create($this->dados());

        $resposta = $this->post('/categorias', $this->dados());

        $resposta->assertSessionHasErrors(['nome']);
        $this->assertDatabaseCount('categorias', 1);
    }

}
