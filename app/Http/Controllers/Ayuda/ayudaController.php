<?php

namespace App\Http\Controllers\Ayuda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ayudaController extends Controller
{
    public function index()
    {
        return view('ayuda.index');
    }
}
