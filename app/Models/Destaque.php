<?php

namespace culturando\Models;

use Illuminate\Database\Eloquent\Model;

class Destaque extends Model
{
    protected $table = 'destaques';
    public $timestamps = false;    
    protected $guarded = ['id'];
    protected $fillable = array('destaque', 'descricao', 'foto', 'link');
}
