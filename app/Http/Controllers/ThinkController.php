<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RandExtrasens;

class ThinkController extends Controller
{
    public function main(Request $request) {

        // Запрашиваются догадки экстрасенсов
        $randExtrasens = new RandExtrasens;
        $session = $randExtrasens->RandomResult();

        return view('input', ['error'=>'', $session]);
    }
}
