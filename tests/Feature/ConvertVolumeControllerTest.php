<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConvertVolumeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   /** @test */
   public function it_can_convert_volume_from_liters_to_gallons()
   {
       $response = $this->get('/api/convert/volume/10/liters');

       $response->assertStatus(200)
           ->assertJson(['unit' => 'gallons']);
   }

   /** @test */
   public function it_can_convert_volume_from_gallons_to_liters()
   {
       $response = $this->get('/api/convert/volume/5/gallons');

       $response->assertStatus(200)
           ->assertJson(['unit' => 'liters']);
   }

   /** @test */
   public function it_returns_error_for_invalid_unit()
   {
       $response = $this->get('/api/convert/volume/10/invalid_unit');

       $response->assertStatus(400)
           ->assertJson(['error' => 'Unitat no valida. Utilitza "liters" o "gallons"']);
   }
}
