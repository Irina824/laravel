<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Number;
use Session;

class MainController extends Controller
{
    public function main() {
        if(Session::has('count')) {
            $count = $trustCount = Session::get('count');
            $count++;
        } else {
            $count = $trustCount = 1;
        }
        Session::put('count', $count);
        Session::put('trustCount', $trustCount);

        return view('main');
    }

    public function think(Request $request) {
        $number = new Number;
        $number->getRandomResult($request);
        return view('input');
    }

    public function input(Request $request) {
        $number = new Number;
        $number->getNumberUser($request);

        //dd($request);
        return redirect()->action([MainController::class, 'main']);
    }
}
