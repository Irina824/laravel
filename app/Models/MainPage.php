<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class MainPage extends Model
{
    use HasFactory;

    public static function getSessionBegin()
    {
        $countExtrasens = 2;    // кол-во экстрасенсов, участвующих в тестировании
        $countSession = 1;

        if (Session::has('countSession')) {
            $countSession = Session::get('countSession');
            $countSession++;
        }

        $arraySession = ['countExtrasens' => $countExtrasens,
            'countSession' => $countSession
        ];

        for ($i=1; $i<$countExtrasens+1; $i++) {
            (Session::has('extrAll'.$i)) ? $extrAll = Session::get('extrAll' . $i) : $extrAll = '';
            $arraySession['extrAll' . $i] = $extrAll;

            (Session::has('extr'.$i)) ? $extr = Session::get('extr' . $i) : $extr = 0;
            $arraySession['extr' . $i] = $extr;

            (Session::has('trust'.$i)) ? $trust = Session::get('trust' . $i) : $trust = 0;
            $arraySession['trust' . $i] = $trust;

            (Session::has('trustTrue'.$i)) ? $trustTrue = Session::get('trustTrue' . $i) : $trustTrue = 0;
            $arraySession['trustTrue' . $i] = $trustTrue;
        }

        (Session::has('userAll')) ? $userAll = Session::get('userAll') : $userAll = '';
        $arraySession['userAll'] = $userAll;

        $session = new WorkOnSession();
        $session->saveArraySession($arraySession);

        //var_dump($arraySession);
        return $arraySession;
    }
}
