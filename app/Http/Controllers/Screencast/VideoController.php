<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Models\Screencast\Playlist;
use App\Models\Screencast\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function create(Playlist $playlist)
    {
        return view('videos.create', [
            'playlist' => $playlist,
            'title' => "New Video {$playlist->name}",
            'video' => new Video(),
        ]);
    }

    public function store(Playlist $playlist, Request $request)
    {
        $attr = request()->validate([
            'title' => 'required',
            'episode' => 'required',
            'runtime' => 'required',
            'unique_video_id' => 'required',
            'unique_video_id' => 'required',
        ]);

        $attr['slug'] = Str::slug($request->title);
        $attr['intro'] = $request->intro ? true : false;
        $playlist->videos()->create($attr);
    }
}
