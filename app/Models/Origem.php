<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Origem extends Model
{
    protected $table = 'origens';
    protected $fillable = ['descricao'];
}
