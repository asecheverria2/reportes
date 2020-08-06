<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Section;
use App\User;

class SectionControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_section_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);

        $section = factory(Section::class)->make();
        $data = $section->attributesToArray();
        $response = $this->post(route('sections.store'), $data);
        $response->assertRedirect(route('sections.index'));
        $response->assertSessionHas('status', 'Section created!');
    }

    /**
     * @test
     */
    public function it_updates_section_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $section = factory(Section::class)->create();
        $data = factory(Section::class)->make()->attributesToArray();
        $response = $this->put(route('sections.update', ['section' => $section]), $data);
        $response->assertRedirect(route('sections.index'));
        $response->assertSessionHas('status', 'Section updated!');
    }

    /**
     * @test
     */
    public function it_destroys_section_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $section = factory(Section::class)->create();
        $response = $this->delete(route('sections.destroy', ['section' => $section]));
        $response->assertRedirect(route('sections.index'));
        $response->assertSessionHas('status', 'Section destroyed!');
    }
}
