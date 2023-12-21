<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUploadProgress extends Component
{
    use WithFileUploads;

    public $file;

    public function render()
    {
        return view('livewire.file-upload-progress');
    }

    public function updatedFile()
    {
        $this->validate([
            'file' => 'max:10240', // Adjust the max size (in kilobytes) as needed
        ]);
    }
}
