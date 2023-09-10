<?php

namespace App\Livewire\Hero;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Traits\Slideover;
use App\Models\PersonalInformation;
use App\Livewire\Traits\Notification;
use App\Livewire\Traits\WithImageFile;
use Illuminate\Support\Facades\Storage;

class Info extends Component
{
    use Slideover, WithFileUploads, WithImageFile, Notification;

    public PersonalInformation $info;
    public $cvFile = null;

    protected $rules = [
        'info.title' => 'required|max:80',
        'info.description' => 'required|max:250',
        'cvFile' => 'nullable|mimes:pdf|max:1024',
        'imageFile' => 'nullable|image|max:1024',
    ];

    protected $validationAttributes = [
        'cvFile' => 'CV',
        'imageFile' => 'Imagen',
    ];

    public function mount()
    {
        $this->info = PersonalInformation::first() ?? new PersonalInformation();
    }

    public function updatedCvFile()
    {
        $this->validate([
            'cvFile' => 'mimes:pdf|max:1024',
        ]);
    }

    public function download()
    {
        return Storage::disk('cv')->download($this->info->cv ?? 'my-cv.pdf');
    }

    public function edit()
    {
        $this->validate();

        $this->info->save();

        if($this->cvFile) {
            //llamamos el trait para eliminar el archivo
            $this->deleteFile(disk: 'cv', filename: $this->info->cv);
            //guadamos la imagen en el disco cv y capturamos el nombre
            $newName = $this->cvFile->store('/', 'cv');
            //actualizamos la informacion en la base de datos
            $this->info->update(['cv' => $newName]);
        }

        if($this->imageFile) {
            //llamamos el trait para eliminar el archivo
            $this->deleteFile(disk: 'hero', filename: $this->info->image);
            //guadamos la imagen en el disco hero y actualizamos la base de datos
            $this->info->update(['image' => $this->imageFile->store('/', 'hero')]);
        }

        //reiniciamos todas las propiedades excepto info, ya que es una propiedad enlazada con la data que se muestra
        $this->resetExcept('info');

        //enviamos notificacion
        $this->notify('Information saved successfully!');

    }

    public function render()
    {
        return view('livewire.hero.info');
    }
}
