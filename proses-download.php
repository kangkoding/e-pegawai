<?php
include 'lib/config.php';
$id = $_GET["id"];

$tes = _select("dokumenpegawai",["IdDokumenPegawai" => $id])->fetch_array();
$berkase = $tes["Path"];
header("Content-Type: octet/stream");
header("Content-Disposition: attachment;filename=\"".$berkase."\"");
$fp = fopen($berkase,"r");
$data = fread($fp, filesize($berkase));
fclose($fp);
print $data;

?>