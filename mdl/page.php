<?php
    $page = isset($_GET['pg']) ? $_GET['pg'] : "";

    if($page == ""){
        include_once "main.php";
    }elseif ($page == "user") {
        include_once "user.php";
    }elseif ($page == "ubah_password") {
        include_once "ubah_password.php";
    }elseif ($page == "rubah_user") {
        include_once "rubah_user.php";
    }elseif ($page == "dokumen") {
        include_once "dokumen.php";
    }elseif ($page == "dtl_dokumen") {
        include_once "dtl_dokumen.php";
    }elseif ($page == "edt_dokumen") {
        include_once "edt_dokumen.php";
    }
