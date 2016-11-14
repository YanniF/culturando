<?php

namespace culturando\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';  
    protected $guarded = ['id'];
    protected $fillable = array('nome', 'baixadaOuVale');
}
