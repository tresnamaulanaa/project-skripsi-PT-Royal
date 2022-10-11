<!DOCTYPE html>
<html>
    <head>
        
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Buyer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- DATA TABLES -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    </head>
    <body>

<?php

require 'config/app.php';

//Mengambil ID Pegawai dari URL
$id_buyer    = (int)$_GET['id_buyer'];

//Menampilkan Data
$buyer  = select("SELECT * FROM tb_buyer WHERE id_buyer = $id_buyer")[0];
?>

<div class="container mt-5">
    <h1>Profil Lengkap <?= $buyer['nama_buyer']; ?></h1>
    <hr>

    <table class="table table-striped table-responsive table-hover table-bordered mt-3">
        <tr align="center">
            <td colspan="2">
                <img src="img/buyer/<?= $buyer['foto']; ?>" width="25%">
            </td>
        </tr>
        <tr>
            <td width="40%">Id Buyer</td>
            <td width="60%">: <?= $buyer['id_buyer']; ?></td>
        </tr>
        <tr>
            <td width="40%">Nama Buyer</td>
            <td width="60%">: <?= $buyer['nama_buyer']; ?></td>
        </tr>
        <tr>
            <td width="40%">Keterangan</td>
            <td width="60%">: <?= $buyer['ket']; ?></td>
        </tr>
    </table>
    <hr>
    <a href="buyer.php" class="btn btn-secondary btn-sm mb-3">Kembali</a>
</div>

</body>
    <footer class="text-center">Copyright &copy; 2022</footer>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!-- Data Tables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        // Fungsi Table
        $('#data').DataTable();
        // Fungsi Table
    });
</script>
</html>