<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Log;
use PharIo\Version\BuildMetaData;
use Symfony\Component\Console\Input\Input;

class MovieController extends Controller
{

    private array $rules = [
        "title" => "required|string|max:255",
        "description" => "nullable|string|max:2000",
        "image_url" => "required|url",
        "duration" => "required|date_format:H:i|before_or_equal:05:00",
        "category" => "required|min:1",
        "category.*" => "integer|exists:categories,category_id",
    ];

    private array $messages = [
        "title.required" => "O título é obrigatório.",
        "image_url.required" => "A URL da imagem é obrigatória.",
        "image_url.url" => "A URL da imagem deve ser uma URL válida.",
        "duration.date_forma" => "A duração tem que ser no formato HH:MM",
        "duration.before_or_equal" => "A duração máxima é de 5 horas (05:00).",
        "category.exists" => "Não existe ID com essa categoria"
    ];

    private function applySearch(string $search, Builder $query)
    {
        $search = trim((string) $search);			

        $query->when($search, function (Builder $query, $search) {
            $query->where("title", "LIKE", "%{$search}%");
        });
    }

    public function index(Request $request)
    {
        $movieQuery = Movie::query();

        if(isset($request["search"]) && !empty($request["search"])) {
            $this->applySearch($request["search"], $movieQuery);
        }

        // if (isset($request["nivel"])) {
        //     $this->applyNivelFilter($request["nivel"], $cursoQuery);
        // }

        $movies = $movieQuery->whereHas('categories')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('movies.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules, $this->messages);

        $duration = $this->convertTimeInSeconds($validated['duration']);
        
        $movie = Movie::create([
            "title" => $validated["title"],
            "description" => $validated["description"] ?? null,
            "image_url" => $validated["image_url"],
            "duration" => $duration,
        ]);

        $movie
            ->categories()
            ->attach($validated["category"]);

        return $this->redirectMoviesIndex('Filme criado com sucesso.');
    }

    public function show(Movie $movie)
    {
        return view('movies.view')->with("movie", $movie);
    }

    public function edit(Movie $movie)
    {
        $categories = Category::all();
        return view('movies.edit', ["movie" => $movie, "categories" => $categories]);
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate($this->rules, $this->messages);
        $duration = $this->convertTimeInSeconds($validated['duration']);

        $movie->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_url' => $validated['image_url'],
            'duration' => $duration,
        ]);
        $movie->categories()->sync($validated['category']);

        return $this->redirectMoviesIndex('Filme atualizado com sucesso.');
    }

    public function destroy(Movie $movie)
    {
        $movie->categories()->detach();
        $movie->delete();


        return $this->redirectMoviesIndex('Filme deletado com sucesso.');
    }
}
