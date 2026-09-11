<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'sku','preco','quantidade', 'ativo'];
    protected $casts = [
        'preco' => 'decimal:2',
        'ativo' => 'boolean'
    ];
}
