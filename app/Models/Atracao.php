<?php

namespace culturando\Models;

use Illuminate\Database\Eloquent\Model;

class Atracao extends Model
{
    protected $table = 'atracoes'; 
    protected $guarded = ['id'];
    protected $fillable = array('nome', 'tipoAtracao', 'endereco', 'cidade', 'telefone', 'email', 'site', 'foto', 'descricao');
}
