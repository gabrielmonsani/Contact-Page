<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /contact.php');
    exit;
}

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    $email = $_POST['email'];
    
    if ($email === 'gabrieleduardomonsani@hotmail.com') {
        header('Location: /contact.php?success');
        exit;
    } else {
        header('Location: /contact.php?error');
        exit;
    }
} else {
    header('Location: /contact.php?error');
    exit;
}

