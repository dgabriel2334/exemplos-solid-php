<?php
class Database {
    public function insert($table, $data) {
        echo "Inserindo dados na tabela $table: ";
        print_r($data);
    }
}

class User {
    private $db;
    private $emailSender;

    public function __construct(Database $db, EmailSender $emailSender) {
        $this->db = $db;
        $this->emailSender = $emailSender;
    }

    public function createUser($userData) {
        if (!isset($userData['username']) || !isset($userData['email'])) {
            echo "Erro: Informações de usuário incompletas\n";
            return;
        }

        $this->db->insert('users', $userData);

        echo "Usuário criado com sucesso!\n";

        // Enviar e-mail de boas-vindas
        $userEmail = $userData['email'];
        $this->emailSender->sendWelcomeEmail($userEmail);
    }
}

class EmailSender {
    private $smtpServer;
    private $smtpPort;
    private $smtpUsername;
    private $smtpPassword;

    public function __construct($smtpServer, $smtpPort, $smtpUsername, $smtpPassword) {
        $this->smtpServer = $smtpServer;
        $this->smtpPort = $smtpPort;
        $this->smtpUsername = $smtpUsername;
        $this->smtpPassword = $smtpPassword;
    }

    public function sendWelcomeEmail($userEmail) {
        $subject = 'Bem-vindo ao nosso serviço';
        $message = 'Olá! Bem-vindo ao nosso serviço.';

        echo "Enviando e-mail de boas-vindas para $userEmail:\n";
        echo "Assunto: $subject\n";
        echo "Mensagem: $message\n";
    }
}

// Uso das classes
$smtpServer = 'smtp.example.com';
$smtpPort = 587;
$smtpUsername = 'seu_email@example.com';
$smtpPassword = 'sua_senha';

$database = new Database();
$emailSender = new EmailSender($smtpServer, $smtpPort, $smtpUsername, $smtpPassword);

$user = new User($database, $emailSender);

$userData = [
    'username' => 'joao123',
    'email' => 'joao@example.com',
    'password' => 'senha123'
];

$user->createUser($userData);
