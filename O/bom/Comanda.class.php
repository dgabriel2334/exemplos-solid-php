<?php

interface ComandaInterface
{
    public function processOrder($order);
}

class MesaComanda implements ComandaInterface
{
    public function processOrder($order)
    {
        echo "Pedido para comanda de mesa processado: ";
        print_r($order);
    }
}

class BalcaoComanda implements ComandaInterface
{
    public function processOrder($order)
    {
        echo "Pedido para comanda de balcão processado: ";
        print_r($order);
    }
}

class DeliveryComanda implements ComandaInterface
{
    public function processOrder($order)
    {
        echo "Pedido para comanda de delivery processado: ";
        print_r($order);
    }
}

// Uso do exemplo "bom"
$mesaComanda = new MesaComanda();
$balcaoComanda = new BalcaoComanda();
$deliveryComanda = new DeliveryComanda();

$order = ['item' => 'Hamburguer', 'quantidade' => 3];

$mesaComanda->processOrder($order);
$balcaoComanda->processOrder($order);
$deliveryComanda->processOrder($order);
