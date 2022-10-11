<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Item</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $item=input($_POST["item"]);
        $ket=input($_POST["keterangan"]);

        //Query input menginput data kedalam tabel anggota
        $sql="INSERT INTO tbl_item (item,keterangan) VALUES
		('$item','$ket')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($koneksi,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:tambah_item.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>

<div class="col-md-5">
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Item:</label>
            <input type="text" name="item" class="form-control" placeholder="Masukan Nama Item" required />
 
        </div>
        <div class="form-group">
            <label>Buyer:</label>
            <input type="text" name="keterangan" class="form-control" placeholder="Masukan Buyer" required/>

        </div>
        

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    </div> 
</div>
</body>
</html>