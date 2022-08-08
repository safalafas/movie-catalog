<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class MoviesController extends Controller
{
    public function index()
    {
        return view('movies.index',
            [
                'movies' => Movies::latest()->filter(request(['search', 'released-from', 'released-until']))->paginate(5),
            ]
        );
    }
    public function show(Movies $movie)
    {
        return view('movies.show',
            [
                'movie' => $movie,
            ]
        );
    }
    public function create()
    {
        return view('movies.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'release_date' => ['required', 'date'],
                'is_published' => 'required',
            ]
        );
        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        Movies::create($data);
        return redirect('/');
    }

    public function edit(Movies $movie)
    {
        return view('movies.edit', ['movie' => $movie]);
    }

    public function update(Request $request, Movies $movie)
    {
        $data = $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'release_date' => ['required', 'date'],
                'is_published' => 'required',
            ]
        );
        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $movie->update($data);
        return back();
    }

    public function destroy(Movies $movie)
    {
        $movie->delete();
        return redirect('/');
    }
}
