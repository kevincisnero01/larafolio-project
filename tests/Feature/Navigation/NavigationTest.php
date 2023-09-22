<?php

namespace Tests\Feature\Navigation;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\NavigationItem;
use Illuminate\Foundation\Testing\WithFaker;
use App\Livewire\Navigation\Navigation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NavigationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function navigation_component_can_rendered(): void
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSeeLivewire('navigation.navigation');
    }

    /** @test */
    public function navigation_can_load_items(): void
    {
        $items = NavigationItem::factory(3)->create();

        Livewire::test(Navigation::class)
            ->assertSee($items->first()->label)
            ->assertSee($items->first()->link);
    }

    /** @test */
    public function only_admin_can_see_navigation_actions()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(Navigation::class)
            ->assertStatus(200)
            ->assertSee(__('Edit'))
            ->assertSee(__('Add'));
        
    }

     /** @test */
    public function guest_cannot_see_navigation_actions()
    {

        Livewire::test(Navigation::class)
            ->assertStatus(200)
            ->assertDontSee(__('Edit'))
            ->assertDontSee(__('Add'));
        
            $this->assertGuest();
    }

    /** @test */
    public function admin_can_edit_items()
    {
        $user = User::factory()->create();

        $items = NavigationItem::factory(2)->create();

        Livewire::actingAs($user)->test(Navigation::class, ['items' => $items])
            ->set('items.0.label', 'Proyectos')
            ->set('items.0.link', '#proyectos')
            ->set('items.1.label', 'Contacto')
            ->set('items.1.link', '#contacto')
            ->call('edit');

        $this->assertDatabaseHas('navigation_items',[
            'id' => $items->first()->id,
            'label' => 'Proyectos',
            'link' =>'#proyectos'
        ]);

        $this->assertDatabaseHas('navigation_items',[
            'id' => $items->last()->id,
            'label' => 'Contacto',
            'link' =>'#contacto'
        ]);
    }

    /** @test */
    public function admin_can_delete_items()
    {
        $user = User::factory()->create();

        $item =  NavigationItem::factory()->create();
    
        Livewire::actingAs($user)->test(Navigation::class)->call('deleteItem',$item);

        $this->assertDatabaseMissing('navigation_items',[
            'id' => $item->id
        ]);

    }


    /** @test */
    public function label_of_items_is_required()
    {
        $user = User::factory()->create();

        $items = NavigationItem::factory(2)->create();

        Livewire::actingAs($user)->test(Navigation::class)
            ->set('items.0.label', '')
            ->set('items.1.label', '')
            ->call('edit')
            ->assertHasErrors(['items.0.label' => 'required'])
            ->assertHasErrors(['items.1.label' => 'required']);
    }

    /** @test */
    public function link_of_items_is_required()
    {
        $user = User::factory()->create();

        $items = NavigationItem::factory(2)->create();

        Livewire::actingAs($user)->test(Navigation::class)
            ->set('items.0.link', '')
            ->set('items.1.link', '')
            ->call('edit')
            ->assertHasErrors(['items.0.link' => 'required'])
            ->assertHasErrors(['items.1.link' => 'required']);
    }

    /** @test */
    public function label_of_items_must_have_a_maximum_of_twenty_characters()
    {
        $user = User::factory()->create();

        $items = NavigationItem::factory(2)->create();

        Livewire::actingAs($user)->test(Navigation::class)
            ->set('items.0.label', 'yehdyrgftgkyitjfhvngt')
            ->set('items.1.label', 'yehdyrgftgkyitjfhvngt')
            ->call('edit')
            ->assertHasErrors(['items.0.label' => 'max'])
            ->assertHasErrors(['items.1.label' => 'max']);
    }

    /** @test */
    public function link_of_items_must_have_a_maximum_of_forty_characters()
    {
        $user = User::factory()->create();
        
        $items = NavigationItem::factory(2)->create();

        Livewire::actingAs($user)->test(Navigation::class)
            ->set('items.0.link', 'yehdyrgftgkyitjfhvngtyehdyrgftgkyitjfhvngt')
            ->set('items.1.link', 'yehdyrgftgkyitjfhvngtyehdyrgftgkyitjfhvngt')
            ->call('edit')
            ->assertHasErrors(['items.0.link' => 'max'])
            ->assertHasErrors(['items.1.link' => 'max']);
    }


}
