<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'name', 'phone', 'email', 'cpf', 'birth_date', 'street', 'number', 'complement', 'postal_code', 'city', 'state', 'country', 'area_code',
    ];
    
    
    /*protected $fillable = [
        'nome', 'cpf','telefone', 'email', 'endereco',
    ];*/
    
}
