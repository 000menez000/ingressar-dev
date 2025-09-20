<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'acao',
                'description' => 'Ação',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'romance',
                'description' => 'Romance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'suspense',
                'description' => 'Suspense',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'drama',
                'description' => 'Drama',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'terror',
                'description' => 'Terror',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'comedia',
                'description' => 'Comédia',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
