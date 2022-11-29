<?php
include "koneksi.php";
if ($_SERVER['REQUEST_METHOD']=="POST") {
	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	if (!empty($username)){ //jika data primary tidak kosong
		$sql = "INSERT INTO SISWA (NIS, NAMASISWA) VALUES('$username', '$password')";
		if($koneksi->query($sql) === TRUE){
			echo "Data Baru Berhasil Disimpan !";
		}else{
			echo "Error :".$sql."<br>".$koneksi->error;
		}
	}
}

$koneksi->close();
?>