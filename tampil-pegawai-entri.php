<?php
include 'lib/config.php';
include 'views/header.php';
if(empty($_SESSION["login-level"]) || (isset($_SESSION["login-level"]) && $_SESSION["login-level"] != "Admin") && (isset($_SESSION["login-level"]) && $_SESSION["login-level"] != "Entri")){
	_redir("index.php");
	exit;
}
?>
	<table class="ui red table">
		<thead><tr>
			<th>No</th>
			<th>NIP</th>
			<th>Gelar Depan</th>
			<th>Nama</th>
			<th>Gelar Belakang</th>
			<th>No HP</th>
			<th>Username</th>
			<th>Password</th>
			<th>Email</th>
			<th>Role</th>
			<th colspan="2">Tindakan</th>
		</tr></thead>

		<tbody>
			<?php
						if(isset($_SESSION["login-level"])){
							if($_SESSION["login-level"] == "Entri"){
						$perintah = _select("Pegawai",["KodeRole"=>"User"]);
						$nomer = 1;
						while ($d = $perintah->fetch_array()) {
							echo "<tr><td>$nomer</td>";
							echo "<td>".$d[0]."</td>";
							echo "<td>".$d[1]."</td>";
							echo "<td>".$d[2]."</td>";
							echo "<td>".$d[3]."</td>";
							echo "<td>".$d[4]."</td>";
							echo "<td>".$d[5]."</td>";
							echo "<td>".$d[6]."</td>";
							echo "<td>".$d[7]."</td>";
							echo "<td>".$d[8]."</td>";
							if($_SESSION["login-level"] == "Admin" or $_SESSION["login-level"] == "Entri"){
							echo "<td><div class='ui buttons'><a class='ui primary button' href='edit-pegawai-entri.php?nip=".$d[0]."'>Edit</a><div class='or'></div> <a class='ui red button' href='hapus-pegawai-entri.php?nip=".$d[0]."'>Hapus</a></div></td></tr>";
						}
							$nomer++;
						}
					}else{
						$perintah = _select("Pegawai");
						$nomer = 1;
						while ($d = $perintah->fetch_array()) {
							echo "<tr><td>$nomer</td>";
							echo "<td>".$d[0]."</td>";
							echo "<td>".$d[1]."</td>";
							echo "<td>".$d[2]."</td>";
							echo "<td>".$d[3]."</td>";
							echo "<td>".$d[4]."</td>";
							echo "<td>".$d[5]."</td>";
							echo "<td>".$d[6]."</td>";
							echo "<td>".$d[7]."</td>";
							echo "<td>".$d[8]."</td>";
							if($_SESSION["login-level"] == "Admin" or $_SESSION["login-level"] == "Entri"){
							echo "<td><div class='ui buttons'><a class='ui primary button' href='edit-pegawai-entri.php?nip=".$d[0]."'>Edit</a><div class='or'></div> <a class='ui red button' href='hapus-pegawai-entri.php?nip=".$d[0]."'>Hapus</a></div></td></tr>";
						}
							$nomer++;
						}
					}
				}
			?>
		</tbody>
	</table>
