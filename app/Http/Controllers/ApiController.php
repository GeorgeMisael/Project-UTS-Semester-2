<?php

namespace App\Http\Controllers;

class ApiController extends Controller
{
    public function gempa()
    {
        return view('bmkg.gempa');
    }
}
