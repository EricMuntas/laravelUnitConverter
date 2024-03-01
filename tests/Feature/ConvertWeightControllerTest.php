<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConvertWeightControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   /** @test */
   public function it_can_convert_weight_from_kilograms_to_pounds()
   {
       $response = $this->get('/api/convert/weight/10/kilograms');

       $response->assertStatus(200)
           ->assertJson(['unit' => 'pounds']);
   }

   /** @test */
   public function it_can_convert_weight_from_pounds_to_kilograms()
   {
       $response = $this->get('/api/convert/weight/5/pounds');

       $response->assertStatus(200)
           ->assertJson(['unit' => 'kilograms']);
   }

   /** @test */
   public function it_returns_error_for_invalid_unit()
   {
       $response = $this->get('/api/convert/weight/10/invalid_unit');

       $response->assertStatus(400)
           ->assertJson(['error' => 'Unitat no valida. Utilitza "kilograms" o "pounds"']);
   }
}
