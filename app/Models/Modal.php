<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
    protected $table = 'modais';
    protected $fillable = ['descricao'];
}
