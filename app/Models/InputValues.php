<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class InputValues extends Model
{
    use HasFactory;

    public function getTrustExtrasens($request) {

        // подсчёт уровня достоверности экстрасенсов
        $user = $request->input('setNumber')-0;
        $countExtrasens = Session::get('countExtrasens');
        $countSession = Session::get('countSession');
        $arraySession = [];

        for ($i=1; $i < $countExtrasens+1; $i++) {
            $ekstr = Session::get('extr'.$i);
            $trust = Session::get('trust'.$i);

            ($ekstr == $user) ? $trust1 = $trust+1 : $trust1 = $trust;
            $arraySession['trust'.$i] = $trust1;

            $arraySession['trustTrue'.$i] = $trust1 / $countSession;
        }

        return $arraySession;
    }
}
