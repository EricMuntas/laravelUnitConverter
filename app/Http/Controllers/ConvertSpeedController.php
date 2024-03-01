<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertSpeedController extends Controller
{
    public function convertSpeed($value, $unit)
    {
        if ($unit === 'kmph') {
            $miles_per_hour = $value / 1.60934;
            return response()->json(['value' => $miles_per_hour, 'unit' => 'mph']);
        } elseif ($unit === 'mph') {
            $kilometers_per_hour = $value * 1.60934;
            return response()->json(['value' => $kilometers_per_hour, 'unit' => 'kmph']);
        } else {
            return response()->json(['error' => 'Unitat no valida. Utilitza "kmph" (quilometres per hora) o "mph" (milles per hora)'], 400);
        }
    }
}
