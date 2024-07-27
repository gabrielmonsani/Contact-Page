<?php
require_once 'autoload.php';

use App\Mensagem;
use App\CustomExceptions\UnauthorizedSenderException;
use App\CustomExceptions\MissingFieldsException;

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

    
        if ($mensagem->getRemetente() === 'gabrieleduardomonsani@hotmail.com') {
            header('Location: sucess.php');
            exit;
        } else {
            throw new UnauthorizedSenderException();
        }
    } else {
        throw new MissingFieldsException();
    }
} catch (UnauthorizedSenderException $e) {
    $errorMsg = $e->getMessage();
    header("Location: index.php?error&msg=" . urlencode($errorMsg));
    exit;
} catch (MissingFieldsException $e) {
    $errorMsg = $e->getMessage();
    header("Location: index.php?error&msg=" . urlencode($errorMsg));
    exit;
}

