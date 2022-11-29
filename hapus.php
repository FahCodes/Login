<?php
include "koneksi.php";
$sqlhapus = "DELETE FROM USER WHERE id_user='aa'";

if($koneksi->query($sqlhapus) === TRUE){
	echo "Data Berhasil Dihapus !";
}else{
	echo "Error Hapus :".$sqlhapus."<br>".$koneksi->error;
}

$koneksi->close();
?>