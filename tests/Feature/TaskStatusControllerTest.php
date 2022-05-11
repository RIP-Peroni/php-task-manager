<?php

namespace Tests\Feature;

use App\Models\TaskStatus;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskStatusControllerTest extends TestCase
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
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->actingAs($this->user)->get(route('task_statuses.create'));
        $response->assertOk();
    }

    public function testStore()
    {
        $data = TaskStatus::factory()->make()->only(['name']);
        $response = $this->actingAs($this->user)->post(route('task_statuses.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('task_statuses.index'));
        $this->get(route('task_statuses.index'))->assertSee($data['name']);
        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testEdit()
    {
        $taskStatus = TaskStatus::factory()->create();
        $response = $this->actingAs($this->user)->get(route('task_statuses.edit', $taskStatus));
        $response->assertOk();
    }

    public function testUpdate()
    {
        $taskStatus = TaskStatus::factory()->create();
        $otherName = TaskStatus::factory()->make()->only(['name']);
        $response = $this
            ->actingAs($this->user)
            ->patch(route('task_statuses.update', ['task_status' => $taskStatus]), $otherName);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('task_statuses.index'));
        $this->get(route('task_statuses.index'))->assertSee($otherName['name']);
        $this->assertDatabaseHas('task_statuses', $otherName);
    }

    public function testDestroy()
    {
        $taskStatus = TaskStatus::factory()->create();
        $response = $this
            ->actingAs($this->user)
            ->delete(route('task_statuses.destroy', ['task_status' => $taskStatus]));
        $response->assertRedirect(route('task_statuses.index'));
        $this->assertDatabaseMissing('task_statuses', ['id' => $taskStatus->id]);
    }
}
