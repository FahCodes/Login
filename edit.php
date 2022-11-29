<?php
include "koneksi.php";

$sqledit = "UPDATE USER SET USERNAME='' WHERE id_user = ''";


if ($koneksi->query($sqledit) === TRUE) {
	echo "Data Berhasil Diubah";
}else{
	echo "Error :".$sqledit. "<br>".$koneksi->error;
}

$koneksi->close();
?>