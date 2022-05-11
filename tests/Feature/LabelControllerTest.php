<?php

namespace Tests\Feature;

use App\Models\Label;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LabelControllerTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    private mixed $user;
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function testIndex()
    {
        $response = $this->get(route('labels.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $responseWithoutAuth = $this->get(route('labels.create'));
        $responseWithoutAuth->assertStatus(403);
        $response = $this->actingAs($this->user)->get(route('labels.create'));
        $response->assertOk();
    }

    public function testStore()
    {
        $data = Label::factory()->make()->only(['name', 'description']);
        $response = $this->actingAs($this->user)->post(route('labels.store', $data));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('labels.index'));
        $this->get(route('labels.index'))->assertSee($data['name']);
        $this->assertDatabaseHas('labels', $data);
    }

    public function testEdit()
    {
        $label = Label::factory()->create();
        $responseWithoutAuth = $this->get(route('labels.edit', $label));
        $responseWithoutAuth->assertStatus(403);
        $response = $this->actingAs($this->user)->get(route('labels.edit', $label));
        $response->assertOk();
    }

    public function testUpdate()
    {
        $label = Label::factory()->create();
        $otherName = Label::factory()->make()->only(['name']);
        $responseWithoutAuth = $this->patch(route('labels.update', ['label' => $label]), $otherName);
        $responseWithoutAuth->assertStatus(403);
        $response = $this
            ->actingAs($this->user)
            ->patch(route('labels.update', ['label' => $label]), $otherName);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('labels.index'));
        $this->get(route('labels.index'))->assertSee($otherName['name']);
        $this->assertDatabaseHas('labels', $otherName);
    }

    public function testDestroy()
    {
        $label = Label::factory()->create();
        $response = $this
            ->actingAs($this->user)
            ->delete(route('labels.destroy', ['label' => $label]));
        $response->assertRedirect(route('labels.index'));
        $this->assertDatabaseMissing('labels', ['id' => $label->id]);
    }
}
