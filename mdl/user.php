
<?php
    include "../koneksi.php";

    $user = mysqli_query($konek, "SELECT * FROM login");
    $no = 1;
?>

<div>
    <center>
        <form action="" method="POST">
            <fieldset style="width: 500px;"><legend><h3>Tambah User</h3></legend>
                <table class="tabel_biasa" >
                    <tr>
                        <td >Nama</td>
                        <td><input type="text" name="nama" class="textbox" require autofocus></td>
                    <!-- </tr>
                    <tr> -->
                        <td>Username</td>
                        <td><input type="text" name="username" class="textbox" required></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" class="textbox" required></td>
                    <!-- </tr>
                    <tr> -->
                        <td>Level</td>
                        <td>
                            <select name="level" id="level" class="textbox">
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td><input type="checkbox" name="user_aktif" checked="checked" value="1"> User Aktif</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: center;">
                        <?php if($_SESSION['lvl_user'] == 'Admin'){ ?>
                            <input type="submit" name="simpan" value="Simpan" class="tombol hijau">
                        <?php }else{ ?>
                            <input type="submit" name="" value="Simpan" class="tombol abu" disabled>
                        <?php } ?>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <?php
            if(isset($_POST['simpan'])){
                $nama = $_POST['nama'];
                $username = strtolower($_POST['username']);
                $password = md5($_POST['password']);
                $level = $_POST['level'];
                $user_aktif = $_POST['user_aktif'];

                $insert_user = mysqli_query($konek, "INSERT INTO login (nama, username, password, level, user_aktif) VALUES
                ('$nama', '$username', '$password', '$level', '$user_aktif')");

                
                if(isset($insert_user)){
                    echo "<meta http-equiv='refresh' content='0; url= index.php?pg=user'/>";
                }
            }
        ?>
        <br>
        <table class="tabel">
            <tr>
                <th style="width: 10px;">No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Level</th>
                <th>User Aktif</th>
                <th>Opsi</th>
            </tr>
            <?php while($data_user = mysqli_fetch_assoc($user)){ ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $data_user['nama']; ?></td>
                <td><?= $data_user['username']; ?></td>
                <td><?= $data_user['level']; ?></td>
                <?php if($data_user['user_aktif'] == '1'){ ?>
                    <td><input type="checkbox" checked="checked" disabled></td>
                <?php }else{ ?>
                    <td><input type="checkbox" disabled></td>
                <?php } ?>
                <td>
                    <?php if($_SESSION['lvl_user'] == 'Admin'){ ?>
                        <a href="index.php?pg=rubah_user&id=<?= base64_encode($data_user['id_user']); ?>"><img src="../img/edit.png" title="Rubah"></a> 
                        <a href="del_user.php?id=<?= base64_encode($data_user['id_user']); ?>" onclick="javascript: return confirm('Yakin user <?= $data_user['nama']; ?> dihapus?')"><img src="../img/delete.png" title="Hapus"></a>
                    <?php }else{ ?>
                        -
                    <?php } ?>
                </td>
            </tr>
            <?php $no++; } ?>
        </table>
    </center>
</div>
