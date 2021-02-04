<?php
    session_start();
    if(empty($_SESSION['usr_user']) || !isset($_SESSION['usr_user']) || $_SESSION['usr_user'] == ''){
        header('Location: login.php');
    }else{
        header('Location: mdl/index.php');
    }
