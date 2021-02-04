
<?php
    session_start();
    include "../koneksi.php";

    if(isset($_POST['simpan'])){
        // ambil kode urut paling akhir buat ID dokumen
        $queryID = mysqli_query($konek, "SELECT max(id_dokumen) as id_dokumen FROM dokumen");
        $dataID = mysqli_fetch_assoc($queryID);
        $idUrut = $dataID['id_dokumen'];
        $noUrut = (int) substr($idUrut, 3, 3);
        $noUrut++;
        $newID = 'DOC' . sprintf("%03s", $noUrut);

        // ambil folder2 buat move filenya
        $folder = $_POST['folder'];
        $queryFolder = mysqli_query($konek, "SELECT * FROM ms_folder WHERE id_folder = '$folder'");
        $dataFolder = mysqli_fetch_assoc($queryFolder);

        $nm_dokumen = $_POST['nm_dokumen'];
        $kd_folder = $dataFolder['id_folder'];
        $user = $_SESSION['id_user'];
        $dokumen = $_FILES['dokumen']['name'];
        $path = $_FILES['dokumen']['tmp_name'];
        move_uploaded_file($path, "../files/".$dataFolder['folder']."/".$dataFolder['sub_folder']."/".$dataFolder['sub_subfolder']."/$dokumen");

        $insertDokumen = mysqli_query($konek, "INSERT INTO dokumen (id_dokumen, nm_dokumen, kd_folder, diupload_oleh, waktu_diupload, dirubah_oleh, waktu_dirubah, file) VALUES
                                                ('$newID', '$nm_dokumen', '$kd_folder', '$user', now(), '$user', now(), '$dokumen')");

        if(isset($insertDokumen)){
            header("Location: index.php?pg=dokumen&folder=".base64_encode($folder)."");
        }else{
            echo "Error cuii" . mysqli_connect_error();
        }
    }
?>
        