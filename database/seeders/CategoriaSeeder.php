<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_productos')->insert([
            'nombre' => 'Carnes',
            'pos_carta' => 1
        ]);
        DB::table('categoria_productos')->insert([
            'nombre' => 'Pescados',
            'pos_carta' => 2
        ]);
        DB::table('categoria_productos')->insert([
            'nombre' => 'Menu para Niños',
            'pos_carta' => 3
        ]);
        DB::table('categoria_productos')->insert([
            'nombre' => 'Pastas',
            'pos_carta' => 4
        ]);
        DB::table('categoria_productos')->insert([
            'nombre' => 'Para Compartir',
            'pos_carta' => 5
        ]);
        DB::table('categoria_productos')->insert([
            'nombre' => 'Empanadas Fritas',
            'pos_carta' => 6
        ]);
        DB::table('categoria_productos')->insert([
            'nombre' => 'Tragos',
            'pos_carta' => 7
        ]);
        DB::table('categoria_productos')->insert([
            'nombre' => 'Otros',
            'pos_carta' => 8
        ]);
    }
}
