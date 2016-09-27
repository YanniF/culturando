<?php

namespace culturando\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use culturando\Http\Requests;
use culturando\Models\Cidade;
use culturando\Models\TipoAtracao;
use culturando\Models\Atracao;

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

    //popula o menu da página inicial
    public function criarMenu() {

        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();        

        return view('/home')->with(array('tipoAtracao' => $tipoAtracao, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale));
    }

    //popula o menu da página de atrações
    public function criarMenuAtracoes() {
        
        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();

        return view('/atracoes')->with(array('tipoAtracao' => $tipoAtracao, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale));
    }

    //popula o combo da página painel 
    public function criarComboPainel() {
        
        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();

        return view('/painel')->with(array('tipoAtracao' => $tipoAtracao, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale));
    }

    //faz a ação conforme o botão clicado
    public function verificarBotao() {

        if(Input::get('cadastrar')) {
            return redirect()->action('AtracoesController@novo');//redireciona para a página de cadastro
        } 
        elseif(Input::get('filtrar')) {
            $this->filtrar(); //if register then use this method
        }
        else {
            return redirect()->action('AtracoesController@criarComboPainel');
        }
    }

    public function filtrar() {

        return "Filtrando";
    }

    //exibe a página de cadastro de atrações
    public function novo() {
        
        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();

        return view('/cadastrar')->with(array('tipoAtracao' => $tipoAtracao, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale));
    }

    public function cadastrar(Request $req) {

        $params = $req->all();
        $atracoes = new Atracao($params);
        $atracoes->save();

        return redirect()->action('AtracoesController@criarComboPainel')->withInput();

    }
}