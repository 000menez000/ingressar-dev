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
            ['title' => 'O Exterminador do Futuro', 'description' => 'Clássico de ação e ficção científica.', 'image_url' => 'https://image.tmdb.org/t/p/w200/qvktm0BHcnmDpul4Hz01GIazWPr.jpg', 'duration' => 6600, 'categories' => [1]], 
            ['title' => 'Titanic', 'description' => 'Romance épico a bordo de um navio lendário.', 'image_url' => 'https://image.tmdb.org/t/p/w200/9xjZS2rlVxm8SFx8kPC3aIGCOYQ.jpg', 'duration' => 11800, 'categories' => [2]], 
            ['title' => 'Corra!', 'description' => 'Suspense psicológico e social.', 'image_url' => 'https://image.tmdb.org/t/p/w200/2IY3LjpDkCGlfC6D9nwncJ0mYjY.jpg', 'duration' => 6300, 'categories' => [5]],
            ['title' => 'O Poderoso Chefão', 'description' => 'Drama da máfia italiana.', 'image_url' => 'https://image.tmdb.org/t/p/w200/d4KNaTrltq6bpkFS01pYtyXa09m.jpg', 'duration' => 10500, 'categories' => [4]],
            ['title' => 'Pânico', 'description' => 'Clássico do terror dos anos 90.', 'image_url' => 'https://image.tmdb.org/t/p/w200/1HJq8QZpvxgB5G5M0qkFyQhcQ8B.jpg', 'duration' => 6900, 'categories' => [5]],
            ['title' => 'Se Beber, Não Case!', 'description' => 'Comédia de amigos em Las Vegas.', 'image_url' => 'https://image.tmdb.org/t/p/w200/kfX8Ctin3fSZbdnjh6CXSNZUOVP.jpg', 'duration' => 6000, 'categories' => [6]],
            ['title' => 'Matrix', 'description' => 'Filosofia e ação em um mundo virtual.', 'image_url' => 'https://image.tmdb.org/t/p/w200/aOiQZVzvcCb2g7QjBe2xOe1cZ7Y.jpg', 'duration' => 8100, 'categories' => [1]],
            ['title' => 'Diário de uma Paixão', 'description' => 'Um romance inesquecível.', 'image_url' => 'https://image.tmdb.org/t/p/w200/rNzQyW4f8B8cQeg7Dgj3n6eT5mb.jpg', 'duration' => 6900, 'categories' => [2]],
            ['title' => 'A Ilha do Medo', 'description' => 'Suspense de Martin Scorsese.', 'image_url' => 'https://image.tmdb.org/t/p/w200/kve20tXwUZpu4GUX8l6X7Z4jmL6.jpg', 'duration' => 7800, 'categories' => [3]],
            ['title' => 'Cisne Negro', 'description' => 'Drama psicológico intenso.', 'image_url' => 'https://image.tmdb.org/t/p/w200/q1KjbyQwVtQfU5c6z9syj7c1p6R.jpg', 'duration' => 6900, 'categories' => [4]],
            ['title' => 'Invocação do Mal', 'description' => 'Baseado em fatos reais.', 'image_url' => 'https://image.tmdb.org/t/p/w200/wVYREutTvI2tmxr6ujrHT704wGF.jpg', 'duration' => 7100, 'categories' => [5]],
            ['title' => 'As Branquelas', 'description' => 'Comédia clássica dos anos 2000.', 'image_url' => 'https://image.tmdb.org/t/p/w200/o2pb3lUvaZsZx8e7qfK6J2kEugC.jpg', 'duration' => 6500, 'categories' => [6]],
            ['title' => 'John Wick', 'description' => 'Um homem em busca de vingança.', 'image_url' => 'https://image.tmdb.org/t/p/w200/fZPSd91yGE9fCcCe6OoQhu7CUmK.jpg', 'duration' => 7200, 'categories' => [1]],
            ['title' => 'Amor à Segunda Vista', 'description' => 'Comédia romântica leve.', 'image_url' => 'https://image.tmdb.org/t/p/w200/8RGv9FMi3P7k53q84lG4rUCN44F.jpg', 'duration' => 5400, 'categories' => [2]],
            ['title' => 'O Sexto Sentido', 'description' => 'Um suspense com reviravolta incrível.', 'image_url' => 'https://image.tmdb.org/t/p/w200/fiss9xH8Qj9izvQZcxmL7wZqIkS.jpg', 'duration' => 6900, 'categories' => [3]],
            ['title' => 'A Lista de Schindler', 'description' => 'Drama histórico da Segunda Guerra.', 'image_url' => 'https://image.tmdb.org/t/p/w200/c8Ass7acuOe4za6DhSattE359gr.jpg', 'duration' => 11880, 'categories' => [4]],
            ['title' => 'It: A Coisa', 'description' => 'Adaptação de Stephen King.', 'image_url' => 'https://image.tmdb.org/t/p/w200/9E2y5Q7WlCVNEhP5GiVTjhEhx1o.jpg', 'duration' => 8100, 'categories' => [5]],
            ['title' => 'Superbad', 'description' => 'Comédia adolescente.', 'image_url' => 'https://image.tmdb.org/t/p/w200/ek8e8txUyUwd2BNqj6lFEerJfbq.jpg', 'duration' => 5700, 'categories' => [6]],
            ['title' => 'Vingadores: Ultimato', 'description' => 'O clímax da saga Marvel.', 'image_url' => 'https://image.tmdb.org/t/p/w200/or06FN3Dka5tukK1e9sl16pB3iy.jpg', 'duration' => 10800, 'categories' => [1]],
            ['title' => 'La La Land', 'description' => 'Musical romântico em Los Angeles.', 'image_url' => 'https://image.tmdb.org/t/p/w200/uDO8zWDhfWwoFdKS4fzkUJt0Rf0.jpg', 'duration' => 7800, 'categories' => [2]],
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
