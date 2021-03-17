<?php
include 'lib/config.php';
include 'views/header.php';

if(empty($_SESSION["login-level"]) || (isset($_SESSION["login-level"]) && $_SESSION["login-level"] != "Admin") && (isset($_SESSION["login-level"]) && $_SESSION["login-level"] != "Entri")){
	_redir("index.php");
	exit;
}

$waktu = date("h-i-s");

if(isset($_POST["submit"])){
	$NIP = $_POST["nip"];
	$NamaDok = $_POST["nmdokumen"];
	$IdJenisDok = $_POST["idjenisdok"];
	$berkas = $_FILES["file"];
	$namenye = $_FILES["file"]["name"];
	$xtensi = explode('.',$namenye);
	$namaFile = $NIP."-".$IdJenisDok."-".$namenye;
	move_uploaded_file($berkas["tmp_name"],"file-upload/".$namaFile);

	$data = ["IdDokumenPegawai" => $NIP."-".$waktu."-".$NamaDok,
			 "NIP" => $NIP,
			 "NamaDokumen" => $NIP."-".$waktu."-".$NamaDok,
			 "IdJenisDokumen" => $IdJenisDok,
			 "Path" => "file-upload/".$namaFile];

			 if(_insert("dokumenpegawai",$data)){
			 	echo "<script>alert('Data berhasil Upload');</script>";
			}else{
				echo $db->error;
				}
			 }	
?>
<form method="post" enctype="multipart/form-data">
<div class="ui form">
        <div class="four fields">
        	<div class="field"><label>NIP</label><select name="nip">
					<?php
					
						$perintah = _select("Pegawai",["KodeRole"=>"User"]);
						while ($d = $perintah->fetch_array()) {
							echo "<option value=".$d["NIP"].">".$d["NIP"]." ".$d["Nama"]."</option>";
						}
					
					?>
					</select></div>

        <div class="field"><label>Nama Dokumen *</label><input type="text" name="nmdokumen" required></div>

        <div class="field"><label>Jenis Dokumen</label><select name="idjenisdok">
					<?php
						$perintah = _select("jenisdokumen");
						while ($d = $perintah->fetch_array()) {
							echo "<option value=".$d["IdJenisDokumen"].">".$d["JenisDokumen"]."</option>";
						}
					
					?>
					</select></div>

        <div class="field"><label>Berkas</label><input type="file" name="file" required></div>
    </div>

    </div>
    <input type="submit" name="submit" value="Masuk" class="ui right floated green button" require>

    <input type="reset" name="reset" value="Reset" class="ui right floated button" require>
    
	</div>
	</form>
</body>
</html>