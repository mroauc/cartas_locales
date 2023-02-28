<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // CATEGORIA CARNES = 1
        DB::table('productos')->insert([
            'nombre' => 'Costillar Ahumado',
            'descripcion' => 'Carne',
            'precio' => 6000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 1
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Carne Mechada',
            'descripcion' => 'Carne',
            'precio' => 6000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 1
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Plateada de Cerdo',
            'descripcion' => 'Carne',
            'precio' => 6000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 1
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Pollo a la Plancha',
            'descripcion' => 'Carne',
            'precio' => 6000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 1
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Prietas con Papas',
            'descripcion' => 'Prietas',
            'precio' => 6000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 1
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Paellas Valencianas',
            'descripcion' => 'Paella',
            'precio' => 6000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 1
        ]);
        // PESCADOS 2
        DB::table('productos')->insert([
            'nombre' => 'Caldillo de Mariscos',
            'descripcion' => 'caldillo',
            'precio' => 6000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 2
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Ceviche',
            'descripcion' => 'Ceviche',
            'precio' => 6000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 2
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Pescado Frito',
            'descripcion' => 'Ceviche',
            'precio' => 6000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 2
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Reineta en Salsa Margarita',
            'descripcion' => 'Reineta',
            'precio' => 7000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 2
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Pescado Thai',
            'descripcion' => 'Pescado',
            'precio' => 7000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 2
        ]);
        // PASTAS 4
        DB::table('productos')->insert([
            'nombre' => 'Fetuccini (BOLOGNESA O PESTO)',
            'descripcion' => 'Fetuccini',
            'precio' => 5000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 4
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Raviolis',
            'descripcion' => 'BOLOGNESA O PESTO',
            'precio' => 5000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 4
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Lasagna Mixta',
            'descripcion' => 'Lasagna Mixta',
            'precio' => 5000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 4
        ]);
        // PARA COMPRATIR 5
        DB::table('productos')->insert([
            'nombre' => 'Chorrillanas',
            'descripcion' => 'Papas Fritas, Cebolla Caramelizada, Carne Desmechada, Chorizo y Huevo',
            'precio' => 10000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 5
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Papas de la Casa',
            'descripcion' => 'Papas Fritas, Carne Desmechada, Salsa de Queso Cheddar',
            'precio' => 10000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 5
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Porción de Papas',
            'descripcion' => '',
            'precio' => 2000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 5
        ]);
        //EMPANADAS FRITAS 6
        DB::table('productos')->insert([
            'nombre' => 'Queso',
            'descripcion' => '',
            'precio' => 1500,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 6
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Queso Pollo',
            'descripcion' => '',
            'precio' => 1500,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 6
        ]);
        // Tragos 7
        DB::table('productos')->insert([
            'nombre' => 'Bebida 1.5L',
            'descripcion' => '',
            'precio' => 2000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 7
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Cervezas',
            'descripcion' => '',
            'precio' => 1,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 7
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Limonadas',
            'descripcion' => 'Tradicional o Menta Jengibre',
            'precio' => 1,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 7
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Jugos Naturales',
            'descripcion' => '',
            'precio' => 2000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 7
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Mojitos',
            'descripcion' => 'Clásico o Frutos Rojos',
            'precio' => 4000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 7
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Ramazzotti',
            'descripcion' => 'Spritz (Ramazzotti, Espumante, Agua con gas) o Violeto (Ramazzotti Violetto, Tónica, Arandanos)',
            'precio' => 4000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 7
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Margarita',
            'descripcion' => 'Tequila, limón, triple???',
            'precio' => 2000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 7
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Pisco Sour',
            'descripcion' => '',
            'precio' => 3000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 7
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Mango Sour',
            'descripcion' => '',
            'precio' => 3000,
            'disponible' => 1,
            'stock' => 0,
            'id_categoria' => 7
        ]);
    }
}
