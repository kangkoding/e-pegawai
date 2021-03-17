<?php
include 'lib/config.php';
include 'views/header.php';
if(empty($_SESSION["login-level"]) || (isset($_SESSION["login-level"]) && $_SESSION["login-level"] != "Admin")){
	_redir("index.php");
	exit;
}
$idjenisdok = $_GET["idjenisdok"];

$dataTampil = _select("jenisdokumen",["IdJenisDokumen"=>$idjenisdok])->fetch_array();

if(isset($_POST["submit"])){
	$jenisdok = trim($_POST["jenisdokumen"]);
	$ket = $_POST["keterangan"];
	
	$data = ["JenisDokumen"=>$jenisdok,
			 "Keterangan"=>$ket];
	if(_update("jenisdokumen",$data,["IdJenisDokumen"=>$idjenisdok])){
		echo "<script>alert('Jenis Dokumen berhasil dirubah');</script>";
	}else{
		echo $db->error;
	}
}
?>
	<form method="post">
		<form method="post">
		<div class="ui form">
        <div class="two fields"><div class="field"><label>Jenis Dokumen</label><input type="text" name="jenisdokumen" value="<?php echo $dataTampil['JenisDokumen'];?>"require></div>


        <div class="field"><label>Keterangan</label><textarea name="keterangan" style="height: 20px;"><?php echo $dataTampil['Keterangan'];?></textarea></div>
    </div>
		<input type="submit" name="submit" value="Simpan" class="ui right floated green button" require>

    <input type="reset" name="reset" value="Reset" class="ui right floated button" require>
</div>

	</form>
