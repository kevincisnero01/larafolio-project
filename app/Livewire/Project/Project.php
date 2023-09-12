<?php

namespace App\Livewire\Project;

use App\Livewire\Traits\Notification;
use App\Livewire\Traits\Slideover;
use App\Livewire\Traits\WithImageFile;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Project as ProjectModel;
class Project extends Component
{
    use Slideover, WithImageFile, WithFileUploads, Notification;

    public ProjectModel $currentProject;
    public bool $openModal = false;

    protected $listeners = ['deleteProject'];

    protected $rules = [
        'currentProject.name' => 'required|max:100',
        'currentProject.description' => 'required|max:450',
        'imageFile' => 'nullable|image|max:1024',
        'currentProject.video_link' => [
            'nullable', 'url',
            'regex:/^(https|http):\/\/(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[A-z0-9-]+/i'
        ],
        'currentProject.url' => 'nullable|url',
        'currentProject.repo_url' => [
            'nullable', 'url', 
            'regex:/^(https|http):\/\/(www\.)?(github|gitlab)\.com\/[A-z0-9-\/?=&]+/i'
        ],
    ];

    public function mount()
    {
        $this->currentProject = new ProjectModel();
    }

    public function loadProject(ProjectModel $project, $modal = true)
    {
        //si el proyecto carbaado por model binding no es igual al actual lo actualizamos para mostrarlo en el modal
        if ($this->currentProject->isNot($project)) {
            $this->currentProject = $project;
        }
        //abrimos/cerramos el modal
        $this->openModal = $modal;

        //abrimos/cerramos el slideover
        if (!$modal) {
            $this->openSlide();
        }
    }

    public function create()
    {
        if ($this->currentProject->getKey()) {
            $this->currentProject = new ProjectModel();
        }

        $this->openSlide();
    }

    public function save()
    {
        $this->validate();

        if ($this->imageFile) {
            $this->deleteFile('projects', $this->currentProject->image);
            $this->currentProject->image = $this->imageFile->store('/', 'projects');
        }

        $this->currentProject->save();

        $this->reset(['imageFile', 'openSlideover']);
        $this->notify(__('Project saved successfully!'));
    }

    public function deleteProject(ProjectModel $object)
    {
        // se usa obligatoriamente object como nombre para el modal
        $project = $object; 

        $project->delete();

        $this->deleteFile('projects', $project->image);

        $this->notify('Project has been deleted.', 'deleteMessage');
    }

    public function render()
    {
        $projects = ProjectModel::get();
        return view('livewire.project.project', [ 'projects' => $projects ]);
    }
}
