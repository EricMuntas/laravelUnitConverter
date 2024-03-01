<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertVolumeController extends Controller
{
    public function convertVolume($value, $unit)
    {
        if ($unit === 'liters') {
            $gallons = $value * 0.264172;
            return response()->json(['value' => $gallons, 'unit' => 'gallons']);
        } elseif ($unit === 'gallons') {
            $liters = $value / 0.264172;
            return response()->json(['value' => $liters, 'unit' => 'liters']);
        } else {
            return response()->json(['error' => 'Unitat no valida. Utilitza "liters" o "gallons"'], 400);
        }
    }
}
