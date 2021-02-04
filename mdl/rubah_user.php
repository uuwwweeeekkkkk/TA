
<?php
    include "../koneksi.php";

    if(isset($_GET['id'])){
        $id = base64_decode($_GET['id']);
        $user = mysqli_query($konek, "SELECT * FROM login WHERE id_user = '$id'");
        $dataUser = mysqli_fetch_assoc($user);
    }

    if(isset($_POST['simpan'])){
        $id_user = $_POST['id_user'];
        $nama = $_POST['nama'];
        $username = strtolower($_POST['username']);
        $password = md5($_POST['password']);
        $level = $_POST['level'];
        $user_aktif = $_POST['user_aktif'];

        if(!empty($_POST['password'])){
            $update_user = mysqli_query($konek, "UPDATE login SET nama = '$nama', username = '$username', password = '$password', level = '$level', user_aktif = '$user_aktif'
                                                    WHERE id_user = ' $id_user'");
        }else{
            $update_user = mysqli_query($konek, "UPDATE login SET nama = '$nama', username = '$username', level = '$level', user_aktif = '$user_aktif'
                                                    WHERE id_user = ' $id_user'");
        }

        if(isset($update_user)){
            header('Location: index.php?pg=user');
        }
    }
?>

<div>
    <form action="" method="POST">
        <input type="hidden" name="id_user" value="<?= $dataUser['id_user']; ?>">
        <center>
            <fieldset style="width: 500px;"><legend><h3>Rubah User</h3></legend>
                <table class="tabel_biasa" >
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" name="nama" class="textbox" value="<?= $dataUser['nama']; ?>" require autofocus></td>
                        
                        <td>Username</td>
                        <td><input type="text" name="username" class="textbox" value="<?= $dataUser['username']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" class="textbox" placeholder="*Kosongkan jika tidak dirubah"></td>
                        
                        <td>Level</td>
                        <td>
                            <select name="level" id="level" class="textbox">
                                <option value="Admin" <?php if($dataUser['level'] == 'Admin') {echo "selected=\"selected\"";} ?>>Admin</option>
                                <option value="User" <?php if($dataUser['level'] == 'User') {echo "selected=\"selected\"";} ?>>User</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td><input type="checkbox" name="user_aktif"  <?php if($dataUser['user_aktif'] == '1') {echo "checked=\"checked\"";} ?> value="1"> User Aktif</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: center;">
                            <input type="submit" name="simpan" value="Simpan" class="tombol biru">
                            <input type="reset" name="batal" value="Batal" class="tombol orange">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </center>
    </form>
</div>