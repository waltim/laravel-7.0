<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;
    protected $table = 'fornecedores';
    protected $fillable = ['nome','site','uf','email'];
}


// Forma de realizar consultas com o eloquent passando clausulas como: (X or Y) and (Z or W);

// SiteContato::where(
//     function($query){
//         $query->where('nome','Jorge')
//         ->orWhere('nome','Ana');
//     }
// )->where(
//     function($query){
//         $query->whereIn('motivo',[1,2])
//         ->orWhereBetween('id',[4,6]);
//     }
// )->get();


// $contatos = SiteContato::where(function($query){$query->where('nome','Jorge')->orWhere('nome','Ana');})->where(function($query){$query->whereIn('motivo',[1,2])->orWhereBetween('id',[4,6]);})->get();
