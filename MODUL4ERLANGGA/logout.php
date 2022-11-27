<?php
    session_start();
    session_destroy();
    session_start();
    $_SESSION['logout'] = 'Berhasil Logout';
    setcookie('email','', time() - 3600);
    setcookie('pass','', time() - 3600);
    header('Location: Erlangga_HOME.php');
    exit();
?>