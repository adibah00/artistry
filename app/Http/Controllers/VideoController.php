<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::with('tags')->get();
        return view('content.videoTutorial', ['videos' => $videos]);
    }

    public function create()
    {
        return view('content.addVideo');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'video_path' => 'required',
            'tags' => 'nullable|array', // Assuming tags will be an array
        ]);

        $video = Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'video_path' => $request->file('video_path')->store('videos', 'public'),
        ]);

        if ($request->tags) {
            $tagNames = explode(',', $request->tags);
            $tags = Tag::whereIn('name', $tagNames)->get();

            foreach ($tagNames as $tagName) {
                if (!$tags->contains('name', $tagName)) {
                    $tag = Tag::create(['name' => $tagName]);
                    $tags->push($tag);
                }
            }

            $video->tags()->sync($tags);
        }

        return redirect()->route('videos.index');
    }
}