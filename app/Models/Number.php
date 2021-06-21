<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Number extends Model
{
    use HasFactory;

    public function getRandomResult($request) {

        Session::put('ekstr1', rand(10, 99));   // догадка экстрасенса 1
        Session::put('ekstr2', rand(10, 99));   // догадка экстрасенса 2

        $ekstr1All = Session::get('ekstr1_all');
        $ekstr2All = Session::get('ekstr2_all');

        (Session::get('count') == 1) ? $symbol = ' ': $symbol = ', ';

        Session::put('ekstr1_all', $ekstr1All.$symbol.Session::get('ekstr1'));
        Session::put('ekstr2_all', $ekstr2All.$symbol.Session::get('ekstr2'));

        return true;
    }

    public function getNumberUser($request) {

        $user = $request->input('setNumber')-0;
        Session::put('setNumber', $user);

        $count = Session::get('count');
        ($count == 1) ? $symbol = ' ': $symbol = ', ';

        $useAll = Session::get('user_all');
        Session::put('user_all', $useAll.$symbol.$user);

        // подсчёт уровня достоверности каждого экстрасенса
        $ekstr1 = Session::get('ekstr1');
        $ekstr2 = Session::get('ekstr2');

        $trust1 = Session::get('trust1')-0;
        $trust2 = Session::get('trust2')-0;

        ($ekstr1 == $user) ? Session::put('trust1', ++$trust1) : Session::put('trust1', $trust1);
        ($ekstr2 == $user) ? Session::put('trust2', ++$trust2) : Session::put('trust2', $trust2);

        //Session::flush();
        return true;
    }
}
