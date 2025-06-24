<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SusunanController extends Controller
{
    public function index()
    {
        return view('pages.susunan.index');
    }
}
