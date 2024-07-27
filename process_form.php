<?php
require_once 'message.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

try {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
        $nome = $_POST['name'];
        $email = $_POST['email'];
        $mensagemTexto = $_POST['message'];

        $mensagem = new Mensagem($mensagemTexto, $email, 'gabrieleduardomonsani@hotmail.com');

        // Simulando um possível erro para demonstração
        if ($mensagem->getRemetente() === 'gabrieleduardomonsani@hotmail.com') {
            header('Location: sucess.php');
            exit;
        } else {
            throw new Exception('Remetente não autorizado.');
        }
    } else {
        throw new Exception('Todos os campos são obrigatórios.');
    }
} catch (Exception $e) {
    $errorMsg = $e->getMessage();
    header("Location: index.php?error&msg=" . urlencode($errorMsg));
    exit;
}

