<?php 
    session_start();
    include "koneksi.php";

    if(isset($_POST['masuk'])){
        $usrnm = $_POST['usrnm'];
        $pswrd = md5($_POST['pswrd']);
        
        $login = mysqli_query($konek, "SELECT * FROM login WHERE username = '$usrnm' AND password = '$pswrd' AND user_aktif = '1'");
        $cek_login = mysqli_num_rows($login);

        if($cek_login > 0){
            $data_login = mysqli_fetch_assoc($login);
            $_SESSION['id_user'] = $data_login['id_user'];
            $_SESSION['nm_user'] = $data_login['nama'];
            $_SESSION['usr_user'] = $data_login['username'];
            $_SESSION['lvl_user'] = $data_login['level'];
            if(isset($_POST['rmbr'])){
				setcookie('usr', base64_encode($_POST['usrnm']), time() + 259200);
				setcookie('pwd', base64_encode($_POST['pswrd']), time() + 259200);
			}else{
				setcookie('usr', base64_encode($_POST['usrnm']), time() - 259200);
				setcookie('pwd', base64_encode($_POST['pswrd']), time() - 259200);
			}
            header('Location: mdl/index.php');
        }else {
            echo "<script>window.alert('Username atau password salah!');
						location='login.php'
					</script>";
        }
    }
?>

<!DOCTYPE html>
<head>
    <title>DMS | Dokumen Manajemen Sistem - Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div class="box">
        <h2 align="center">Dokumen Manajemen Sistem</h2>
        <form method="POST">
            <?php if(isset($_COOKIE['usr']) && isset($_COOKIE['pwd'])){ ?>
                <input type="text" name="usrnm" class="textbox" placeholder="Username" required autofocus value="<?= base64_decode($_COOKIE['usr']); ?>">
                <input type="password" name="pswrd" class="textbox" placeholder="Password" required value="<?= base64_decode($_COOKIE['pwd']); ?>">
                <br>
                <input type="checkbox" name="rmbr" id="rmbr" title="Ingat saya dalam 3 hari" checked="checked">
                <label for="rmbr" title="Ingat saya dalam 3 hari">Ingat saya</label>
            <?php }else{ ?>
                <input type="text" name="usrnm" class="textbox" placeholder="Username" required autofocus>
                <input type="password" name="pswrd" class="textbox" placeholder="Password" required>
                <br>
                <input type="checkbox" name="rmbr" id="rmbr" title="Ingat saya dalam 3 hari">
                <label for="rmbr" title="Ingat saya dalam 3 hari">Ingat saya</label>
            <?php } ?>
            <br><br>
            <input type="submit" name="masuk" class="tombol" value="Masuk">
            <br><br>
            <a href="" onclick="alert('Level Admin (username : admin, password : admin). Level User (username : user, password : user)');">Info login</a>
        </form>
    </div>
</body>
</html>
