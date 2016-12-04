<?php

namespace culturando\Http\Controllers;

use Illuminate\Http\Request;
use culturando\Http\Requests;

use culturando\Models\Cidade;
use culturando\Models\TipoAtracao;
use culturando\Models\Destaque;
use culturando\Models\Slider;

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

    public function listarDestaques() {
        return Destaque::all();
    }

    public function listarImagemSlider() {
        return Slider::all();
    }

    public function index() {
        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();
        $destaques = $this->listarDestaques();
        $slider = $this->listarImagemSlider();

        return view('/home')->with(array(
                                        'tipoAtracao' => $tipoAtracao, 
                                        'baixada' => $cidadesBaixada, 
                                        'vale' => $cidadesVale, 
                                        'destaques' => $destaques, 
                                        'slider' => $slider));
    }
}
