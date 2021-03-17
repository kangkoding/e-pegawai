<?php
include 'lib/config.php';
include 'views/header.php';
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
						$perintah = _select("dokumenpegawai");
						$nomer = 1;
						while ($d = $perintah->fetch_array()) {
							echo "<tr><td>$nomer</td>";
							echo "<td>".$d[0]."</td>";
							echo "<td>".$d[1]."</td>";
							echo "<td>".$d[2]."</td>";
							echo "<td><div class='ui buttons'><a class='ui primary button' href='proses-download.php?id=".$d[0]."'>Download</a><div class='or'></div><a class='ui red button' href='hapus-berkas.php?id=".$d[0]."'>Hapus Berkas</a></div></td></tr>";
							$nomer++;
						}
			?>
			</tbody>
			</table>
