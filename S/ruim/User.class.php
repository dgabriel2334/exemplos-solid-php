<?php

class Database
{
    public function insert($table, $data)
    {
        echo "Inserindo dados na tabela $table: ";
        print_r($data);
    }
}
class User
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function createUser($userData)
    {
        if (!isset($userData['username']) || !isset($userData['email'])) {
            echo "Erro: Informações de usuário incompletas\n";
            return;
        }

        $this->db->insert('users', $userData);

        echo "Usuário criado com sucesso!\n";
    }

    public function sendWelcomeEmail($userEmail)
    {
        $subject = 'Bem-vindo ao nosso serviço';
        $message = 'Olá! Bem-vindo ao nosso serviço.';

        echo "Enviando e-mail de boas-vindas para $userEmail:\n";
        echo "Assunto: $subject\n";
        echo "Mensagem: $message\n";
    }
}

$database = new Database();
$user = new User($database);

$userData = [
    'username' => 'joao123',
    'email' => 'joao@example.com',
    'password' => 'senha123'
];

//exeplo de chamada
$user->createUser($userData);
$user->sendWelcomeEmail($userData['email']);
