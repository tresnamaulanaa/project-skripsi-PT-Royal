<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

  
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

    <style>
        /* input.pwd{
            width: 35%;
        } */
    </style>

</head>
<body>
<?php

include 'koneksi.php';

?>

<div class="container">
    <div class="col-md-5">

    <section class="content">
        <h3>Laporan Quality Control</h3>
        <hr>
        <div class="form-group">
        <form action="tampil.php" method="POST" target="blank" >
            <label for="pwd">Masukan Tanggal Awal</label>
            <input type="date" class="form-control pwd datepicker" name="dateawal">
            <label for="pwd">Masukan Tanggal Akhir</label>
            <input type="date" class="form-control pwd datepicker"  name="dateakhir">
    <br>
            <input type="submit" class="btn btn-primary" name="lihat" value="lihat">
        </form>
        </div>
    </section>

    </div>
    </div>
 

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>