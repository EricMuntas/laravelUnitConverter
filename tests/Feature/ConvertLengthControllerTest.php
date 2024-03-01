<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConvertLengthControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function it_can_convert_length_from_meters_to_feet()
    {
        $response = $this->get('/api/convert/length/10/meters');

        $response->assertStatus(200)
            ->assertJson(['unit' => 'feet']);
    }

    /** @test */
    public function it_can_convert_length_from_feet_to_meters()
    {
        $response = $this->get('/api/convert/length/20/feet');

        $response->assertStatus(200)
            ->assertJson(['unit' => 'meters']);
    }

    /** @test */
    public function it_returns_error_for_invalid_unit()
    {
        $response = $this->get('/api/convert/length/10/invalid_unit');

        $response->assertStatus(400)
            ->assertJson(['error' => 'Unitat no valida. Utilitza "meters" o "feet"']);
    }
}
