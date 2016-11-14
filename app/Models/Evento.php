<?php

namespace culturando\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $guarded = ['id'];
    protected $fillable = array('titulo', 'imagem', 'descricao', 'link', 'eventoEm');
}
