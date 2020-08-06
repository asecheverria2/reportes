<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Nota;
use App\User;
use Laravel\Passport\Passport;

class NotaControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_nota_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/notas']);
        $nota = factory(Nota::class)->make();
        $data = $nota->attributesToArray();
        $response = $this->json('POST','api/notas',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_nota_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/notas']);
        $nota = factory(Nota::class)->create();
        $data = factory(Nota::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/notas/'.$nota->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_nota_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/notas']);
        $nota = factory(Nota::class)->create();
        $response = $this->json('DELETE','api/notas/'.$nota->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $nota->refresh();
        $this->assertSoftDeleted('notas',['id' => $nota->id]);

    }
}
