<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Contato</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Let's Talk!</h1>
        <div class="email-info">
            <i class="fas fa-envelope email-icon" aria-label="Ícone de e-mail"></i>
            <span class="email-address">gabrieleduardomonsani@hotmail.com</span>
        </div>

        <?php
        if (isset($_GET['error'])) {
            echo '<p class="status-message error">Erro ao enviar o formulário. Tente novamente.</p>';
        }
        ?>

        <form action="process_form.php" method="post">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Mensagem:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>

</html>
