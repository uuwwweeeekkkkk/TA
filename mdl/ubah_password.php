
<?php
    include "../koneksi.php";
    if(isset($_POST['simpan'])){
        $id_user = $_SESSION['id_user'];
        $pass_baru = md5($_POST['pass_baru']);

        $update_pass = mysqli_query($konek, "UPDATE login SET password = '$pass_baru' WHERE id_user = '$id_user'");
        
        if(isset($update_pass)){
            echo "<script>window.alert('Password " . $_SESSION['usr_user'] . " berhasil dirubah');
						location='index.php?pg=ubah_password'
					</script>";
        }
    }
?>

<div>
    <form action="" method="POST">
        <center>
            <fieldset style="width: 500px;">
                <br>
                <h3>Rubah Password <?= $_SESSION['nm_user']; ?></h3>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?= $_SESSION['usr_user']; ?>" class="textbox" required disabled>
                <br>
                <label for="pass_baru">Password </label>
                <input type="password" name="pass_baru" id="pass_baru" class="textbox" placeholder="Password Baru" required autofocus>
                <br>
                <input type="submit" name="simpan" value="Simpan" class="tombol hijau">
                <br><br>
            </fieldset>
        </center>
    </form>
</div>