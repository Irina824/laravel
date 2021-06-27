<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class RandExtrasens extends Model
{
    use HasFactory;

    public function RandomResult() {

        $countExtrasens = Session::get('countExtrasens');
        $arraySession = [];
        for ($i=1; $i < $countExtrasens+1; $i++) {
            $arraySession['extr' . $i] = rand(10, 99);
        }

        $session = new WorkOnSession;
        $session->saveArraySession($arraySession);

        return $arraySession;
    }
}
