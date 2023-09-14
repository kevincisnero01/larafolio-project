<?php

namespace Tests\Feature\Contact;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SocialLinkTest extends TestCase
{
    /** @test*/
    public function social_link_component_cand_rendered(): void
    {  
        $this->get('/')->assertStatus(200)->assertSeeLivewire('contact.social-link');
    }
}
