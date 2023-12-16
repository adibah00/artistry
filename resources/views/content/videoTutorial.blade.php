<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistry</title>
    <link rel="icon" href="{{ asset('images/makeupIcon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Video Tutorial') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container">
                        <h2>Video Tutorials</h2>

                        <div class="video-container">
                            @if($videos->isEmpty())
                                <p>No videos available</p>
                            @else
                                @foreach($videos as $video)
                                    <div class="video-card">
                                        <h3>{{ $video->title }}</h3>
                                        <p>{{ $video->description }}</p>
                                        <video controls width="300">
                                            <source src="{{ asset('storage/videos/' . $video->video_path) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        <p>Tags: {{ $video->tags->pluck('name')->implode(', ') }}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>

