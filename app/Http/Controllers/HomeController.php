<?php

namespace culturando\Http\Controllers;

use Illuminate\Http\Request;

use culturando\Http\Requests;
use culturando\Models\Cidade;
use culturando\Models\TipoAtracao;

class HomeController extends Controller
{
    public function listarCidadeBaixada() {
        return Cidade::select('nome')->where('baixadaOuVale', '=', 'Baixada')->get();
    }

    public function listarCidadeVale() {
        return Cidade::select('nome')->where('baixadaOuVale', '=', 'Vale')->get();
    }

    public function listarAtracoes() {
        return TipoAtracao::all();
    }

    //popula o menu da página inicial
    public function criarMenu() {

        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();        

        return view('/home')->with(array('tipoAtracao' => $tipoAtracao, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale));
    }
}
