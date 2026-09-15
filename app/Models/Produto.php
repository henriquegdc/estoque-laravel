<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'sku','preco','quantidade', 'ativo', 'categoria_id'];
    protected $casts = [
        'preco' => 'decimal:2',
        'ativo' => 'boolean'
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
