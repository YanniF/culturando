<?php

namespace culturando\Http\Controllers;

use Illuminate\Http\Request;

use culturando\Http\Requests;
use culturando\Models\Cidade;
use culturando\Models\TipoAtracao;

class AtracoesController extends Controller
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

    public function criarMenu() {

        $cidadesBaixada = AtracoesController::listarCidadeBaixada();
        $cidadesVale = AtracoesController::listarCidadeVale();
        $atracoes = AtracoesController::listarAtracoes();
        

        return view('/home')->with(array('atracoes' => $atracoes, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale));
    }

    public function criarMenuAtracoes() {
        
        $cidadesBaixada = AtracoesController::listarCidadeBaixada();
        $cidadesVale = AtracoesController::listarCidadeVale();
        $atracoes = AtracoesController::listarAtracoes();

        return view('/atracoes')->with(array('atracoes' => $atracoes, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale));
    }

    public function criarComboPainel() {
        
        $cidadesBaixada = AtracoesController::listarCidadeBaixada();
        $cidadesVale = AtracoesController::listarCidadeVale();
        $atracoes = AtracoesController::listarAtracoes();

        return view('/painel')->with(array('atracoes' => $atracoes, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale));
    }

    public function novo() {
        $cidadesBaixada = AtracoesController::listarCidadeBaixada();
        $cidadesVale = AtracoesController::listarCidadeVale();
        $atracoes = AtracoesController::listarAtracoes();

        return view('/cadastrar')->with(array('atracoes' => $atracoes, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale));
    }
}