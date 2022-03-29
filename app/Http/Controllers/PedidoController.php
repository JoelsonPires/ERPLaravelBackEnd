<?php

namespace App\Http\Controllers;

use App\Models\PedidoModel;
use App\Services\PedidoService;

class PedidoController extends Controller
{
    private $PedidoService;

    private $QtProdto;

    public function __construct()
    {
        $this->PedidoService = new PedidoService();
        $this->model         = new PedidoModel();
    }

    public function getAll()
    {
        return $this->PedidoService->getAll();
    }

    public function getOrder($id, $qtd)
    {
        $this->_baseJson($id, $qtd);
       return $this->model->serverOrder();
    }

    public function getV1Order($id, $qtd)
    {
        $this->_baseJson($id, $qtd);
        return $this->model->v1Order();
    }

    public function getAPIwebOrder($id, $qtd)
    {
        $this->_baseJson($id, $qtd);
        return $this->model->webApiOrder();
    }
    /**
     * Mover para Model, esta errado no Controller
     * 
     */
    private function _baseJson($id, $qtd){
        $this->QtProdto = $qtd;
        $valorTotal = $this->PedidoService->getByTotal($id, $this->QtProdto );
        $this->model->isAppyDescont($this->QtProdto,$valorTotal);
        $this->model->calculaValores($this->QtProdto,$valorTotal);
    }
}
