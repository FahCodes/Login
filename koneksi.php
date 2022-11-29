<?php

$server 	= "localhost";
$user 		= "root";
$pass 		= "";
$db			= "latihan";

//create connection
$koneksi = new mysqli($server, $user, $pass, $db);

//check connection
if($koneksi->connect_error){
	die("Koneksi Gagal: ".$koneksi->connect_error);
}
?>