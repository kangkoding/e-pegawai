<?php
include "lib/config.php";

if(empty($_SESSION["login-level"]) || (isset($_SESSION["login-level"]) && $_SESSION["login-level"] != "Admin") && (isset($_SESSION["login-level"]) && $_SESSION["login-level"] != "Entri")){
	_redir("index.php");
	exit;
}
$nip = $_GET["nip"];
_delete('Pegawai',["NIP"=>$nip]);
_redir("tampil-pegawai-entri.php");
?>