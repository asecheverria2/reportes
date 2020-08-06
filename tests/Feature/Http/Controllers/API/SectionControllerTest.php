<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Section;
use App\User;
use Laravel\Passport\Passport;

class SectionControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_section_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/sections']);
        $section = factory(Section::class)->make();
        $data = $section->attributesToArray();
        $response = $this->json('POST','api/sections',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_section_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/sections']);
        $section = factory(Section::class)->create();
        $data = factory(Section::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/sections/'.$section->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_section_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/sections']);
        $section = factory(Section::class)->create();
        $response = $this->json('DELETE','api/sections/'.$section->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $section->refresh();
        $this->assertSoftDeleted('sections',['id' => $section->id]);

    }
}
