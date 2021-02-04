<?php
    include "../koneksi.php";

    $id = base64_decode($_GET['id']);

    $del_user = mysqli_query($konek, "DELETE FROM login WHERE id_user = '$id'");

    if(isset($del_user)){
        header('Location: index.php?pg=user');
    }
?>
