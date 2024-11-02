<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Tarea;

class TareaIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_task()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->post('/api/tareas', [
            'titulo' => 'Nueva Tarea',
            'descripcion' => 'Descripción de la tarea',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tareas', ['titulo' => 'Nueva Tarea']);
    }

    public function test_can_mark_task_as_completed()
    {
        $user = User::factory()->create();
        $tarea = Tarea::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->get("/api/tarea-cumplir/{$tarea->id}");

        $response->assertStatus(200);
        $this->assertDatabaseHas('tareas', ['id' => $tarea->id, 'estado' => 'cumplida']);
    }
}
