<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


class StoreProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $produtoId = $this->route('produto')?->id;

        return [
            'nome' => ['required', 'string', 'max:255'],
            'sku' => ['required', 'string', 'max:50', Rule::unique('produtos', 'sku')->ignore($produtoId)],
            'preco' => ['required', 'numeric', 'min:0'],
            'quantidade' => ['required', 'integer', 'min:0'],
            'ativo' => ['required', 'boolean'],
        ];
    }
    public function message(): array{

        return[
            'sku.unique'=> 'Já existe um produto com este SKU.',
            'preco.min' => 'O preço não pode ser negativo.',
        ];
    }
}
