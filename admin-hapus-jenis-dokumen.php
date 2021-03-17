<?php
include "lib/config.php";
if(empty($_SESSION["login-level"]) || (isset($_SESSION["login-level"]) && $_SESSION["login-level"] != "Admin")){
	_redir("index.php");
	exit;
}
$idjenisdok = $_GET["idjenisdok"];
_delete('jenisdokumen',["IdJenisDokumen"=>$idjenisdok]);
_redir("admin-tampil-jenis-dokumen.php");
?>