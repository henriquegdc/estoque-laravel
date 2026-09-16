<?php

namespace Tests\Feature;

use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProdutoCrudTest extends TestCase{

use RefreshDatabase; // Limpa o banco a cada teste.

private function dados(array $extra = []): array
{
    return array_merge([
        'nome' => 'Teclado Mecanico',
        'sku' => 'TEC-001',
        'preco' => 199.90,
        'quantidade' => 10,
        'ativo' => 1,
    ], $extra);
    }

public function test_listagem_responde_e_mostra_o_produto(): void
{
    Produto::create($this->dados());

    $this->get('/produtos')->assertStatus(200)->assertSee('Teclado Mecanico');

}

public function test_criacao_valida_grava_e_redireciona(): void
{
    $resposta = $this->post('/produtos', $this->dados());
    
    $resposta->assertRedirect(route('produtos.index'));
    $resposta->assertSessionHas('sucesso');
    $this->assertDatabaseHas('produtos',['sku'=>'TEC-001']);

}

public function test_nome_vazio_e_recusado(): void
    {
        $resposta = $this->post('/produtos', $this->dados(['nome' => '']));

        $resposta->assertSessionHasErrors(['nome']);
        $this->assertDatabaseCount('produtos', 0);
    }

    public function test_sku_duplicado_e_recusado(): void
    {
        Produto::create($this->dados());

        $resposta = $this->post('/produtos', $this->dados(['nome' => 'Outro']));

        $resposta->assertSessionHasErrors(['sku']);
        $this->assertDatabaseCount('produtos', 1);
    }

    public function test_preco_negativo_e_recusado(): void
    {
        $this->post('/produtos', $this->dados(['preco' => -1]))
            ->assertSessionHasErrors(['preco']);
    }

    public function test_remocao_apaga_do_banco(): void
    {
        $produto = Produto::create($this->dados());

        $this->delete(route('produtos.destroy', $produto))
            ->assertRedirect(route('produtos.index'));

        $this->assertDatabaseMissing('produtos', ['id' => $produto->id]);
    }



}