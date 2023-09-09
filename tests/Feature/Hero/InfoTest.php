<?php

namespace Tests\Feature\Hero;

use Tests\TestCase;
use Livewire\Livewire;
use App\Livewire\Hero\Info;
use App\Models\PersonalInformation;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InfoTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function hero_info_component_can_be_rendered(){

        $this->get('/')
            ->assertStatus(200)
            ->assertSeeLivewire('hero.info');

    }

    /** @test */
    public function component_can_load_hero_information(){

        $info = PersonalInformation::factory()->create();

        Livewire::test(Info::class)
            ->assertSee($info->title)
            ->assertSee($info->description);
    }
}
