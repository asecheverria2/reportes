<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Nota;
use App\User;

class NotaControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_nota_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);

        $nota = factory(Nota::class)->make();
        $data = $nota->attributesToArray();
        $response = $this->post(route('notas.store'), $data);
        $response->assertRedirect(route('notas.index'));
        $response->assertSessionHas('status', 'Nota created!');
    }

    /**
     * @test
     */
    public function it_updates_nota_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $nota = factory(Nota::class)->create();
        $data = factory(Nota::class)->make()->attributesToArray();
        $response = $this->put(route('notas.update', ['nota' => $nota]), $data);
        $response->assertRedirect(route('notas.index'));
        $response->assertSessionHas('status', 'Nota updated!');
    }

    /**
     * @test
     */
    public function it_destroys_nota_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $nota = factory(Nota::class)->create();
        $response = $this->delete(route('notas.destroy', ['nota' => $nota]));
        $response->assertRedirect(route('notas.index'));
        $response->assertSessionHas('status', 'Nota destroyed!');
    }
}
