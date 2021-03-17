<?php
include 'lib/config.php';
include 'views/header.php';
$koneksi = db();
?>
<center>
<form method="post">
    <center><h2>Masuk</h2></center>
    <br>
    <div class="ui form">
        <div class="ui left icon input">
            <input type="text" name="uname"  placeholder="Username">
            <i class="users icon"></i>
        </div>
        <br>
        <br>
        <div class="ui form">
            <div class="ui left icon input">
                <input type="password" name="pass" placeholder="Password">
                <i class="lock icon"></i>
            </div>
        </div>
        <br>
        <div class="ui buttons">
        <button class="ui positive button" type="submit" name="submit">Save</button>
        <div class="or"></div>
        <button class="ui red button" type="reset" name="reset">Reset</button>
    </div>
    </div>

</form>
</center>
<?php
    if(isset($_POST["submit"])){

        $a = $_POST["uname"];
        $b = $_POST["pass"];

        $perintah = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE Username = '$a' AND Password = '$b'");
        if($perintah){
        if(mysqli_num_rows($perintah) > 0){
            while($data = mysqli_fetch_array($perintah)){
                $_SESSION["login-level"] = $data[8];
                $_SESSION["id"] = $data[0];
                echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            }
        }else{
            echo "<script>alert('Gagal Login')</script>";
            //echo "SELECT * FROM petugas WHERE username = '$a' AND password = '$b'";
        }
        }else{
            //echo mysql_error();
        }

    }
?>
