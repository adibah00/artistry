<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistry</title>
    <link rel="icon" href="{{ asset('images/makeupIcon.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <x-app-layout>
        <!-- This is the header content -->
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Video') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <section class="dark:bg-gray-900">
                        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new video</h2>

                            <form method="post" action="{{ route('videos.update', $video->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group dark:text-white">
                                    <label for="title">Video Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ $video->title }}" required>
                                </div>
                                <div class="form-group dark:text-white">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control"
                                        placeholder="Video description">{{ $video->description }}</textarea>
                                </div>
                                <div class="form-group dark:text-white">
                                    <label for="url">Current Video File</label>
                                    <input type="text" class="form-control" value="{{ $video->url }}" readonly>
                                </div>

                                <div class="form-group dark:text-white">
                                    <label for="newUrl">New Video File</label>
                                    <input type="file" name="url" class="form-control" placeholder="Upload New Video File">
                                </div>
                                <div class="text-center dark:text-white">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('videos.fetch') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
