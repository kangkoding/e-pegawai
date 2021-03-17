<?php
include 'lib/config.php';
include 'views/header.php';

if(empty($_SESSION["login-level"]) || (isset($_SESSION["login-level"]) && $_SESSION["login-level"] != "Admin") && (isset($_SESSION["login-level"]) && $_SESSION["login-level"] != "Entri")){
	_redir("index.php");
	exit;
}
if(isset($_POST["submit"])){
	$nip = $_POST["nip"];
	$gelarD = $_POST["gelardepan"];
	$nm = $_POST["nama"];
	$gelarB = $_POST["gelarblkg"];
	$hp = $_POST["hp"];
	$unm = trim($_POST["uname"]);
	$pas = trim($_POST["pass"]);
	$email = trim($_POST["email"]);
	$role = $_POST["koderole"];

	$data = ["NIP"=>$nip,
			 "GelarDepan"=>$gelarD,
			 "Nama"=>$nm,
			 "GelarBelakang"=>$gelarB,
			 "HP"=>$hp,
			 "Username"=>$unm,
			 "Password"=>$pas,
			 "Email"=>$email,
			 "KodeRole"=>$role];
	if(_insert("Pegawai",$data)){
		echo "<script>alert('Pegawai berhasil dibuat');</script>";
	}else{
		echo $db->error;
	}
}
?>
	<form method="post">
		<div class="ui form">
        <div class="four fields"><div class="field"><label>NIP</label><input type="number" name="nip" require></div>

        <div class="field"><label>Gelar Depan</label><input type="text" name="gelardepan" ></div>

        <div class="field"><label>Nama</label><input type="text" name="nama" require></div>

        <div class="field"><label>Gelar Belakang</label><input type="text" name="gelarblkg" ></div>
    </div>
        <div class="four fields">
            <div class="field"><label>No HP</label><input type="number" name="hp" require></div>

            <div class="field"><label>Username</label><input type="text" name="uname" require></div>

            <div class="field"><label>Password</label><input type="password" name="pass" require></div>

            <div class="field"><label>Email</label><input type="text" name="email" ></div>

            <div class="field">
            <label>Role</label>
            <select name="koderole"><?php
                    $konek = db();
					if(isset($_SESSION["login-level"])){
						if($_SESSION["login-level"]=="Admin"){
							$sql = "SELECT * FROM Role";
						$perintah = mysqli_query($konek,$sql);
									
							while($d = mysqli_fetch_array($perintah)) {
							echo "<option value=".$d["KodeRole"].">".$d["NamaRole"]."</option>";
						}
					
					}else{
						$sql = "SELECT * FROM Role WHERE KodeRole = 'User'";
						$perintah = mysqli_query($konek,$sql);
									
							while($d = mysqli_fetch_array($perintah)) {
							echo "<option value=".$d["KodeRole"].">".$d["NamaRole"]."</option>";
						}
					
				}
			}
					?></select>
        </div>
    </div>
    <input type="submit" name="submit" value="Masuk" class="ui right floated green button" require>

    <input type="reset" name="reset" value="Reset" class="ui right floated button" require></div>
	</form>
