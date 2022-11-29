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