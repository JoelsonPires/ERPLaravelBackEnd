<?php

namespace App\Services;

use App\Models\PedidoModel;
use App\Repositories\PedidoRepository;
use Exception;


class PedidoService extends Services
{
    private $PedidoRepository;


    public function __construct()
    {
        $this->PedidoRepository = new PedidoRepository();
        $this->model    = new PedidoModel();
    }
    /**
     * Retorna todos os pedidos cadastrados na base
     * 
     */
    public function getAll()
    {
        try {
            $Pedido = $this->PedidoRepository->getAll();
            return $this->responseJsonData($Pedido);
        } catch (Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }
    /**
     * Retorna Soma dos valores total de produtos com o mesmo ArticleCode
     * @Input int
     * @Output int
     */
    public function getByTotal(int $id, int $QtProdto)
    {
        try {
            return $this->PedidoRepository->getByTotal($id, $QtProdto);
        } catch (Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }
}
