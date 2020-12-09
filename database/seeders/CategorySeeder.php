<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'type' => 'Acessórios',
        ]);
        DB::table('categories')->insert([
            'type' => 'Beleza',
        ]);
        DB::table('categories')->insert([
            'type' => 'Calçados, roupas e bolsas',
        ]);
        DB::table('categories')->insert([
            'type' => 'Eletrônicos',
        ]);
        DB::table('categories')->insert([
            'type' => 'Eletrodomésticos',
        ]);
        DB::table('categories')->insert([
            'type' => 'Móveis',
        ]);
        DB::table('categories')->insert([
            'type' => 'Informática',
        ]);
        DB::table('categories')->insert([
            'type' => 'Imóveis',
        ]);
        DB::table('categories')->insert([
            'type' => 'Veículos',
        ]);
    }
}
