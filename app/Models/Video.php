<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'url'];

    public function getVideoSources()
    {
        // Assuming 'url' column contains the full path to the video files
        $basePath = public_path('videos'); // Adjust the base path as needed

        // Extract the file name from the full path
        $fileName = pathinfo($this->url, PATHINFO_BASENAME);

        // Return an array with the file name
        return [$fileName];
    }
}
