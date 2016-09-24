<?php

namespace culturando\Models;

use Illuminate\Database\Eloquent\Model;

class TipoAtracao extends Model
{
 	protected $table = 'tipo_atracoes';
    public $timestamps = false;    
    protected $guarded = ['id'];
    protected $fillable = array('tipo');
}
