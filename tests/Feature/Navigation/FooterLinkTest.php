<?php

namespace Tests\Feature\Navigation;

use App\Livewire\Navigation\FooterLink;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\NavigationItem;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FooterLinkTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function footer_link_component_can_be_rendered()
    {
        $this->get('/')->assertStatus(200)->assertSeeLivewire('navigation.footer-link');
    }

    /** @test */
    public function component_can_load_items_navigation()
    {
        $items = NavigationItem::factory(3)->create();

        Livewire::test(FooterLink::class)
            ->assertSee($items->first()->label)
            ->assertSee($items->last()->label);
    }
}
