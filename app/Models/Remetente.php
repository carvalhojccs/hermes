<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remetente extends Model
{
    protected $table = 'remetentes';
    protected $fillable = ['descricao', 'sigla'];
}
