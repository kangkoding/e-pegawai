<?php
include 'lib/config.php';
include 'views/header.php';

if(empty($_SESSION["login-level"]) || (isset($_SESSION["login-level"]) && $_SESSION["login-level"] != "Admin") && (isset($_SESSION["login-level"]) && $_SESSION["login-level"] != "Entri")){
	_redir("index.php");
	exit;
}
$nip = $_GET["nip"];
$dataTampil = _select("Pegawai",["NIP"=>$nip])->fetch_array();

if(isset($_POST["submit"])){
	$niP = $_POST["nip"];
	$gelarD = $_POST["gelardepan"];
	$nm = $_POST["nama"];
	$gelarB = $_POST["gelarblkg"];
	$hp = $_POST["hp"];
	$unm = trim($_POST["uname"]);
	$pas = trim($_POST["pass"]);
	$email = trim($_POST["email"]);
	$role = $_POST["koderole"];

	$data = ["NIP"=>$niP,
			 "GelarDepan"=>$gelarD,
			 "Nama"=>$nm,
			 "GelarBelakang"=>$gelarB,
			 "HP"=>$hp,
			 "Username"=>$unm,
			 "Password"=>$pas,
			 "Email"=>$email,
			 "KodeRole"=>$role];

			 if(_update("Pegawai",$data,["NIP"=>$nip])){
		echo "<script>alert('Pegawai berhasil diedit');</script>";
		_redir("tampil-pegawai-entri.php");
	}else{
		echo $db->error;
	}
}
?>
<form method="post">
		<div class="ui form">
        <div class="four fields"><div class="field"><label>NIP</label><input type="number" name="nip" value="<?php echo $dataTampil['NIP'];?>" readonly></div>

        <div class="field"><label>Gelar Depan</label><input type="text" name="gelardepan" value="<?php echo $dataTampil['GelarDepan'];?>"></div>

        <div class="field"><label>Nama</label><input type="text" name="nama" value="<?php echo $dataTampil['Nama'];?>" require></div>

        <div class="field"><label>Gelar Belakang</label><input type="text" name="gelarblkg" value="<?php echo $dataTampil['GelarBelakang'];?>"></div>
    </div>
        <div class="four fields">
            <div class="field"><label>No HP</label><input type="number" name="hp" value="<?php echo $dataTampil['HP'];?>" require></div>

            <div class="field"><label>Username</label><input type="text" name="uname" value="<?php echo $dataTampil['Username'];?>" require></div>

            <div class="field"><label>Password</label><input type="password" name="pass" value="<?php echo $dataTampil['Password'];?>" require></div>

            <div class="field"><label>Email</label><input type="text" name="email" value="<?php echo $dataTampil['Email'];?>"></div>

            <div class="field">
            <label>Role</label>
            <select name="koderole">

					<?php
							$query = _select("Role",["KodeRole"]);
							while($data = $query->fetch_array()){
								if($data["KodeRole"] == $dataTampil["KodeRole"])
									echo "<option value='".$data["KodeRole"]."' selected>".$data["NamaRole"]."</option>";
								else
									echo "<option value='".$data["KodeRole"]."'>".$data["NamaRole"]."</option>";
							}
							?>
				</select>
        </div>
    </div>
    <input type="submit" name="submit" value="Simpan" class="ui right floated green button" require>

    <input type="reset" name="reset" value="Reset" class="ui right floated button" require></div>
	</form>

	