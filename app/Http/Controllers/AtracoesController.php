<?php

namespace culturando\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

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
    public function listarElementosPainel(Request $req) {
        
        if($req->tipoAtracao != null && $req->cidade != null) {
            
            //verificando se foi selecionado algo nos combos e executando a query conforme a opção selecionada
            if($req->tipoAtracao == '-' && $req->cidade == '-') {
                $atracoes = Atracao::all();
            }
            else if($req->tipoAtracao == '-') {
                $atracoes = Atracao::select('*')->where('cidade', '=', $req->cidade)->get();
            }
            else if($req->cidade == '-') {
                $atracoes = Atracao::select('*')->where('tipoAtracao', '=', $req->tipoAtracao)->get();
            }
            else {
                $atracoes = Atracao::select('*')->where('tipoAtracao', '=', $req->tipoAtracao)->where('cidade', '=', $req->cidade)->get();
            }
        }
        else {            
            $atracoes = Atracao::all();
        }   

        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();        

        return view('/admin/atracoes/painel')->with(array('tipoAtracao' => $tipoAtracao, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale, 'atracoes' => $atracoes));
    }

    //faz a ação conforme o botão clicado
    public function verificarBotao(Request $req) {

        if(Input::get('cadastrar')) {
            return redirect()->action('AtracoesController@novo');//redireciona para a página de cadastro
        } 
        elseif(Input::get('filtrar')) {            
            return $this->listarElementosPainel($req);
        }
        else {
            return redirect()->action('AtracoesController@listarElementosPainel');
        }
    }

    //exibe a página de cadastro de atrações
    public function novo() {
        
        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();

        return view('/admin/atracoes/cadastrar')->with(array('tipoAtracao' => $tipoAtracao, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale));
    }

    public function cadastrar(Request $req) {

        $params = $req->all();
        $atracoes = new Atracao($params);
        
        if($req->foto != null) {//caso tenha sido cadastrado uma imagem
            //tratamento da imagem
            $ext = strtolower(substr($_FILES['foto']['name'], -4)); //Pegando extensão do arquivo
            $novoNome = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = 'img/upload/';
            
            move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $novoNome); //Faz o upload do arquivo        
            $atracoes->foto = '/' . $dir . $novoNome;//Insere o caminho do arquivo para o banco
        }
                
        $atracoes->save();
        
        return redirect()->action('AtracoesController@listarElementosPainel')->withInput();
    }

    public function exibir($id) {

        if($atracao = Atracao::find($id)) {
            return view('/admin/atracoes/detalhes')->with('atracao', $atracao);
        }
        else {
            return redirect()->action('AtracoesController@listarElementosPainel')->withInput();
        }
    }

    public function editar($id) {
        
        $atracao = Atracao::find($id);
        $cidadesBaixada = $this->listarCidadeBaixada();
        $cidadesVale = $this->listarCidadeVale();
        $tipoAtracao = $this->listarAtracoes();

        return view('/admin/atracoes/alterar')->with(array('a' => $atracao, 'tipoAtracao' => $tipoAtracao, 'baixada' => $cidadesBaixada, 'vale' => $cidadesVale));
    }

    public function alterar($id, Request $req) {

        $atracao = Atracao::findOrFail($id);
        $params = $req->all();

        if($req->exists('foto')) {
            //apagando a imagem antiga, se houver
            if($atracao->foto) {
               $atracao->foto = substr($atracao->foto, 1);
                unlink($atracao->foto); 
            }            
            //e adicionando uma nova
            $ext = strtolower(substr($_FILES['foto']['name'], -4)); 
            $novoNome = date("Y.m.d-H.i.s") . $ext;
            $dir = 'img/upload/';            
            move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $novoNome);         
            $params['foto'] = '/' . $dir . $novoNome;
        }

        $atracao->fill($params)->save();

       return redirect()->action('AtracoesController@listarElementosPainel');
    }

    public function excluir($id) {
        
        $atracao = Atracao::find($id);

        if($atracao->foto != null) {
            $atracao->foto = substr($atracao->foto, 1);//barras...
            unlink($atracao->foto);//apagar a imagem
        }

        $atracao->delete();

        return redirect()->action('AtracoesController@listarElementosPainel');
    }
}