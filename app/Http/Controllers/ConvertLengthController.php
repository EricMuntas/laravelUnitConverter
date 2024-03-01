<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertLengthController extends Controller
{
    public function convertLength($value, $unit)
    {
        if ($unit === 'meters') {
            $feet = $value * 3.28084;
            return response()->json(['value' => $feet, 'unit' => 'feet']);
        } elseif ($unit === 'feet') {
            $meters = $value / 3.28084;
            return response()->json(['value' => $meters, 'unit' => 'meters']);
        } else {
            return response()->json(['error' => 'Unitat no valida. Utilitza "meters" o "feet"'], 400);
        }
    }
}
