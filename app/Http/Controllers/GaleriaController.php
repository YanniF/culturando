<?php

namespace culturando\Http\Controllers;

use Illuminate\Http\Request;

use culturando\Http\Requests;
use culturando\Models\Galeria;

class GaleriaController extends Controller
{
    public function __construct(Request $request) {       
        $this->middleware('auth');
    }

    private function validar(Request $req) {
        $this->validate($req, [
            'titulo' => 'required|max:100',
            'imagem' => 'image',
        ]);
    }

    public function listarElementos() {
    	
    	$galeria = Galeria::all();
    	return view('/admin/galeria/painel')->with('galeria', $galeria);
    }

    public function novo() {
        return view('/admin/galeria/cadastrar');
    }

    public function cadastrar(Request $req) {

        $this->validar($req);
        $params = $req->all();
        $galeria = new Galeria($params);
        
        if($req->imagem != null) {
            $galeria->imagem = $this->subirImagem('galeria');
        }
                
        $galeria->save();
        
        return redirect()->action('GaleriaController@listarElementos')->withInput();
    }

    public function exibir($id) {

        if($galeria = Galeria::find($id)) {
            return view('/admin/galeria/detalhes')->with('galeria', $galeria);
        }
        else {
            return redirect()->action('GaleriaController@listarElementos')->withInput();
        }
    }

    public function editar($id) {
        
        $galeria = Galeria::find($id);
        return view('/admin/galeria/alterar')->with('g', $galeria);
    }

    public function alterar($id, Request $req) {

        $this->validar($req);
        $galeria = Galeria::findOrFail($id);
        $params = $req->all();

        if($req->exists('imagem')) {
            if($galeria->imagem) {
               $galeria->imagem = substr($galeria->imagem, 1);
                unlink($galeria->imagem); 
            }
            $params['imagem'] = $this->subirImagem('galeria');
        }

        $galeria->fill($params)->save();

       return redirect()->action('GaleriaController@listarElementos');
    }

    public function excluir($id) {
        
        $galeria = Galeria::find($id);

        if($galeria->exists('imagem')) {            
            $galeria->imagem = substr($galeria->imagem, 1);
            unlink($galeria->imagem);
        }        

        $galeria->delete();

        return redirect()->action('GaleriaController@listarElementos');
    }
}
