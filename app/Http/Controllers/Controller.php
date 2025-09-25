<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function redirectMoviesIndex(string $msg)
    {
        return redirect()
            ->route('hubflix.movies.index');
            // ->with('success', $msg);
    }

    protected function convertTimeInSeconds(string $time)
    {
        $parts = explode(":", $time);
        $hours = (int) $parts[0] ?? 0;
        $minutes = (int) $parts[1] ?? 0;

        return ($hours * 60 * 60) + ($minutes * 60);
    }
}
