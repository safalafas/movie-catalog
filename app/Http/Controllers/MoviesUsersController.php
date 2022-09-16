<?php

namespace App\Http\Controllers;

use App\Models\MoviesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MoviesUsersController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'users_id' => 'required',
            'movies_id' => 'required',
        ]);

        MoviesUsers::create($data);
        return back();
    }

    public function destroy(Request $request)
    {
        $like = DB::table('movies_users')
            ->where('users_id', '=', $request->users_id)
            ->where('movies_id', '=', $request->movies_id);
        // dd($like);
        $like->delete();
        return back();
    }
}
