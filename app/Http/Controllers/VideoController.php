<?php

namespace App\Http\Controllers;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Cart;

class VideoController extends Controller
{
    public function index()
    {
        return view('content.addVideo');
    }

    public function create()
    {
        return view('content.addVideo');
    }

    public function fetch(){
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        $cartItemCount = $cartItems->count();
        $data=Video::all()->toArray();
        return view('content.videoTutorial', compact('data', 'cartItemCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'url' => 'required|mimes:mp4,quicktime,webm,x-ms-wmv',
        ]);

        $videoFile = $request->file('url');
        $videoFile -> move('videos', $videoFile->getClientOriginalName());
        $videoPath = $videoFile->getClientOriginalName();

        $store = new Video();
        $store->title = $request->input('title');
        $store->description = $request->input('description');
        $store->url = $videoPath;
        $store->save();

        return redirect('/video-tutorial');
    }

    public function edit(Video $video)
    {
        return view('content.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'url' => 'nullable|mimes:mp4,quicktime,webm,x-ms-wmv',
        ]);

        // Update only if a new video file is uploaded
        if ($request->hasFile('url')) {
            $videoFile = $request->file('url');

            // Sanitize the file name
            $sanitizedFileName = preg_replace("/[^a-zA-Z0-9.]/", "_", $videoFile->getClientOriginalName());

            // Move the uploaded file to the 'videos' directory with the sanitized file name
            $videoFile->move('videos', $sanitizedFileName);

            // Update video details
            $video->url = $sanitizedFileName;
        }

        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $video->save();

        return redirect('/video-tutorial')->with('success', 'Video updated successfully');
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return redirect('/video-tutorial')->with('success', 'Video deleted successfully');
    }
}
