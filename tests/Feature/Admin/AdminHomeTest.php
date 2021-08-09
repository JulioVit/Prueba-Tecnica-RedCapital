<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminHomeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function administradores_pueden_visitar_el_sitio_administrativo(){
        $admin = factory(User::class)->create([
            'admin' => true
        ]);

        $this->actingAs($admin)
            ->get(route('admin_home'))
            ->assertStatus(200)
            ->assertSee('Panel de Administración');
    }

    /** @test */
    function usuarios_normales_no_pueden_visitar_el_sitio_administrativo(){
        $user = factory(User::class)->create([
            'admin' => false
        ]);

        $this->actingAs($user)
            ->get(route('admin_home'))
            ->assertStatus(403);
    }

    /** @test */
    function usuarios_anonimos_no_pueden_visitar_el_sitio_administrativo(){
        $this->get(route('admin_home'))
            ->assertStatus(302)
            ->assertRedirect('login');
    }
}
