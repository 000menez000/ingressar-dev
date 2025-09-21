<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        dd($movies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string",
            "image_url" => "required|url",
            "duration" => "required|smallint",
        ]);

        Movie::create($request->all());

        return redirect()->route('hubflix.movies.index')->with('success', 'Filme criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        dd($movie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        dd($movie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string",
            "image_url" => "required|url",
            "duration" => "required|smallint",
        ]);

        $movie->update($request->all());

        return redirect()->route('hubflix.movies.index')->with('success', 'Filme atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('hubflix.movies.index')->with('success', 'Filme deletado com sucesso.');
    }
}
