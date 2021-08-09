<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function mostrar_home_a_usuarios_registrados_solamente(){
        $user = factory(User::class)->create();
        $this->actingAs($user)
            ->get(route('home'))
            ->assertSee('Nombre del Archivo')
            ->assertStatus(200);
    }
    /** @test */
    function redireccionar_usuario_anonimo_al_login(){
        $this->get(route('home'))
            ->assertStatus(302)
            ->assertRedirect('login');
    }
}
