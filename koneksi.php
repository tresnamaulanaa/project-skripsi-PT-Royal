<?php 
$koneksi = mysqli_connect("localhost","root","","db_qc");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

// $host="localhost";
// $user="root";
// $password="";
// $db="db_qc";

// $kon = mysqli_connect($host,$user,$password,$db);
// if (!$kon){
// 	  die("Koneksi gagal:".mysqli_connect_error());
// }


 
?>