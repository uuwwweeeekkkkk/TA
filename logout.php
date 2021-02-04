
<?php
    session_start();
    session_destroy();
    unset($_SESSION['id_user']);
    unset($_SESSION['nm_user']);
    unset($_SESSION['usr_user']);
    unset($_SESSION['lvl_user']);
    header("Location: login.php");
    exit;
?>
