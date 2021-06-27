<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainPage;

class MainController extends Controller
{
    public function main() {

        $session = MainPage::getSessionBegin();
        return view('main', $session);
    }
}
