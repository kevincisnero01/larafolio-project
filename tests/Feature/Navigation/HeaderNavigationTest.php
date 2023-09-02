<?php

namespace Tests\Feature\Navigation;

use App\Livewire\Navigation\HeaderNavigation;
use Tests\TestCase;
use App\Models\NavigationItem;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class HeaderNavigationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function navigation_component_can_rendered(): void
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSeeLivewire('navigation.header-navigation');
    }

    /** @test */
    public function navigation_can_load_items(): void
    {
        $items = NavigationItem::factory(3)->create();

        Livewire::test(HeaderNavigation::class)
            ->assertSee($items->first()->label)
            ->assertSee($items->first()->link);
    }
}
