<?php

namespace culturando\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';
    public $timestamps = false;    
    protected $guarded = ['id'];
    protected $fillable = array('nome', 'baixadaOuVale');
}
