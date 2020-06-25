<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensalidade extends Model
{
    protected $fillable = [
        'valor', 'vencimento', 'status', 'clientes',
    ];
}
