<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $categorias = collect(['Periféricos', 'Monitores', 'Cadeiras']) -> map(fn($nome)=> \App\Models\Categoria::create(['nome'=>$nome]));
       foreach(range(1,20) as $i){
            \App\Models\Produto::create([
                'nome' => "Produto $i",
                'sku' => sprintf('SKU%03d', $i),
                'preco' => rand(1000, 50000)/100,
                'quantidade' => rand(0, 50),
                'ativo' => (bool) rand(0, 1),
                'categoria_id' => $categorias->random()->id,
            ]);
       }
    }
}
