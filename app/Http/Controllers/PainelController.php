<?php

namespace culturando\Http\Controllers;

use Illuminate\Http\Request;

use culturando\Http\Requests;

class PainelController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function chamarPainel() {
    	return view('/admin/painel');
    }
}
