<?php

namespace culturando\Http\Controllers;

use Illuminate\Http\Request;

use culturando\Http\Requests;
use culturando\Models\Parceiro;

class ParceirosController extends Controller
{
    public function __construct(Request $request) {       
        $this->middleware('auth');
    }

    private function validar(Request $req) {
        $this->validate($req, [
            'nome' => 'required|max:100',
            'imagem' => 'image',
            'link' => 'max:255',
        ]);
    }

    public function listarElementos() {
    	
    	$parceiros = Parceiro::all();
    	return view('/admin/parceiros/painel')->with('parceiros', $parceiros);
    }

    public function novo() {
        return view('/admin/parceiros/cadastrar');
    }

    public function cadastrar(Request $req) {

        $this->validar($req);
        $params = $req->all();
        $parceiro = new Parceiro($params);
        
        if($req->imagem != null) {
            $parceiro->imagem = $this->subirImagem('parceiro');;
        }
                
        $parceiro->save();
        
        return redirect()->action('ParceirosController@listarElementos')->withInput();
    }

    public function exibir($id) {

        if($parceiro = Parceiro::find($id)) {
            return view('/admin/parceiros/detalhes')->with('parceiro', $parceiro);
        }
        else {
            return redirect()->action('ParceirosController@listarElementos')->withInput();
        }
    }

    public function editar($id) {
        
        $parceiro = Parceiro::find($id);
        return view('/admin/parceiros/alterar')->with('p', $parceiro);
    }

    public function alterar($id, Request $req) {

        $this->validar($req);
        $parceiro = Parceiro::findOrFail($id);
        $params = $req->all();

        if($req->exists('imagem')) {
            if($parceiro->imagem) {
               $parceiro->imagem = substr($parceiro->imagem, 1);
                unlink($parceiro->imagem); 
            }

            $params['imagem'] = $this->subirImagem('parceiro');
        }

        $parceiro->fill($params)->save();

       return redirect()->action('ParceirosController@listarElementos');
    }

    public function excluir($id) {
        
        $parceiro = Parceiro::find($id);

        if($parceiro->exists('imagem')) {            
            $parceiro->imagem = substr($parceiro->imagem, 1);
            unlink($parceiro->imagem);
        }        

        $parceiro->delete();

        return redirect()->action('ParceirosController@listarElementos');
    }
}
