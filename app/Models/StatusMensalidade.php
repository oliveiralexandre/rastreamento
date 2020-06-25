<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class StatusMensalidade extends Model
{
    protected $fillable = [
        'status_id','cliente_id',
    ];
}
