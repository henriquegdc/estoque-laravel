<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'id' => $this->id,
        'nome' => $this->nome,
        'sku' => $this->sku,
        'preco' => (float) $this->preco,
        'quantidade' => $this->quantidade,
        'ativo' => $this->ativo,
        'categoria' => $this->whenLoaded('categoria', fn () => [
            'id' => $this->categoria->id,
            'nome' => $this->categoria->nome,
            ]),
        ];
    }
}
