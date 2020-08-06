<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Alumno;
use App\User;

class AlumnoControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_alumno_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);

        $alumno = factory(Alumno::class)->make();
        $data = $alumno->attributesToArray();
        $response = $this->post(route('alumnos.store'), $data);
        $response->assertRedirect(route('alumnos.index'));
        $response->assertSessionHas('status', 'Alumno created!');
    }

    /**
     * @test
     */
    public function it_updates_alumno_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $alumno = factory(Alumno::class)->create();
        $data = factory(Alumno::class)->make()->attributesToArray();
        $response = $this->put(route('alumnos.update', ['alumno' => $alumno]), $data);
        $response->assertRedirect(route('alumnos.index'));
        $response->assertSessionHas('status', 'Alumno updated!');
    }

    /**
     * @test
     */
    public function it_destroys_alumno_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $alumno = factory(Alumno::class)->create();
        $response = $this->delete(route('alumnos.destroy', ['alumno' => $alumno]));
        $response->assertRedirect(route('alumnos.index'));
        $response->assertSessionHas('status', 'Alumno destroyed!');
    }
}
