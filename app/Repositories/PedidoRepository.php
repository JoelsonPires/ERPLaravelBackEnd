<?php

namespace App\Repositories;

use App\Interfaces\PedidoRepositoryInterface;
use App\Models\PedidoModel;
use Illuminate\Support\Facades\DB;

class PedidoRepository implements PedidoRepositoryInterface
{
    private $model;
    protected  $table ="pedido";

    public function __construct()
    {
        $this->model = new PedidoModel();
    }

    public function getAll()
    {
        return $this->model->orderBy('id')->get();
    }

    public function getByTotal(int  $code, int $qtd):int
    {
        $soma =   DB::table($this->table)->select(DB::raw('sum(UnitPrice)as total' ))->where('ArticleCode', $code)->first();
        return ($soma->total * $qtd);
    }
 

}
