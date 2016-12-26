<?php

namespace culturando\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    protected $guarded = ['id'];
    protected $fillable = array('titulo', 'mensagem', 'imagem', 'link');
}
