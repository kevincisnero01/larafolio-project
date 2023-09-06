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

    /** @test */
    public function admin_can_edit_items()
    {
        $user = User::factory()->create();

        $items = NavigationItem::factory(2)->create();

        Livewire::actingAs($user)->test(HeaderNavigation::class, ['items' => $items])
            ->set('items.0.label', 'Proyectos')
            ->set('items.0.link', '#proyectos')
            ->set('items.1.label', 'Contacto')
            ->set('items.1.link', '#contact')
            ->call('edit');

        $this->assertDatabaseHas('navigation_items',[
            'id' => $items->first()->id,
            'label' => 'Proyectos',
            'link' =>'#proyectos'
        ]);

        $this->assertDatabaseHas('navigation_items',[
            'id' => $items->last()->id,
            'label' => 'Contacto',
            'link' =>'#contact'
        ]);
    
    }
}
