<?php

namespace App\Livewire\Traits;

use Illuminate\Support\Facades\Storage;

trait WithImageFile
{
    public $imageFile = null;

    //hook para detectar cuando una imagen se actualiza
    public function updatedImageFile()
    {
        $this->verifyTemporaryUrl();

        $this->validate([
            'imageFile' => 'image|max:1024',
        ]);
    }

    private function verifyTemporaryUrl()
    {
        try {
            $this->imageFile->temporaryUrl();
        } catch (\RuntimeException $exception) {
            $this->reset('imageFile');
        }
    }

    private function deleteFile($disk, $filename)
    {
        //Veriico si el $filename no sea nulo  y si existe el archivo dentro del disco especificado
        if ($filename && Storage::disk($disk)->exists($filename)) {
            //eliminamos el archivo
            Storage::disk($disk)->delete($filename);
        }
    }
}