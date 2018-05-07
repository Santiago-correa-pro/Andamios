<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Bienvenido a Andamios (Sistema de Inventario)';
        return view('pages.index')->with('title', $title);
    }

    public function about() {
        $title = 'Acerca del Sistema';
        return view('pages.about')->with('title',$title);
    }
}
