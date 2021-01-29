<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Screencast\Playlist;
use App\Models\Screencast\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function table(Playlist $playlist)
    {
        $this->authorize('update', $playlist);

        return view('videos.table', [
            'title' => "Table of {$playlist->name} content",
            'playlist' => $playlist,
            'videos' => $playlist->videos()->orderBy('episode')->paginate(20),
        ]);
    }

    public function create(Playlist $playlist)
    {
        $this->authorize('update', $playlist);

        return view('videos.create', [
            'playlist' => $playlist,
            'title' => "New Video {$playlist->name}",
            'video' => new Video(),
        ]);
    }

    public function store(Playlist $playlist, VideoRequest $request)
    {
        $this->authorize('update', $playlist);

        $attr = $request->all();

        $attr['slug'] = Str::slug($request->title);
        $attr['intro'] = $request->intro ? true : false;
        $playlist->videos()->create($attr);
    }

    public function edit(Playlist $playlist, Video $video)
    {
        return view('videos.edit', [
            'playlist' => $playlist,
            'video' => $video,
            'title' => "Edit video: {$video->name} - {$video->title}"
        ]);
    }

    public function update(Playlist $playlist, Video $video, VideoRequest $request)
    {
        $this->authorize('update', $playlist);

        $attr = $request->all();

        $attr['intro'] = $request->intro ? true : false;
        $video->update($attr);

        return redirect(route('videos.table', $playlist->slug));
    }
}
