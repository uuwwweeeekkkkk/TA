<?php
    session_start();
    if(empty($_SESSION['usr_user']) || !isset($_SESSION['usr_user']) || $_SESSION['usr_user'] == ''){
        header('Location: ../login.php');
    }
?>

<!DOCTYPE html>
<head>
    <title>DMS | Dokumen Manajemen Sistem</title>
    <link rel="stylesheet" type="text/css" href="../css/atribut.css">
    <link rel="stylesheet" type="text/css" href="../css/desain.css">
</head>
<body>
    <nav id="menu">
        <ul >
            <div id="heading">
                <a href="index.php">Dokumen Manajemen Sistem</a>
            </div>
            <li><a href="index.php">Home</a></li>
            <li><a href="">Gas Nuri Arizona</a>
                <ul>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('GNA002'); ?>">Master Cable</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('GNA003'); ?>">Certificate</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('GNA004'); ?>">Vetting</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('GNA005'); ?>">Docking</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('GNA006'); ?>">Inventory</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('GNA007'); ?>">FO Analysis</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('GNA008'); ?>">LO Analysis</a></li>
                </ul>
            </li>
            <li><a href="">ENC Rhayden</a>
                <ul>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('RDN002'); ?>">Shipping</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('RDN003'); ?>">Inventory</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('RDN004'); ?>">Docking</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('RDN005'); ?>">Report</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('RDN006'); ?>">Invoice</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('RDN007'); ?>">Fuel Control</a></li>
                </ul>
            </li>
            <li><a href="">ENC Kalijapat</a>
                <ul>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('KJ002'); ?>">Agency</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('KJ003'); ?>">Vessel</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('KJ004'); ?>">Crew Rotation</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('KJ005'); ?>">Cable Voyage</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('KJ006'); ?>">Statutory</a></li>
                </ul>
            </li>
            <li><a href="">Mitra Anugerah</a>
                <ul>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('MA002'); ?>">Equipment</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('MA003'); ?>">Timesheet</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('MA004'); ?>">Marine</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('MA005'); ?>">Matrix</a></li>
                    <li><a href="index.php?pg=dokumen&folder=<?= base64_encode('MA006'); ?>">Assurance</a></li>
                </ul>
            </li>
            <li><a href="">Utility</a>
                <ul>
                    <li><a href="index.php?pg=ubah_password">Ubah Password</a></li>
                    <li><a href="index.php?pg=user">Kelola User</a></li>
                    <li><a href="../logout.php">Keluar</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <section id="konten">
        <?php include "page.php"; ?>
    </section>
    <footer>
        <br>
        <p>Ahmad Juantoro - 171011400142</p>
        <p>07TPLE002</p>
    </footer>
</body>
</html>

