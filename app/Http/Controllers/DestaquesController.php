<?php

namespace culturando\Http\Controllers;

use Illuminate\Http\Request;

use culturando\Http\Requests;

class DestaquesController extends Controller
{
    public function __construct(Request $request) {
       
        $this->middleware('auth');
    }

    public function listarElementos() {
    	return view('/admin/destaques/painel');
    }
}
