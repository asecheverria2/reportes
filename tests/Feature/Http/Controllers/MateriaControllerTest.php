<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Materia;
use App\User;

class MateriaControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_materia_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);

        $materia = factory(Materia::class)->make();
        $data = $materia->attributesToArray();
        $response = $this->post(route('materias.store'), $data);
        $response->assertRedirect(route('materias.index'));
        $response->assertSessionHas('status', 'Materia created!');
    }

    /**
     * @test
     */
    public function it_updates_materia_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $materia = factory(Materia::class)->create();
        $data = factory(Materia::class)->make()->attributesToArray();
        $response = $this->put(route('materias.update', ['materia' => $materia]), $data);
        $response->assertRedirect(route('materias.index'));
        $response->assertSessionHas('status', 'Materia updated!');
    }

    /**
     * @test
     */
    public function it_destroys_materia_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $materia = factory(Materia::class)->create();
        $response = $this->delete(route('materias.destroy', ['materia' => $materia]));
        $response->assertRedirect(route('materias.index'));
        $response->assertSessionHas('status', 'Materia destroyed!');
    }
}
