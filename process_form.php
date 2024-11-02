<?php
require_once 'vendor/autoload.php';
require_once 'custom_exceptions.php';

use GuzzleHttp\Client;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

try {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
        $nome = $_POST['name'];
        $email = $_POST['email'];
        $mensagem = $_POST['message'];

        $client = new Client();
        $apiUrl = 'http://localhost:3000/mensagem';

        // Enviando a requisição para a API
        $response = $client->post($apiUrl, [
            'json' => [
                'nome' => $nome,
                'email' => $email,
                'mensagem' => $mensagem
            ]
        ]);

        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            header('Location: sucess.php');
            exit;
        } else {
            $errorBody = $response->getBody()->getContents();
            throw new Exception('Erro ao enviar mensagem. Código: ' . $statusCode . ' Detalhes: ' . $errorBody);
        }
    } else {
        throw new MissingFieldsException();
    }
} catch (MissingFieldsException $e) {
    $errorMsg = $e->getMessage();
    header("Location: index.php?error&msg=" . urlencode($errorMsg));
    exit;
} catch (Exception $e) {
    // Captura e exibe o erro específico da API para depuração
    $errorMsg = 'Ocorreu um erro ao enviar a mensagem: ' . $e->getMessage();
    echo $errorMsg; // Exibe o erro diretamente para depuração
    exit;
}
