<?php
include 'lib/config.php';
include 'views/header.php';
$kon = db();
$tesA = "SELECT COUNT(*) FROM dokumen";
$exeA = mysqli_query($kon,$tesA);
if($exeA===FALSE){
    die(mysql_error());
}
$data = mysqli_fetch_array($exeA);

$tesB = "SELECT COUNT(*) FROM jenisdokumen";
$exeB = mysqli_query($kon,$tesB);
if($exeB===FALSE){
    die(mysql_error());
}
$dataB = mysqli_fetch_array($exeB);

$tesC = "SELECT COUNT(*) FROM pegawai";
$exeC = mysqli_query($kon,$tesC);
if($exeC===FALSE){
    die(mysql_error());
}
$dataC = mysqli_fetch_array($exeC);


$tesD = "SELECT COUNT(*) FROM role";
$exeD = mysqli_query($kon,$tesD);
if($exeD===FALSE){
    die(mysql_error());
}
$dataD = mysqli_fetch_array($exeD);


?>

<?php
    if(isset($_SESSION["login-level"])){
        switch ($_SESSION["login-level"]) {
            case 'Admin':
                    echo "<center><h1 class='ui segment' style='margin-bottom : 20px;padding-top: 20px;height: 70px;'><a class='ui blue image label'>
                        <i class='lock icon'></i>
                        Selamat Datang
                        <div class='detail'>Admin</div>
                        </a></h1></center>";
                break;
            case 'Entri':
                    echo "<center><h1 class='ui segment' style='height: 70px;margin-bottom : 20px;padding-top: 20px;'><a class='ui green image label'>
                        <i class='lock icon'></i>
                        Selamat Datang NIP : ".$_SESSION["id"]."
                        <div class='detail'>Petugas Entri</div>
                        </a></h1></center>";
                break;
            case 'User':
                    echo "<center><h1 class='ui segment' style='height: 70px;padding-top: 20px;margin-bottom : 20px;'><a class='ui teal image label'>
                        <i class='lock icon'></i>
                        Selamat Datang NIP : ".$_SESSION["id"]."
                        <div class='detail'>User</div>
                        </a></h1></center>";
                break;
            default:
                
                break;
        }
    }
?>

<div class="ui three column grid">
    <div class="column">
        <div class="ui red segment">
            <h1 class="ui header">Dokumen</h1>
            <h3 class="ui label"><i class="mail icon"></i>
                <?php echo $data[0]; ?> Data yang masuk
                </h3>
        </div>
    </div>
    <div class="column">
        <div class="ui blue segment">
            <h1 class="ui header">Jenis Dokumen</h1>
            <h3 class="ui label"><i class="mail icon"></i><?php echo $dataB[0]; ?> Data yang masuk</h3>
        </div>
    </div>
    <div class="column">
        <div class="ui green segment">
            <h1 class="ui header">Pegawai</h1>
            <h3 class="ui label"><i class="mail icon"></i><?php echo $dataC[0]; ?> Data yang masuk</h3>
        </div>
    </div>
<br>
<div class="column">
        <div class="ui blue segment">
            <h1 class="ui header">Role</h1>
            <h3 class="ui label"><i class="mail icon"></i><?php echo $dataD[0]; ?> Data yang masuk</h3>
        </div>
    </div>

</div>

<br>
<center><h1 class='ui segment' style='margin-bottom: 20px;height: 100px;'>GISE<br><br>Powered by GIS Corporation</h1></center>

</body>
</html>