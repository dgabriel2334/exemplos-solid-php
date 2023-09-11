<?php
class ImprimirComanda {
    public function imprimir($comanda) {
        echo "Comanda impressa: ";
        print_r($comanda);
    }
}

class Comanda {
    private $itens = [];

    public function adicionarItem($item) {
        $this->itens[] = $item;
    }

    public function fecharComanda() {
        // Lógica para fechar a comanda

        $impressora = new ImprimirComanda(); // Acoplamento forte
        $impressora->imprimir($this->itens);
    }
}

// Uso do exemplo "ruim"
$comanda = new Comanda();
$comanda->adicionarItem('Pizza');
$comanda->adicionarItem('Refrigerante');
$comanda->fecharComanda();
