<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConvertSpeedControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function it_can_convert_speed_from_kilometers_per_hour_to_miles_per_hour()
    {
        $response = $this->get('/api/convert/speed/100/kmph');

        $response->assertStatus(200)
            ->assertJson(['unit' => 'mph']);
    }

    /** @test */
    public function it_can_convert_speed_from_miles_per_hour_to_kilometers_per_hour()
    {
        $response = $this->get('/api/convert/speed/50/mph');

        $response->assertStatus(200)
            ->assertJson(['unit' => 'kmph']);
    }

    /** @test */
    public function it_returns_error_for_invalid_unit()
    {
        $response = $this->get('/api/convert/speed/100/invalid_unit');

        $response->assertStatus(400)
            ->assertJson(['error' => 'Unitat no valida. Utilitza "kmph" (quilometres per hora) o "mph" (milles per hora)']);
    }
}
