<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    protected $table = 'site_contatos';
    protected $fillable = ['nome','email','motivo_contato_id','telefone','mensagem'];
}
