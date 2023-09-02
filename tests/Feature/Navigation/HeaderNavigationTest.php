<?php

namespace Tests\Feature\Navigation;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HeaderNavigationTest extends TestCase
{
    /** @test */
    public function navigation_component_can_rendered(): void
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSeeLivewire('navigation.header-navigation');
    }
}
