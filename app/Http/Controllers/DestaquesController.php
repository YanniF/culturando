<?php

namespace culturando\Http\Controllers;

use Illuminate\Http\Request;

use culturando\Http\Requests;
use culturando\Models\Destaque;

class DestaquesController extends Controller
{
    public function __construct(Request $request) {
       
        $this->middleware('auth');
    }

    public function listarElementos() {
    	
    	$destaques = Destaque::all();
    	return view('/admin/destaques/painel')->with('destaques', $destaques);
    }

    public function novo() {
        return view('/admin/destaques/cadastrar');
    }
}
