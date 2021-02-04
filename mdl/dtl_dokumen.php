
<?php
    include "../koneksi.php";

    if(isset($_GET['id'])){
        $id_dokumen = base64_decode($_GET['id']);

        $queryDtl = mysqli_query($konek, "SELECT folder.*, id_dokumen, nm_dokumen, upload.nama as yg_upload, waktu_diupload, rubah.nama as yg_rubah, waktu_dirubah, file
                                            FROM dokumen
                                            INNER JOIN ms_folder folder
                                                ON id_folder = kd_folder
                                            LEFT JOIN login upload
                                                ON upload.id_user = diupload_oleh
                                            LEFT JOIN login rubah
                                                ON rubah.id_user = dirubah_oleh
                                            WHERE id_dokumen = '$id_dokumen'");
        $dataDtl = mysqli_fetch_assoc($queryDtl);
    }
?>

<div>
    <center>
        <table class="tabel_biasa" border="1" style="text-align:center; width: 60%;">
            <tr>
                <th colspan="2">Detail Dokumen <?= $dataDtl['sub_menu']; ?> on <?= $dataDtl['menu']; ?></th>
            </tr>
            <tr>
                <th style="text-align:left; width: 40%;">Kode Dokumen</th>
                <td><?= $dataDtl['id_dokumen']; ?></td>
            </tr>
            <tr>
                <th style="text-align:left; width: 40%;">Nama Dokumen</th>
                <td><?= $dataDtl['nm_dokumen']; ?></td>
            </tr>
            <tr>
                <th style="text-align:left; width: 40%;">Diupload Oleh</th>
                <td><?= $dataDtl['yg_upload']; ?></td>
            </tr>
            <tr>
                <th style="text-align:left; width: 40%;">Waktu Diupload</th>
                <td><?= $dataDtl['waktu_diupload']; ?></td>
            </tr>
            <tr>
                <th style="text-align:left; width: 40%;">Dirubah Oleh</th>
                <td><?= $dataDtl['yg_rubah']; ?></td>
            </tr>
            <tr>
                <th style="text-align:left; width: 40%;">Waktu Dirubah</th>
                <td><?= $dataDtl['waktu_dirubah']; ?></td>
            </tr>
            <tr>
                <th colspan="2" style="height: 400px;">
                    <object data="../files/<?= $dataDtl['folder']; ?>/<?= $dataDtl['sub_folder']; ?>/<?= $dataDtl['sub_subfolder']; ?>/<?= $dataDtl['file']; ?>" style="width: 600px; height: 700px;"></object>
                </th>
            </tr>
        </table>
    </center>
</div>
