<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistry</title>
    <link rel="icon" href="{{ asset('images/makeupIcon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                        <div class="row">
                            @if($videos->isEmpty())
                                <p>No videos available</p>
                            @else
                                @foreach($videos as $video)
                                    <div class="col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h3 class="card-title">{{ $video->title }}</h3>
                                                <p class="card-text">{{ $video->description }}</p>
                                                <video controls width="100%" class="mb-3">
                                                    @foreach ($video->getVideoSources() as $source)
                                                        <source src="{{ asset('videos/' . $source) }}" type="video/mp4">
                                                    @endforeach
                                                </video>
                                                <p class="card-text">Video URL: {{ $video->url }}</p>
                                                <p class="card-text">Full Path: {{ public_path('videos/' . $video->url) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <!-- Add Bootstrap JS and Popper.js (if needed) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-U7UqBscFHAHzbJ/8Ll7/5NJsxPz+KGpDMST6vEe6D5uqj7Ij05rY7dN+I5J6S5L" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
