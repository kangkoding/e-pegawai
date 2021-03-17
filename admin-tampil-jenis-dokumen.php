<?php
include 'lib/config.php';
include 'views/header.php';
if(empty($_SESSION["login-level"]) || (isset($_SESSION["login-level"]) && $_SESSION["login-level"] != "Admin")){
	_redir("index.php");
	exit;
}
?>
	<table class="ui red table">
		<thead><tr>
			<th>No</th>
			<th>Id Jenis Dokumen</th>
			<th>Jenis Dokumen</th>
			<th>Keterangan</th>
			<th>Tindakan</th>
		</tr></thead>
		<tbody>
			<?php
						$perintah = _select("jenisdokumen");
						$nomer = 1;
						while ($d = $perintah->fetch_array()) {
							echo "<tr><td>$nomer</td>";
							echo "<td>".$d[0]."</td>";
							echo "<td>".$d[1]."</td>";
							echo "<td>".$d[2]."</td>";
							echo "<td><div class='ui buttons'><a class='ui primary button' href='admin-edit-jenis-dokumen.php?idjenisdok=".$d[0]."'>Edit</a><div class='or'></div> <a class='ui red button' href='admin-hapus-jenis-dokumen.php?idjenisdok=".$d[0]."'>Hapus</a></div></td><tr>";
							$nomer++;
						}
			?>
		</tbody>
	</table>
