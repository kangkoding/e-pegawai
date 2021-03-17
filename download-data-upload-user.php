<?php
include 'lib/config.php';
include 'views/header.php';
$cek = $_SESSION["id"];
?>
<table class="ui red table">
		<thead><tr>
			<th>No</th>
			<th>Id Dokumen Pegawai</th>
			<th>NIP</th>
			<th>Nama Dokumen</th>
			<th colspan="2">Akses</th>
		</tr></thead>
		<tbody>
			<?php
						$perintah = _select("dokumenpegawai",["NIP"=>$cek]);
						$nomer = 1;
						while ($d = $perintah->fetch_array()) {
							echo "<tr><td>$nomer</td>";
							echo "<td>".$d[0]."</td>";
							echo "<td>".$d[1]."</td>";
							echo "<td>".$d[2]."</td>";
							echo "<td><a class='ui primary button' href='proses-download.php?id=".$d[0]."'>Download</a></td></tr>";
							$nomer++;
						}
			?>
			</tbody>
			</table>
