<?php
include 'lib/config.php';
include 'views/header.php';
if(empty($_SESSION["login-level"]) || (isset($_SESSION["login-level"]) && $_SESSION["login-level"] != "Admin")){
	_redir("index.php");
	exit;
}
if(isset($_POST["submit"])){
	$jenisdok = trim($_POST["jenisdokumen"]);
	$ket = $_POST["keterangan"];
	
	$data = ["JenisDokumen"=>$jenisdok,
			 "Keterangan"=>$ket];
	if(_insert("jenisdokumen",$data)){
		echo "<script>alert('Jenis Dokumen berhasil dibuat');</script>";
	}else{
		echo $db->error;
	}
}
?>
	<form method="post">
		<div class="ui form">
        <div class="two fields"><div class="field"><label>Jenis Dokumen</label><input type="text" name="jenisdokumen" require></div>


        <div class="field"><label>Keterangan</label><textarea name="keterangan" style="height: 20px;"></textarea></div>
    </div>
		<input type="submit" name="submit" value="Simpan" class="ui right floated green button" require>

    <input type="reset" name="reset" value="Reset" class="ui right floated button" require>
</div>
	</form>
