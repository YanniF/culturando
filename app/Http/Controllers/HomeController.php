<?php

namespace culturando\Http\Controllers;

use Illuminate\Http\Request;
use culturando\Http\Requests;

use culturando\Models\Cidade;
use culturando\Models\TipoAtracao;
use culturando\Models\Destaque;
use culturando\Models\Slider;
use culturando\Models\Evento;
use culturando\Models\Parceiro;
use culturando\Models\Atracao;

class HomeController extends Controller
{
    //informações do menu
    public function listarCidadeBaixada() {
        return Cidade::select('nome')->where('baixadaOuVale', '=', 'Baixada')->get();
    }

    public function listarCidadeVale() {
        return Cidade::select('nome')->where('baixadaOuVale', '=', 'Vale')->get();
    }

    public function listarAtracoes() {
        return TipoAtracao::all();
    }
    //para exibir as imagens do slider
    public function listarImagemSlider() {
        return Slider::all();
    }
    //para exibir os destaques
    public function listarDestaques() {
        return Destaque::all();
    }
    //para exibir os evento
    public function listarEventosBaixada() {
        return Evento::select('*')->where('eventoEm', '=', 'Baixada Santista')->orWhere('eventoEm', '=', 'Vale do Ribeira')->latest()->limit(6)->get();//apenas os 6 últimos resultados
    }

    public function listarEventosSP() {
        return Evento::select('*')->where('eventoEm', '=', 'São Paulo')->latest()->limit(3)->get();
    }

    public function index() {
        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();
        $destaques = $this->listarDestaques();
        $slider = $this->listarImagemSlider();
        $eventosBaixada = $this->listarEventosBaixada();
        $eventosSP = $this->listarEventosSP();

        return view('/home')->with(array(
                                        'tipoAtracao' => $tipoAtracao, 
                                        'baixada' => $cidadesBaixada, 
                                        'vale' => $cidadesVale, 
                                        'destaques' => $destaques, 
                                        'slider' => $slider,
                                        'eventosBaixada' => $eventosBaixada,
                                        'eventosSP' => $eventosSP));
    }

    public function exibirDestaques($id = null) {
        if($id == null) {
            $destaques = Destaque::all();
        }
        else {
            $destaques = Destaque::find($id);
        }

        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();

        return view('/destaques')->with(array('destaques' => $destaques, 'tipoAtracao' => $tipoAtracao, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale, ));
    }

    public function exibirEventos($eventoEm, $id = null) {
        
        if($id == null) {
            if($eventoEm == 'São Paulo') {
                $eventos = $this->listarEventosSP();
            }
            else {
                $eventos = $this->listarEventosBaixada();
            }    
        }
        else {            
            $eventos = Evento::find($id);
        }

        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();

        return view('/eventos')->with(array('eventos' => $eventos, 'tipoAtracao' => $tipoAtracao, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale, ));
    }

    public function exibirParceiros() {
        $parceiros = Parceiro::all();

        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();

        return view('/parceiros')->with(array('parceiros' => $parceiros, 'tipoAtracao' => $tipoAtracao, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale, ));
    }

    public function exibirAtracoes($tipo, $cidade, $id = null) {

        if($id == null) {
            $atr = Atracao::select('*')->where('tipoAtracao', '=', $tipo)->where('cidade', '=', $cidade)->get();
        }
        else {
            $atr = Atracao::select('*')->where('id', '=', $id)->get();
        }

        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();

        return view('/atracoes')->with(array('atr' => $atr, 'tipoAtracao' => $tipoAtracao, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale, ));
    }

    public function baixadaTem() {

        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();

        $baixadaTem = Atracao::select('*')->whereIn('cidade', $cidadesBaixada)->orderBy('tipoAtracao')->get();

        return view('/baixada')->with(array('baixadaTem' => $baixadaTem, 'tipoAtracao' => $tipoAtracao, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale, ));
    }

     public function valeTem() {

        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();

        $valeTem = Atracao::select('*')->whereIn('cidade', $cidadesVale)->orderBy('tipoAtracao')->get();

        return view('/vale')->with(array('valeTem' => $valeTem, 'tipoAtracao' => $tipoAtracao, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale, ));
    }
}
