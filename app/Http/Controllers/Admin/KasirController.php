<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller;

class KasirController extends Controller
{
    public function index()
    {
        return view('kasir.kasir');
    }
}
