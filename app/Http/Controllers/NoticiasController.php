<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticias;
class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticias::all();
        return view("noticias.index", compact("noticias"));
    }

    public function show($id)
    {
        //
    }

}
