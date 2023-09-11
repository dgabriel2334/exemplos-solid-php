<?php

class Comanda {
    public function calcularTotal($itens) {
        return 0;
    }
}

class MesaComanda extends Comanda {
    public $total = 0;

    public function calcularTotal($itens) {
        foreach ($itens as $item) {
            $this->total += $item['price'];
        }
        $this->total = $this->total + ($this->total/100 * 10);
        return $this;
    }
}

class BalcaoComanda extends Comanda {
    public $total = 0;

    public function calcularTotal($itens) {
        foreach ($itens as $item) {
            $this->total += $item['price'];
        }

        return $this;
    }
}

class DeliveryComanda extends Comanda {
    
}

$itens = [
    [
        'name' => 'pizza',
        'price' => 14.99
    ],
    [
        'name' => 'hamburguer',
        'price' => 19.99
    ],
    [
        'name' => 'cola',
        'price' => 4.99
    ]
];

$balcao = new BalcaoComanda;
$mesa = new MesaComanda;

echo $balcao->calcularTotal($itens)->total;
