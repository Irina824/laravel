<?php

namespace App\Http\Controllers;

use http\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\WorkOnSession;
use App\Models\InputValues;
use Session;

class InputController extends Controller
{
    public function main(Request $request)
    {
        $userNumber = $request->input('setNumber');

        if ($userNumber>9 & $userNumber<100) {
            $session= new WorkOnSession;
            $session->saveArraySession(['setNumber' =>$userNumber]);

            $trust = new InputValues;
            $paramSession = $trust->getTrustExtrasens($request);
            $session->saveArraySession($paramSession);

            //dd($request);
            return redirect()->action([MainController::class, 'main']);
        } else {
            return view('input', ['error'=>'Введите двухзначное число!']);
        }
    }
}
