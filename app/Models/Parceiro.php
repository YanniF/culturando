<?php

namespace culturando\Models;

use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
    protected $table = 'parceiros';
    protected $guarded = ['id'];
    protected $fillable = array('nome', 'imagem', 'link');
}
