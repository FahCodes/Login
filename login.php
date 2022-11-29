<!DOCTYPE html>
<?php
ob_start();
include "koneksi.php";
//memeriksa session
if(!isset($_SESSION[''])){
	session_start();
}
//menangkap nilai login
$errorcheck="";
if($_SERVER['REQUEST_METHOD']=="POST"){

	if(!empty($_POST['username'])){
		$user = $_POST['username'];
	}
	if(!empty($_POST['password'])){
		$pass = sha1($_POST['password']);
	}
	//fungsi memeriksa db
	$sqlcheck = "SELECT id_user,username,password,level,photo FROM user WHERE username = '$user' && password='$pass'";

	$resultcheck = $koneksi->query($sqlcheck);
	if($resultcheck->num_rows>0){
		//mengambil data dari table
		$data = $resultcheck->fetch_assoc();
		$_SESSION['user'] = $user;
		$_SESSION['level'] = $data["level"];
		$_SESSION['photo'] = $data["photo"];
		header("location:home.php");
		$errorcheck = "Selamat Anda Berhasil Masuk !";
	}else{
		$errorcheck = "Anda Tidak Terdaftar !";
	}
}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Halaman Login</title>
</head>
<body>
<div class="bungkus">
	<form name="formLogin" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label>User :</label>
		<input type="text" id="username" name="username" class="form" placeholder="Username..."><br><br>
		<label>Pass :</label>
		<input type="password" id="password" name="password" class="form" placeholder="Password..."><br>
		<input type="checkbox" id="tampil" onClick="tampilpass()">Show Password
		<br>
		<br>
		<input type="submit" id="submit" name="submit" class="login" value="Login">
	</form>
</div>
<?php
	echo $errorcheck;
?>
</body>
<script type="text/javascript" src="script.js"></script>
<?php
$koneksi->close();
ob_flush();
?>
</html>