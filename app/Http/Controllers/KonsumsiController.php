<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonsumsiController extends Controller
{
    public function index()
    {
        return view('pages.konsumsi.index');
    }
}
