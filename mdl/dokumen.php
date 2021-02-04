
<?php
    include "../koneksi.php";

    if(isset($_GET['folder'])){
        $folder = base64_decode($_GET['folder']);
    }

    if(isset($_POST['cari'])){
        $cari_data = $_POST['cari_data'];

        $queryDokumen = mysqli_query($konek, "SELECT folder.*, id_dokumen, nm_dokumen, upload.nama as yg_upload, waktu_diupload, rubah.nama as yg_rubah, waktu_dirubah, file
                                            FROM dokumen
                                            INNER JOIN ms_folder folder
                                                ON id_folder = kd_folder
                                                AND kd_folder = '$folder'
                                            LEFT JOIN login upload
                                                ON upload.id_user = diupload_oleh
                                            LEFT JOIN login rubah
                                                ON rubah.id_user = dirubah_oleh
                                            WHERE nm_dokumen LIKE '%$cari_data%'
                                            OR upload.nama LIKE '%$cari_data%'
                                            OR waktu_diupload LIKE '%$cari_data%'
                                            OR rubah.nama LIKE '%$cari_data%'
                                            OR waktu_dirubah LIKE '%$cari_data%'
                                            ORDER BY nm_dokumen ASC");
    }else{
        $queryDokumen = mysqli_query($konek, "SELECT folder.*, id_dokumen, nm_dokumen, upload.nama as yg_upload, waktu_diupload, rubah.nama as yg_rubah, waktu_dirubah, file
                                            FROM dokumen
                                            INNER JOIN ms_folder folder
                                                ON id_folder = kd_folder
                                            LEFT JOIN login upload
                                                ON upload.id_user = diupload_oleh
                                            LEFT JOIN login rubah
                                                ON rubah.id_user = dirubah_oleh
                                            WHERE kd_folder = '$folder'
                                            ORDER BY nm_dokumen ASC");
    }
    $hitungDokumen = mysqli_num_rows($queryDokumen);
    $no = 1;

    $queryFolder = mysqli_query($konek, "SELECT * FROM ms_folder WHERE id_folder = '$folder'");
    $dataFolder = mysqli_fetch_assoc($queryFolder);
?>

<div>
    <center>
        <form action="add_dokumen.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="folder" value="<?= $folder; ?>">
            <fieldset style="width: 50%;"><legend>Tambah Dokumen <?= $dataFolder['sub_menu']; ?></legend>
                <table class="tabel_biasa" border="0">
                    <tr>
                        <td><label for="nm_dokumen">Nama Dokumen</label></td>
                        <td><input type="text" name="nm_dokumen" id="nm_dokumen" class="textbox" required autofocus></td>
                        <td></td>
                        <td><label for="dokumen">File</label></td>
                        <td><input type="file" name="dokumen" id="dokumen" class="textbox" required></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: center;"><input type="submit" name="simpan" class="tombol hijau" value="Simpan"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <br><br>
        <table class="tabel">
            <tr>
                <th colspan="7">Dokumen <?= $dataFolder['sub_menu']; ?> on <?= $dataFolder['menu']; ?></th>
            </tr>
            <tr>
        <form action="" method="POST">
                <th colspan="7" style="text-align: left;">
                    <input type="text" name="cari_data" class="textbox" placeholder="Cari data..">
                    <input type="submit" name="cari" class="tombol biru" value="Cari">
                </th>
        </form>
            </tr>
            <tr>
                <th style="width: 10px;">No</th>
                <th>Nama Dokumen</th>
                <th>Diupload Oleh</th>
                <th>Waktu Diupload</th>
                <th>Dirubah Oleh</th>
                <th>Waktu Dirubah</th>
                <th>Opsi</th>
            </tr>
            <?php if($hitungDokumen == 0){ ?>
            <tr>
                <td colspan="7">Euweuh dokumen</td>
            </tr>
            <?php 
                }else{

                while($dataDokumen = mysqli_fetch_assoc($queryDokumen)){
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $dataDokumen['nm_dokumen']; ?></td>
                <td><?= $dataDokumen['yg_upload']; ?></td>
                <td><?= $dataDokumen['waktu_diupload']; ?></td>
                <td><?= $dataDokumen['yg_rubah']; ?></td>
                <td><?= $dataDokumen['waktu_dirubah']; ?></td>
                <td>
                    <a href="index.php?pg=dtl_dokumen&id=<?= base64_encode($dataDokumen['id_dokumen']); ?>"><img src="../img/detail.png" title="Detail"></a> 
                    <a href="index.php?pg=edt_dokumen&id=<?= base64_encode($dataDokumen['id_dokumen']); ?>"><img src="../img/edit.png" title="Rubah"></a> 
                    <a href="del_dokumen.php?id=<?= base64_encode($dataDokumen['id_dokumen']); ?>" onclick="javascript: return confirm('Yakin dokumen <?= $dataDokumen['nm_dokumen']; ?> dihapus?')"><img src="../img/delete.png" title="Hapus"></a> 
                    <a href="../files/<?= $dataDokumen['folder']; ?>/<?= $dataDokumen['sub_folder']; ?>/<?= $dataDokumen['sub_subfolder']; ?>/<?= $dataDokumen['file']; ?>" download><img src="../img/download.png" title="Download : <?= $dataDokumen['file']; ?>"></a>
                </td>
            </tr>
            <?php $no++; } }?>
        </table>
    </center>
</div>