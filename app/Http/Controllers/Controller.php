<?php

namespace culturando\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function subirImagem($nomeParcial) {

        $ext = strtolower(substr($_FILES['imagem']['name'], -4));//Pegando extensão do arquivo
        $novoNome = $nomeParcial . '-' . date("Y.m.d-H.i.s") . $ext;//Definindo um novo nome para o arquivo
        $dir = 'img/upload/';//Faz o upload do arquivo
        
        move_uploaded_file($_FILES['imagem']['tmp_name'], $dir . $novoNome);
        return '/' . $dir . $novoNome;
    }
}
