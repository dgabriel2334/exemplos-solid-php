<?php

class Comanda
{
    public function processOrder($order, $comandaType)
    {
        if ($comandaType == 'mesa') {
            echo "Pedido para comanda de mesa processado: ";
            print_r($order);
        } elseif ($comandaType == 'balcao') {
            echo "Pedido para comanda de balcão processado: ";
            print_r($order);
        } elseif ($comandaType == 'delivery') {
            echo "Pedido para comanda de delivery processado: ";
            print_r($order);
        }
    }
}

$comanda = new Comanda();
$order = ['item' => 'Pizza', 'quantidade' => 2];
$comanda->processOrder($order, 'mesa');
