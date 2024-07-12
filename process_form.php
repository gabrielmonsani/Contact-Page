<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    $email = $_POST['email'];
    
    if ($email === 'gabrieleduardomonsani@hotmail.com') {
        header('Location: http://localhost/bootcamp/contactpage/sucess.php');
        exit;
    } else {
        header('Location: index.php?error');
        exit;
    }
} else {
    header('Location: index.php?error');
    exit;
}

