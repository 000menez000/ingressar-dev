<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'description' => 'Administrador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user',
                'description' => 'Usuário Comum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'teste',
                'description' => 'Usuário para Testar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
