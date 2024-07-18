<?php
use App\Mensagem;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $mensagemTexto = $_POST['message'];

    $mensagem = new Mensagem($mensagemTexto, $email, 'gabrieleduardomonsani@hotmail.com');

    if ($mensagem->getRemetente() === 'gabrieleduardomonsani@hotmail.com') {
        header('Location: sucess.php');
        exit;
    } else {
        header('Location: index.php?error');
        exit;
    }
} else {
    header('Location: index.php?error');
    exit;
}

