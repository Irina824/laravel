<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class WorkOnSession extends Model
{
    use HasFactory;

    public function saveArraySession($count) {

        (Session::get('countSession') <= 1) ? $symbol = ' ' : $symbol = ', ' ;

        foreach ($count as $key=>$value) {

            if ($key =='setNumber') {
                $key = 'userAll';
                $value = Session::get('userAll').$symbol.$value;
            }

            if (str_contains($key, 'extrAll')) {
                $index = substr($key, 7, strlen($key));
                $key = 'extrAll'.$index;
                $key1 = 'extr'.$index;
                $value = Session::get($key).$symbol.Session::get($key1);
            }

            Session::put($key, $value);
        }
        //Session::flush();
    }
}
