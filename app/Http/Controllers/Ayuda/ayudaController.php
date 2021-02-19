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

    public function articulos()
    {
        return view('ayuda.articulos');
    }

    public function conceptos()
    {
        return view('ayuda.conceptos');
    }

    public function cortes()
    {
        return view('ayuda.cortes');
    }

    public function revisiones()
    {
        return view('ayuda.revisiones');
    }

    public function movil()
    {
        return view('ayuda.movil');
    }
}
