<?php
//memeriksa session
ob_start();
if(!isset($_SESSION[''])){
	session_start();
}
if(isset($_SESSION['user'])){
	unset($_SESSION['user']);
	header("location:login.php");
}
ob_flush();
?>