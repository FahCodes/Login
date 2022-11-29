<!DOCTYPE html>
<?php
ob_start();
$izin = FALSE;
$user = "";
//start sesi
if(!isset($_SESSION[''])){
	session_start();
}
if(isset($_SESSION['user']) && $_SESSION['level'] == "Admin"){
	$user = $_SESSION['user'];
	$level = $_SESSION['level'];
	$photo = $_SESSION['photo'];
	$izin = TRUE;
}
if(isset($_SESSION['user']) && $_SESSION['level'] == "Operator"){
	$user = $_SESSION['user'];
	$level = $_SESSION['level'];
	$photo = $_SESSION['photo'];
	$izin = TRUE;
}
?>
<?php
include "koneksi.php";
if ($_SERVER['REQUEST_METHOD']=="POST") {
	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	if (!empty($username)){ //jika data primary tidak kosong
		$sql = "INSERT INTO USER (USERNAME, PASSWORD) VALUES('$username', '$password')";
		if($koneksi->query($sql) === TRUE){
			echo "";
		}else{
			echo "Error :".$sql."<br>".$koneksi->error;
		}
	}
}
?>
<html>
<head>
	<style type="text/css">
		.bungkus{
			margin: 0 auto;
			border: 1px solid black;
			width: 200px;
			padding: 10px 20px 10px;
		}
		.iform{
			width: 100%;
		}
		body {
			font-family: Arial;
			padding: 10px;
			background: #f1f1f1;
		}
	</style>
	<title>INPUT DATA</title>
</head>
<body>
<?php
if($izin == TRUE){
?>
<div class="bungkus">
	<form name="input" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<input type="text" name="username" id="username" class="iform" placeholder="Masukkan Username Anda..." required>
		<input type="password" name="password" id="password" class="iform" placeholder="Masukkan Nama Anda..." required
		>
		<input type="submit" name="simpan" id="simpan" value="Simpan">
		<a href="home.php">Kembali</a>
	</form>
	</div>
	<div class="bungkus">
		<?php
include "koneksi.php";
$sqltampil 	= "SELECT id_user, username, level , photo FROM user ORDER BY id_user ASC";
$hasil 		= $koneksi->query($sqltampil);
//cek jumlah data
if($hasil->num_rows > 0){
	//output data baris berbaris
	echo "<br>";
	while($data = $hasil->fetch_assoc()){
		echo $data["id_user"],"			".$data["username"],"			".$data["level"]."<br>";
	}
}else{
	echo "Data Masih Kosong ! ";
}
$koneksi->close();
?>
</div>
<?php
}else{
?>	
<div id="pesan">
	<b>Anda Tidak Memiliki Access !</b>
	<br>
	<a href="login.php">Silahkan Kembali Ke Login!</a>
</div>
<?php } ?>
</body>
<?php
ob_flush();	
?>
</html>