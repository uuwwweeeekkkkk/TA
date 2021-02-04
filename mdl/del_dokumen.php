<?php
    include "../koneksi.php";

    if(isset($_GET['id'])){
        $id_dokumen = base64_decode($_GET['id']);

        $queryDel = mysqli_query($konek, "SELECT * FROM dokumen
                                            INNER JOIN ms_folder
                                                ON kd_folder = id_folder
                                            WHERE id_dokumen = '$id_dokumen'");
        $dataDel = mysqli_fetch_assoc($queryDel);

        $delDokumen = mysqli_query($konek, "DELETE FROM dokumen WHERE id_dokumen = '$id_dokumen'");
        unlink("../files/".$dataDel['folder']."/".$dataDel['sub_folder']."/".$dataDel['sub_subfolder']."/".$dataDel['file']);

        if(isset($delDokumen)){
            header("Location: index.php?pg=dokumen&folder=".base64_encode($dataDel['id_folder'])."");
        }else {
            echo "Error cuii" . mysqli_connect_error();
        }
    }
?>
