<?php
include 'lib/config.php';

$id = $_GET["id"];
$data = _select("dokumenpegawai",["IdDokumenPegawai" => $id])->fetch_array();
$nm = $data["NamaDokumen"];

if(is_file($data["Path"])){
	unlink($data["Path"]);
	_delete('dokumenpegawai',["IdDokumenPegawai"=>$id]);
	_delete('dokumen',["NamaDokumen"=>$nm]);
	_redir("download-data-upload.php");
}
?>