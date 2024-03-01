<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertTemperatureController extends Controller
{
    public function convertTemperature($value, $unit)
    {
        if ($unit === 'celsius') {
            $fahrenheit = ($value * 9/5) + 32;
            return response()->json(['value' => $fahrenheit, 'unit' => 'fahrenheit']);
        } elseif ($unit === 'fahrenheit') {
            $celsius = ($value - 32) * 5/9;
            return response()->json(['value' => $celsius, 'unit' => 'celsius']);
        } else {
            return response()->json(['error' => 'Unitat no valida. Utilitza "celsius" o "fahrenheit"'], 400);
        }
    }
}
