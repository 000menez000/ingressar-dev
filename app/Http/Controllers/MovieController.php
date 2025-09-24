<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Log;

class MovieController extends Controller
{

    private array $rules = [
        "title" => "required|string|max:255",
        "description" => "nullable|string|max:2000",
        "image_url" => "required|url",
        "duration" => "required|integer|min:3600|max:18000",
        "category_id" => "required/array|min:1",
        "category_id.*" => "integer|exists:categories,category_id",
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
        $movies = Movie::whereHas('categories')->paginate(10);

        return view('movies.index', compact('movies'));

        // return $movies;
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules, $this->messages);

        $movie = Movie::create([
            "title" => $validated["title"],
            "description" => $validated["description"],
            "image_url" => $validated["image_url"],
            "duration" => $validated["duration"],
        ]);

        $movie
            ->categories()
            ->attach($validated["categories"]);

        return $this->redirectMoviesIndex('Filme criado com sucesso.');
    }

    public function show(Movie $movie)
    {
        return $movie;
    }

    public function edit(Movie $movie)
    {
        dd($movie);
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate($this->rules, $this->messages);

        $movie->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_url' => $validated['image_url'],
            'duration' => $validated['duration'],
        ]);
        $movie->categories()->sync($validated['categories']);

        return $this->redirectMoviesIndex('Filme atualizado com sucesso.');
    }

    public function destroy(Movie $movie)
    {
        \Log::info("destroy movie", [$movie->movie_id, $movie->title]);
        $movie->categories()->detach();
        $movie->delete();


        return $this->redirectMoviesIndex('Filme deletado com sucesso.');
    }
}
