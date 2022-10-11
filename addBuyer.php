<!DOCTYPE html>
<html>
    <head>
        
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Buyer</title>
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

//CHECK TOMBOL SIMPAN
if (isset($_POST['simpan'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data Buyer berhasil ditambahkan!');
                document.location.href = 'buyer.php';
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data Buyer gagal ditambahkan!');
            </script>";
    }
}
?>

<div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data Buyer</h3>
            </div>
            <hr>
        </div>
    <div class="row my-2">
        <div class="col-md">
            <form method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id_buyer" class="form-label">ID Buyer</label>
                <input type="text" class="form-control w-50" id="id_buyer" placeholder="Masukkan ID" min="1" name="id_buyer" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="nama_buyer" class="form-label">Nama Buyer</label>
                <input type="text" class="form-control w-50" id="nama_buyer" placeholder="Masukkan Nama Lengkap Buyer" name="nama_buyer" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="ket" class="form-label">Keterangan</label>
                <textarea class="form-control w-50" id="ket" rows="5" name="ket" placeholder="Masukkan Keterangan" autocomplete="off" required></textarea>
            </div>
            <div class="mb-3">
                <label for="status_pegawai" class="form-label">Upload Foto</label></label>
                <input type="file" class="form-control w-50" id="foto" name="foto" onchange="previewImg()" required>
                
                <img src="" alt="" class="img-thumbnail img-preview mt-3" width="100px">
            </div>
            <hr>
                <a href="buyer.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </form>
        </div>
    </div>
</div>


<!-- PREVIEW IMAGE -->
<script>
    function previewImg(){
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e){
            imgPreview.src = e.target.result;
        }
    }
</script>
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
  </body>
</html>