<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    private mixed $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        TaskStatus::factory()->create();
    }

    public function testIndex()
    {
        $response = $this->get(route('tasks.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $responseWithoutAuth = $this->get(route('tasks.create'));
        $responseWithoutAuth->assertStatus(403);
        $response = $this->actingAs($this->user)->get(route('tasks.create'));
        $response->assertOk();
    }

    public function testStore()
    {
        $dataTask = Task::factory()->make()->only(['name', 'description', 'status_id', 'assigned_to_id']);
        $response = $this->actingAs($this->user)->post(route('tasks.store'), $dataTask);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('tasks.index'));
        $this->get(route('tasks.index'))->assertSee($dataTask['name']);
        $this->assertDatabaseHas('tasks', $dataTask);
    }

    public function testShow()
    {
        $task = Task::factory()->create();
        $responseWithoutAuth = $this->get(route('tasks.show', ['task' => $task]));
        $responseWithoutAuth->assertStatus(403);
        $response = $this->actingAs($this->user)->get(route('tasks.show', ['task' => $task]));
        $response->assertSessionHasNoErrors();
        $response->assertOk();
    }

    public function testEdit()
    {
        $task = Task::factory()->create();
        $responseWithoutAuth = $this->get(route('tasks.edit', ['task' => $task]));
        $responseWithoutAuth->assertStatus(403);
        $response = $this->actingAs($this->user)->get(route('tasks.edit', $task));
        $response->assertOk();
    }

    public function testUpdate()
    {
        $task = Task::factory()->create();
        $changedData = Task::factory()->make()->only(['name', 'description', 'status_id', 'assigned_to_id']);
        $responseWithoutAuth = $this->patch(route('tasks.update', ['task' => $task]), $changedData);
        $responseWithoutAuth->assertStatus(403);
        $response = $this
            ->actingAs($this->user)
            ->patch(route('tasks.update', ['task' => $task]), $changedData);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('tasks.index'));
        $this->get(route('tasks.index'))->assertSee($changedData['name']);
        $this->assertDatabaseHas('tasks', $changedData);
    }

    public function testDestroy()
    {
        $task = Task::factory()->create();
        $response = $this
            ->actingAs($this->user)
            ->delete(route('tasks.destroy', ['task' => $task]));
        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
