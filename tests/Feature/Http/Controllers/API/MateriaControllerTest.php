<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Materia;
use App\User;
use Laravel\Passport\Passport;

class MateriaControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_materia_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/materias']);
        $materia = factory(Materia::class)->make();
        $data = $materia->attributesToArray();
        $response = $this->json('POST','api/materias',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_materia_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/materias']);
        $materia = factory(Materia::class)->create();
        $data = factory(Materia::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/materias/'.$materia->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_materia_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/materias']);
        $materia = factory(Materia::class)->create();
        $response = $this->json('DELETE','api/materias/'.$materia->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $materia->refresh();
        $this->assertSoftDeleted('materias',['id' => $materia->id]);

    }
}
