<?php
interface ComandaInterface {
    public function calcularTotal($itens);
    public function imprimirComanda($itens);
    public function fecharComanda($itens);
}

class MesaComanda implements ComandaInterface {
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
        return $this;
        // Fechamento da comanda da mesa
    }
}

class BalcaoComanda implements ComandaInterface {
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
        return $this;
        // Fechamento da comanda do balcão
    }
}

class DeliveryComanda implements ComandaInterface {
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
        return $this;
        // Fechamento da comanda do delivery
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

echo $balcao->calcularTotal($itens)->total;
