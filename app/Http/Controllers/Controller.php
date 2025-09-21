<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function redirectMoviesIndex(string $msg)
    {
        return redirect()
            ->route('hubflix.movies.index')
            ->with('success', $msg);
    }
}
