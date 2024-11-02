<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\PajaAgua;

class TrasladoPajaAguaIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_transfer_paja_agua()
    {
        $user = User::factory()->create();
        $pajaAgua = PajaAgua::factory()->create(['residente_id' => $user->id]);

        $response = $this->actingAs($user, 'sanctum')->post('/api/traslados-paja-agua', [
            'residente_id' => $user->id,
            'nuevo_residente_id' => 2, // ID del nuevo residente
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('paja_aguas', ['residente_id' => 2]);
    }
}
