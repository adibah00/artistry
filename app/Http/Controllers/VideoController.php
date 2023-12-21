<?php

namespace App\Http\Controllers;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('content.videoTutorial', compact('videos'));
    }

    public function create()
    {
        return view('content.addVideo');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'url' => 'required|mimetypes:video/mp4,video/quicktime,video/webm,video/x-ms-wmv',
        ]);

        $videoFile = $request->file('url');
        $originalFileName = $videoFile->getClientOriginalName();
        $videoPath = $videoFile->storeAs('videos', $originalFileName, 'public');

        Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $videoPath,
        ]);

        return redirect()->route('videos.index');
    }

    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $video->update($request->all());
        return redirect()->route('videos.index');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index');
    }
}
