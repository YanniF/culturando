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

    public function listarElementos() {
    	
    	$slider = Slider::all();
    	return view('/admin/slider/painel')->with('slider', $slider);
    }

    public function novo() {
        return view('/admin/slider/cadastrar');
    }

    public function cadastrar(Request $req) {

        $params = $req->all();
        $slider = new Slider($params);
        
        if($req->imagem != null) {
            $ext = strtolower(substr($_FILES['imagem']['name'], -4));
            $novoNome = 'slider-' . date("Y.m.d-H.i.s") . $ext;
            $dir = 'img/upload/';            
            move_uploaded_file($_FILES['imagem']['tmp_name'], $dir . $novoNome);
            $slider->imagem = '/' . $dir . $novoNome;
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

        $slider = Slider::findOrFail($id);
        $params = $req->all();

        if($req->exists('imagem')) {
            if($slider->imagem) {
               $slider->imagem = substr($slider->imagem, 1);
                unlink($slider->imagem); 
            }

            $ext = strtolower(substr($_FILES['imagem']['name'], -4)); 
            $novoNome = 'slider-' . date("Y.m.d-H.i.s") . $ext;
            $dir = 'img/upload/';            
            move_uploaded_file($_FILES['imagem']['tmp_name'], $dir . $novoNome);         
            $params['imagem'] = '/' . $dir . $novoNome;
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
