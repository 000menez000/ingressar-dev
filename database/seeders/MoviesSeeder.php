<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            ['title' => 'O Exterminador do Futuro', 'description' => 'Clássico de ação e ficção científica.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 6600, 'categories' => [1]], // Ação
            ['title' => 'Titanic', 'description' => 'Romance épico a bordo de um navio lendário.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 11800, 'categories' => [2, 4]], // Romance + Drama
            ['title' => 'Corra!', 'description' => 'Suspense psicológico e social.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 6300, 'categories' => [3, 5]], // Suspense + Terror
            ['title' => 'O Poderoso Chefão', 'description' => 'Drama da máfia italiana.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 10500, 'categories' => [4]],
            ['title' => 'Pânico', 'description' => 'Clássico do terror dos anos 90.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 6900, 'categories' => [5]],
            ['title' => 'Se Beber, Não Case!', 'description' => 'Comédia de amigos em Las Vegas.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 6000, 'categories' => [6]],
            ['title' => 'Matrix', 'description' => 'Filosofia e ação em um mundo virtual.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 8100, 'categories' => [1, 3]],
            ['title' => 'Diário de uma Paixão', 'description' => 'Um romance inesquecível.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 6900, 'categories' => [2]],
            ['title' => 'A Ilha do Medo', 'description' => 'Suspense de Martin Scorsese.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 7800, 'categories' => [3, 4]],
            ['title' => 'Cisne Negro', 'description' => 'Drama psicológico intenso.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 6900, 'categories' => [4, 3]],
            ['title' => 'Invocação do Mal', 'description' => 'Baseado em fatos reais.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 7100, 'categories' => [5]],
            ['title' => 'As Branquelas', 'description' => 'Comédia clássica dos anos 2000.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 6500, 'categories' => [6]],
            ['title' => 'John Wick', 'description' => 'Um homem em busca de vingança.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 7200, 'categories' => [1]],
            ['title' => 'Amor à Segunda Vista', 'description' => 'Comédia romântica leve.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 5400, 'categories' => [2, 6]],
            ['title' => 'O Sexto Sentido', 'description' => 'Um suspense com reviravolta incrível.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 6900, 'categories' => [3, 5]],
            ['title' => 'A Lista de Schindler', 'description' => 'Drama histórico da Segunda Guerra.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 11880, 'categories' => [4]],
            ['title' => 'It: A Coisa', 'description' => 'Adaptação de Stephen King.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 8100, 'categories' => [5, 3]],
            ['title' => 'Superbad', 'description' => 'Comédia adolescente.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 5700, 'categories' => [6]],
            ['title' => 'Vingadores: Ultimato', 'description' => 'O clímax da saga Marvel.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 10800, 'categories' => [1, 6]],
            ['title' => 'La La Land', 'description' => 'Musical romântico em Los Angeles.', 'image_url' => 'https://via.placeholder.com/150', 'duration' => 7800, 'categories' => [2, 4]],
        ];

        foreach ($movies as $movie) {
            $movieId = DB::table('movies')->insertGetId([
                'title' => $movie['title'],
                'description' => $movie['description'],
                'image_url' => $movie['image_url'],
                'duration' => $movie['duration'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($movie['categories'] as $catId) {
                DB::table('category_movie')->insert([
                    'movie_id' => $movieId,
                    'category_id' => $catId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
