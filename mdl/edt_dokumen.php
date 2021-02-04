<?php
    include "../koneksi.php";

    if(isset($_GET['id'])){
        $id_dokumen = base64_decode($_GET['id']);
        
        $queryEdit = mysqli_query($konek, "SELECT * -- id_dokumen, id_folder, nm_dokumen, file, sub_menu
                                            FROM dokumen 
                                            INNER JOIN ms_folder
                                                ON id_folder = kd_folder
                                            WHERE id_dokumen = '$id_dokumen'");
        $dataEdit = mysqli_fetch_assoc($queryEdit);
    }

    if(isset($_POST['simpan'])){
        $cek_dokumen = $_FILES['dokumen']['name'];
        if($cek_dokumen == ''){
            $dokumen = $_POST['dokumen_lama'];
        }else{
            $del_dokumen = $_POST['dokumen_lama'];
            unlink("../files/".$dataEdit['folder']."/".$dataEdit['sub_folder']."/".$dataEdit['sub_subfolder']."/$del_dokumen");
            $dokumen = $_FILES['dokumen']['name'];
            $path = $_FILES['dokumen']['tmp_name'];
            move_uploaded_file($path, "../files/".$dataEdit['folder']."/".$dataEdit['sub_folder']."/".$dataEdit['sub_subfolder']."/$dokumen");
        }

        $id_dokumen = $_POST['id_dokumen'];
        $nm_dokumen = $_POST['nm_dokumen'];
        $user = $_SESSION['id_user'];

        $rubahData = mysqli_query($konek,"UPDATE dokumen SET nm_dokumen = '$nm_dokumen', dirubah_oleh = '$user', waktu_dirubah = now(), file = '$dokumen'
										    WHERE id_dokumen = '$id_dokumen'");
		if ($rubahData){
			header("Location: index.php?pg=dokumen&folder=".base64_encode($dataEdit['id_folder'])."");
		} else {
			echo "Error cuii " . mysqli_connect_error();
		}
    }
?>

<div>
    <center>
        <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="dokumen_lama" value="<?= $dataEdit['file']; ?>">
        <input type="hidden" name="id_dokumen" value="<?= $dataEdit['id_dokumen']; ?>">
            <fieldset style="width: 50%;"><legend>Rubah Dokumen <?= $dataEdit['sub_menu']; ?></legend>
                <table class="tabel_biasa" border="0">
                    <tr>
                        <td><label for="nm_dokumen">Nama Dokumen</label></td>
                        <td><input type="text" name="nm_dokumen" id="nm_dokumen" class="textbox" required autofocus value="<?= $dataEdit['nm_dokumen']; ?>"></td>
                        <td></td>
                        <td><label for="dokumen">File</label></td>
                        <td><input type="file" name="dokumen" id="dokumen" class="textbox"><br>*Kosongkan jika tidak dirubah</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: center;">
                            <input type="submit" name="simpan" class="tombol biru" value="Simpan">
                            <input type="reset" name="batal" class="tombol orange" value="Batal">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </center>
</div>