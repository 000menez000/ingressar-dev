<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    private array $rules = [
        "title" => "required|string|max:255",
        "description" => "nullable|string|max:2000",
        "image_url" => "required|url",
        "duration" => "required|integer|min:3600|max:18000",
    ];

    private array $messages = [
        "title.required" => "O título é obrigatório.",
        "image_url.required" => "A URL da imagem é obrigatória.",
        "image_url.url" => "A URL da imagem deve ser uma URL válida.",
        "duration.min" => "A duração mínima é de 1 hora (3600 segundos).",
        "duration.max" => "A duração máxima é de 5 horas (18000 segundos).",
    ];

    public function index()
    {
        $movies = Movie::all();
        dd($movies);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate($this->rules, $this->messages);

        Movie::create($request->all());

        return $this->redirectMoviesIndex('Filme criado com sucesso.');
    }

    public function show(Movie $movie)
    {
        dd($movie);
    }

    public function edit(Movie $movie)
    {
        dd($movie);
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate($this->rules, $this->messages);

        $movie->update($request->all());

        return $this->redirectMoviesIndex('Filme atualizado com sucesso.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return $this->redirectMoviesIndex('Filme deletado com sucesso.');
    }
}
