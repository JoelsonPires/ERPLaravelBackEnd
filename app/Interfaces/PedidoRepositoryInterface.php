<?php

namespace App\Interfaces;

interface PedidoRepositoryInterface
{
    public function getAll();    
    public function getByTotal(int  $code, int $qtd);
}
