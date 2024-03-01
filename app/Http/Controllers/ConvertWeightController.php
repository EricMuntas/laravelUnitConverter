<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertWeightController extends Controller
{
    public function convertWeight($value, $unit)
    {
        if ($unit === 'kilograms') {
            $pounds = $value * 2.20462;
            return response()->json(['value' => $pounds, 'unit' => 'pounds']);
        } elseif ($unit === 'pounds') {
            $kilograms = $value / 2.20462;
            return response()->json(['value' => $kilograms, 'unit' => 'kilograms']);
        } else {
            return response()->json(['error' => 'Unitat no valida. Utilitza "kilograms" o "pounds"'], 400);
        }
    }
}
