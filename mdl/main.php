
<?php 
    include "../koneksi.php";

    $queryMain = mysqli_query($konek, "SELECT menu, COUNT(id_dokumen) AS jml_dokumen
                                        FROM dokumen
                                        INNER JOIN ms_folder
                                            ON kd_folder = id_folder
                                        GROUP BY menu
                                        ORDER BY menu ASC");
    $no = 1;
    $total = 0;
?>

<div class="">
    <center>
        <form action="">
            <h1>Hi <?= $_SESSION['nm_user']; ?>, anda masuk sebagai  <?= $_SESSION['lvl_user']; ?></h1>
            <p>Silahkan pilih menu yang sudah disediakan diatas</p>
            <br>
            <img src="../img/bck.jpg" width="10%">
            <br><br>
            <h3>Selamat datang dihalaman Dashboard</h3>
            <h4>DMS | Dokumen Manajemen Sistem<br>Crew Kapal ENC</h4>
            <p>Program ini dibuat agar dapat memenuhi tugas akhir</p>
            <p>Mata kuliah Pemrograman Web 2</p>
            <br>
            <table class="tabel_biasa" border="1" align="center">
                <tr>
                    <th colspan="3">Jumlah Dokumen</th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Menu / Kapal</th>
                    <th>Jumlah</th>
                </tr>
                <?php while($dataMain = mysqli_fetch_assoc($queryMain)){ ?>
                <tr>
                    <td style="text-align: center;"><?= $no; ?></td>
                    <td style="text-align: center;"><?= $dataMain['menu']; ?></td>
                    <td style="text-align: center;"><?= $dataMain['jml_dokumen']; ?></td>
                </tr>
                <?php
                        $no++;
                        $total += $dataMain['jml_dokumen'];
                    }
                ?>
                <tr>
                    <th colspan="2">Total</th>
                    <th><?= $total; ?></th>
                </tr>
            </table>
        </form>
    </center>
</div>
