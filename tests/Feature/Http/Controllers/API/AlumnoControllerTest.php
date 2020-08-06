<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Alumno;
use App\User;
use Laravel\Passport\Passport;

class AlumnoControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_alumno_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/alumnos']);
        $alumno = factory(Alumno::class)->make();
        $data = $alumno->attributesToArray();
        $response = $this->json('POST','api/alumnos',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_alumno_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/alumnos']);
        $alumno = factory(Alumno::class)->create();
        $data = factory(Alumno::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/alumnos/'.$alumno->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_alumno_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/alumnos']);
        $alumno = factory(Alumno::class)->create();
        $response = $this->json('DELETE','api/alumnos/'.$alumno->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $alumno->refresh();
        $this->assertSoftDeleted('alumnos',['id' => $alumno->id]);

    }
}
