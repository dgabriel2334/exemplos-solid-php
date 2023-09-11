<?php

interface Calculavel {
    public function calcularTotal($itens);
}

interface Imprimivel {
    public function imprimirComanda($itens);
}

interface Fechavel {
    public function fecharComanda($itens);
}

class MesaComanda implements Calculavel, Imprimivel, Fechavel {
    public $total = 0;
    public $textoComanda = "";

    public function calcularTotal($itens) {
        foreach ($itens as $item) {
            $this->total += $item['price'];
        }
        $this->total = $this->total + ($this->total/100 * 10);
        return $this;
    }

    public function imprimirComanda($itens) {
        foreach ($itens as $item) {
            $this->textoComanda .= "Item: " . $item['name'] . " - R$" . $item['price'] . "\n";
        }
        $this->textoComanda .=  "Servico (10%) R$ " . $this->total/100 * 10 . "\n";
        $this->textoComanda .=  "Total R$ " . $this->total;
        return $this;
    }

    public function fecharComanda($itens) {
        // Fechamento da comanda da mesa
        return 1;
    }
}

class BalcaoComanda implements Calculavel, Imprimivel, Fechavel {
    public $total = 0;
    public $textoComanda = "";

    public function calcularTotal($itens) {
        foreach ($itens as $item) {
            $this->total += $item['price'];
        }
        return $this;
    }

    public function imprimirComanda($itens) {
        foreach ($itens as $item) {
            $this->textoComanda .= "Item: " . $item['name'] . " - R$" . $item['price'] . "\n";
        }
        return $this;
    }

    public function fecharComanda($itens) {
        // Fechamento da comanda do balcão
        return 1;
    }
}

class DeliveryComanda implements Calculavel, Fechavel {
    public $total = 0;

    public function calcularTotal($itens) {
        foreach ($itens as $item) {
            $this->total += $item['price'];
        }
        return $this;
    }

    public function fecharComanda($itens) {
        // Fechamento da comanda do balcão
        return 1;
    }
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
$delivery = new DeliveryComanda;

$mesa->calcularTotal($itens)->total;
echo $mesa->imprimirComanda($itens)->textoComanda;
echo $mesa->fecharComanda($itens);