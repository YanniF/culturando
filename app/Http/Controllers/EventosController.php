<?php

namespace culturando\Http\Controllers;

use Illuminate\Http\Request;

use culturando\Http\Requests;
use culturando\Models\Evento;
use Illuminate\Support\Facades\Input;

class EventosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
	
	public function listarElementos(Request $req) {
        
        if($req->eventoEm != null) {            
            //verificando se foi selecionado algo nos combos e executando a query conforme a opção selecionada
            if($req->eventoEm == '-') {
                $eventos = Evento::all();
            }
            else if($req->eventoEm == '-') {
                $eventos = Evento::select('*')->where('eventoEm', '=', $req->evento)->get();
            }
        }
        else {            
            $eventos = Evento::all();
        }   

        return view('/admin/eventos/painel')->with('eventos', $eventos);
    }

    public function verificarBotao(Request $req) {

        if(Input::get('cadastrar')) {
            return redirect()->action('EventosController@novo');
        } 
        elseif(Input::get('filtrar')) {            
            return $this->listarElementos($req);
        }
        else {
            return redirect()->action('EventosController@listarElementos');
        }
    }

    public function novo() {        
        return view('/admin/eventos/cadastrar');
    }

    public function cadastrar(Request $req) {

        $params = $req->all();
        $eventos = new Evento($params);
        
        if($req->foto != null) {
            $ext = strtolower(substr($_FILES['foto']['name'], -4));
            $novoNome = 'evento-' . date("Y.m.d-H.i.s") . $ext;
            $dir = 'img/upload/';            
            move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $novoNome);
            $eventos->foto = '/' . $dir . $novoNome;
        }
                
        $eventos->save();
        
        return redirect()->action('EventosController@listarElementos')->withInput();
    }

    public function exibir($id) {

        if($evento = Evento::find($id)) {
            return view('/admin/eventos/detalhes')->with('evento', $evento);
        }
        else {
            return redirect()->action('EventosController@listarElementos')->withInput();
        }
    }

    public function editar($id) {
        
    	$evento = Evento::find($id);
        return view('/admin/eventos/alterar')->with('e', $evento);
    }

    public function alterar($id, Request $req) {

        $evento = Evento::findOrFail($id);
        $params = $req->all();

        if($req->exists('imagem')) {
            if($evento->imagem) {
               $evento->imagem = substr($evento->imagem, 1);
                unlink($evento->imagem); 
            }
            $ext = strtolower(substr($_FILES['imagem']['name'], -4)); 
            $novoNome = 'evento-' . date("Y.m.d-H.i.s") . $ext;
            $dir = 'img/upload/';            
            move_uploaded_file($_FILES['imagem']['tmp_name'], $dir . $novoNome);         
            $params['imagem'] = '/' . $dir . $novoNome;
        }

        $evento->fill($params)->save();

       return redirect()->action('EventosController@listarElementos');
    }

    public function excluir($id) {
        
        $evento = Evento::find($id);

        if($evento->exists('imagem')) {
            $evento->imagem = substr($evento->imagem, 1);
            unlink($evento->imagem);
        }

        $evento->delete();

        return redirect()->action('EventosController@listarElementos');
    }
}
