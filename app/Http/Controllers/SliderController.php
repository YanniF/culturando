<?php

namespace culturando\Http\Controllers;

use Illuminate\Http\Request;

use culturando\Http\Requests;
use culturando\Models\Slider;

class SliderController extends Controller
{
    public function __construct(Request $request) {       
        $this->middleware('auth');
    }

    private function validar(Request $req) {
        $this->validate($req, [
            'titulo' => 'required|max:70',
            'mensagem' => 'required|max:255',
            'imagem' => 'image',
            'link' => 'max:255',
        ]);
    }

    public function listarElementos() {
    	
    	$slider = Slider::all();
    	return view('/admin/slider/painel')->with('slider', $slider);
    }

    public function novo() {
        return view('/admin/slider/cadastrar');
    }

    public function cadastrar(Request $req) {

        $this->validar($req);
        $params = $req->all();
        $slider = new Slider($params);
        
        if($req->imagem != null) {
            $slider->imagem = $this->subirImagem('slider');
        }
                
        $slider->save();
        
        return redirect()->action('SliderController@listarElementos')->withInput();
    }

    public function exibir($id) {

        if($slider = Slider::find($id)) {
            return view('/admin/slider/detalhes')->with('slider', $slider);
        }
        else {
            return redirect()->action('SliderController@listarElementos')->withInput();
        }
    }

    public function editar($id) {
        
        $slider = Slider::find($id);
        return view('/admin/slider/alterar')->with('s', $slider);
    }

    public function alterar($id, Request $req) {

        $this->validar($req);
        $slider = Slider::findOrFail($id);
        $params = $req->all();

        if($req->exists('imagem')) {
            if($slider->imagem) {
               $slider->imagem = substr($slider->imagem, 1);
                unlink($slider->imagem); 
            }
            $params['imagem'] = $this->subirImagem('slider');
        }

        $slider->fill($params)->save();

       return redirect()->action('SliderController@listarElementos');
    }

    public function excluir($id) {
        
        $slider = Slider::find($id);

        if($slider->exists('imagem')) {            
            $slider->imagem = substr($slider->imagem, 1);
            unlink($slider->imagem);
        }        

        $slider->delete();

        return redirect()->action('SliderController@listarElementos');
    }
}
