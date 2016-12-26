<?php

namespace culturando\Models;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = 'galeria';
    protected $guarded = ['id'];
    protected $fillable = array('titulo', 'imagem');
}
