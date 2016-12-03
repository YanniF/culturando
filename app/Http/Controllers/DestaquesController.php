<?php

namespace culturando\Http\Controllers;

use Illuminate\Http\Request;

use culturando\Http\Requests;
use culturando\Models\Destaque;

class DestaquesController extends Controller
{
    public function __construct(Request $request) {
       
        $this->middleware('auth');
    }

    public function listarElementos() {

    	$destaques = Destaque::all();
    	return view('/admin/destaques/painel')->with('destaques', $destaques);
    }

    public function novo() {
        return view('/admin/destaques/cadastrar');
    }

    public function cadastrar(Request $req) {

        $params = $req->all();
        $destaque = new Destaque($params);
        
        if($req->imagem != null) {            
            $destaque->imagem = $this->subirImagem('destaque');            
        }
                
        $destaque->save();
        
        return redirect()->action('DestaquesController@listarElementos')->withInput();
    }

    public function exibir($id) {

        if($destaque = Destaque::find($id)) {
            return view('/admin/destaques/detalhes')->with('destaque', $destaque);
        }
        else {
            return redirect()->action('DestaqueController@listarElementos')->withInput();
        }
    }

    public function editar($id) {
        
        $destaque = Destaque::find($id);

        return view('/admin/destaques/alterar')->with('d', $destaque);
    }

    public function alterar($id, Request $req) {

        $destaque = Destaque::findOrFail($id);
        $params = $req->all();

        if($req->exists('imagem')) {
            if($destaque->imagem) {
               $destaque->imagem = substr($destaque->imagem, 1);
                unlink($destaque->imagem); 
            }
                    
            $params['imagem'] = $this->subirImagem('destaque'); 
        }

        $destaque->fill($params)->save();

       return redirect()->action('DestaquesController@listarElementos');
    }

    public function excluir($id) {
        
        $destaque = Destaque::find($id);

        if($destaque->imagem != null) {
            $destaque->imagem = substr($destaque->imagem, 1);
            unlink($destaque->imagem);
        }

        $destaque->delete();

        return redirect()->action('DestaquesController@listarElementos');
    }
}
