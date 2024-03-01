<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConvertTemperatureControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   /** @test */
   public function it_can_convert_temperature_from_celsius_to_fahrenheit()
   {
       $response = $this->get('/api/convert/temperature/25/celsius');

       $response->assertStatus(200)
           ->assertJson(['unit' => 'fahrenheit']);
   }

   /** @test */
   public function it_can_convert_temperature_from_fahrenheit_to_celsius()
   {
       $response = $this->get('/api/convert/temperature/98/fahrenheit');

       $response->assertStatus(200)
           ->assertJson(['unit' => 'celsius']);
   }

   /** @test */
   public function it_returns_error_for_invalid_unit()
   {
       $response = $this->get('/api/convert/temperature/25/invalid_unit');

       $response->assertStatus(400)
           ->assertJson(['error' => 'Unitat no valida. Utilitza "celsius" o "fahrenheit"']);
   }
}
