<?php

namespace App\Validators;

class PedidoValidator
{
    const CREATE_RULES = [
        'nome' => 'required'
    ];

    const UPDATE_RULES = [
        'nome' => 'required',
        'ativo' => 'required'
    ];
}
