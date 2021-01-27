<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
    public function create()
    {
        return view('playlists.create');
    }

    public function table()
    {
        return view('playlists.table');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,jpg,png',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        Auth::user()->playlists()->create([
            'name' => $request->name,
            'thumbnail' => $request->file('thumbnail')->store('images/playlist'),
            'slug' => Str::slug($request->name . '-' . Str::random(6)),
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return back();
    }
}
