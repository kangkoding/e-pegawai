
<html>
<head>
<link rel="stylesheet" href="assets/semantic/semantic.css">
<link rel="stylesheet" href="styles.css">
<script>
</script>
<title>Sistem Kepegawaian</title>
</head>
<body>
<div style="margin: 10px;" class="ui container">
<div class="ui icon menu">
<div class="active teal item">
<i class="home icon"></i>
<a href="index.php">Home</a>
</div>

<?php
if(isset($_SESSION["login-level"])){
	$syarat =  $_SESSION["login-level"];

switch ($syarat) {
	case 'Admin':
		echo "<div class='ui simple dropdown link item'>
			<span class='text'>Entri Data</span>
			<i class='dropdown icon'></i>
			<div class='menu'>
			<div class='header'>Entri Pegawai</div>
 			<a href='akses-entri-data.php' class='item'>Input</a><a class='item' href='tampil-pegawai-entri.php'>Tampil Data</a></div></div>";
 		echo "<div class='ui simple dropdown link item'>
			<span class='text'>Akses Dokumen</span>
			<i class='dropdown icon'></i>
			<div class='menu'>
			<div class='header'>Dokumen</div>
 			<a href='pegawai-entri-upload.php' class='item'>Upload</a><a class='item' href='download-data-upload.php'>Download</a></div></div>";
 		echo "<div class='ui simple dropdown link item'>
			<span class='text'>Dokumen</span>
			<i class='dropdown icon'></i>
			<div class='menu'>
			<div class='header'>Jenis Dokumen</div>
 			<a href='admin-create-jenis-dokumen.php' class='item'>Input</a><a class='item' href='admin-tampil-jenis-dokumen.php'>Tampil Data</a></div></div>";
		break;

	case 'Entri':
		echo "<div class='ui simple dropdown link item'>
			<span class='text'>Entri Data</span>
			<i class='dropdown icon'></i>
			<div class='menu'>
			<div class='header'>Entri Pegawai</div>
 			<a href='akses-entri-data.php' class='item'>Input</a><a class='item' href='tampil-pegawai-entri.php'>Tampil Data</a></div></div>";
 		echo "<div class='ui simple dropdown link item'>
			<span class='text'>Akses Dokumen</span>
			<i class='dropdown icon'></i>
			<div class='menu'>
			<div class='header'>Dokumen</div>
 			<a href='pegawai-entri-upload.php' class='item'>Upload</a><a class='item' href='download-data-upload.php'>Download</a></div></div>";	
		break;

	case 'User':
		echo "<div class='ui simple dropdown link item'>
			<span class='text'>Akses Dokumen</span>
			<i class='dropdown icon'></i>
			<div class='menu'>
			<div class='header'>Dokumen</div>
 			<a class='item' href='download-data-upload-user.php?id=".$_SESSION["id"]."'>Download</a></div></div>";
		break;
	
	default:
		
		break;
	}
}
?>





<?php if(isset($_SESSION["login-level"])){
    echo "<div class='right item'>
<a href='logout.php' class='login''><i class='sign in icon'></i>Keluar</a>
</div>
";
}else{
    echo "<div class='right item'>
<a href='login.php' class='login''><i class='sign in icon'></i>Masuk</a>
</div>
";
}
    ?>

</div>
