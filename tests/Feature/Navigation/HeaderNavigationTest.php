<?php

namespace Tests\Feature\Navigation;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\NavigationItem;
use Illuminate\Foundation\Testing\WithFaker;
use App\Livewire\Navigation\HeaderNavigation;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    /** @test */
    public function only_admin_can_see_navigation_actions()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(HeaderNavigation::class)
            ->assertStatus(200)
            ->assertSee(__('Edit'))
            ->assertSee(__('Add'));
        
    }

    //  /** @test */
    // public function guest_cannot_see_navigation_actions()
    // {

    //     Livewire::test(HeaderNavigation::class)
    //         ->assertStatus(200)
    //         ->assertDontSee(__('Edit'))
    //         ->assertDontSee(__('Add'));
        
    //         $this->assertGuest();
    // }
}
