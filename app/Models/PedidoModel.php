<?php

namespace App\Models;
use Exception;

use Illuminate\Database\Eloquent\Model;


class PedidoModel extends Model
{
    private $isDesconto;

    private $valorMaxDesconto = 15;
    private $valorMinDesconto = 500;

    private $valorDesconto = 0;
    private $valorSemDesconto;
    private $valorComDesconto;

    protected $table  = "pedido";

    /**Verifica se poder aplicar desconto
     * @Input int
     * @Output 1 = para TRUE e 0 = False
     */
    public function isAppyDescont(int $totalItens, float $valor)
    {
        $this->isDesconto =  0;
        try {
            if (($totalItens >= intval(5)) && ($totalItens <= intval(9)) && ($valor > floatval($this->valorMinDesconto))) {
                $this->isDesconto =  1;
            }
        } catch (Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }

    /**
     * Verifica se poder aplicar desconto e aplica dos pedidos
     * @itens >= 5 e menor <=9
     * @valor >=500
     */
    public function calculaValores(int $qtd, float $valorTotal)
    {
        $this->valorSemDesconto = $valorTotal;       
        try {
            if ($this->isDesconto == intval((1))) {
                $this->valorDesconto = ($this->valorMaxDesconto * $qtd) / 100;
                $this->valorComDesconto = $this->valorSemDesconto - $this->valorDesconto;
            }
        } catch (Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }

    public function serverOrder()
    {
        $orderID = random_int(1, 1000);
        $date = date("Y-m-d");
        return  $response = ([
            "OrderId"       => $orderID,
            "OrderDate"     =>  date('Y-m-', strtotime($date)) . $orderID,
            "OrderCode"     => $date,
            "TotalAmountWihtoutDiscount" => $this->valorSemDesconto,
            "TotalAmountWithDiscount" =>  $this->valorComDesconto

        ]);
    }

    public function v1Order()
    {
        $orderID = random_int(1, 1000);
        $date = date("Y-m-d");
        return  $response = ([
            "id"       => $orderID,
            "code"     =>  date('Y-m-', strtotime($date)) . $orderID,
            "date"     => $date,
            "total" => $this->valorSemDesconto,
            "discount" =>  $this->valorDesconto

        ]);
    }

    public function webApiOrder()
    {
        $orderID = random_int(1, 1000);
        $date = date("Y-m-d");
        return  $response = ([
            "id"       => $orderID,
            "code"     =>  date('Y-m-', strtotime($date)) . $orderID,
            "date"     => $date,
            "totalAmount" => $this->valorSemDesconto,
            "totalAmountWithDiscount" =>  $this->valorComDesconto

        ]);
    }
}
