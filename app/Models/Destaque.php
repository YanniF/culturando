<?php

namespace culturando\Models;

use Illuminate\Database\Eloquent\Model;

class Destaque extends Model
{
    protected $table = 'destaques';
    protected $guarded = ['id'];
    protected $fillable = array('destaque', 'descricao', 'imagem', 'link');
}
