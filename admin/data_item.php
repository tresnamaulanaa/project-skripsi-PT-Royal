<?php
include "../koneksi.php";

header('Content-Type: application/json; charset=utf8');

$sql = "SELECT * FROM tbl_produksi";
$query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

$array = array();
while ($data = mysqli_fetch_assoc($query))  $array[]=$data; 

echo json_encode($array);

?>