<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistry</title>
    <link rel="icon" href="{{ asset('images/makeupIcon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
                            @if(empty($data))
                                <p>No videos available</p>
                            @else
                                @foreach($data as $video)
                                    <div class="col-md-6">
                                        <div class="card mb-4" style="background-color: #001f3f; color: #ffffff;">
                                            <div class="card-body text-center">
                                                <h3 class="card-title font-weight-bold">{{ $video['title'] }}</h3>
                                                <video controls width="100%" class="mb-3">
                                                    @foreach ($video as $source)
                                                        <source src="{{ asset('videos') }}/{{ $video['url'] }}" type="video/mp4">
                                                    @endforeach
                                                </video>
                                                <p class="card-text"> Video Description : {{ $video['description'] }}</p>

                                                <div>
                                                    @if(auth()->user()->position != 'user')
                                                        <a href="{{ route('videos.edit', $video['id']) }}" class="btn btn-primary mr-2">Edit</a>
                                                        <form action="{{ route('videos.destroy', $video['id']) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($loop->iteration % 2 == 0)
                                        <div class="w-100"></div> <!-- Add a new row after every 2 videos -->
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <x-floating-navigation :cartItemCount="$cartItemCount" />
                </div>
            </div>
        </div>
    </x-app-layout>

</body>
</html>
