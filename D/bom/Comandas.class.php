<?php
interface ImprimivelInterface
{
    public function imprimir($comanda);
}

class ImprimirComanda implements ImprimivelInterface
{
    public function imprimir($comanda)
    {
        echo "Comanda impressa: ";
        print_r($comanda);
    }
}

class Comanda
{
    private $itens = [];
    private $impressora;

    public function __construct(ImprimivelInterface $impressora)
    {
        $this->impressora = $impressora;
    }

    public function adicionarItem($item)
    {
        $this->itens[] = $item;
    }

    public function fecharComanda()
    {
        // fechar a comanda

        $this->impressora->imprimir($this->itens);
    }
}

// Uso do exemplo "bom"
$impressora = new ImprimirComanda();
$comanda = new Comanda($impressora);
$comanda->adicionarItem('Hamburguer');
$comanda->adicionarItem('Batata frita');
$comanda->fecharComanda();
