<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['id_item'])) {
        $id_item=input($_GET["id_item"]);

        $sql="SELECT * FROM tbl_produksi WHERE id_item=$id_item";
        $hasil=mysqli_query($koneksi,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_item=htmlspecialchars($_POST["id_item"]);
        $tgl=input($_POST["tgl"]);
        $item=input($_POST["item"]);
        $jam=input($_POST["jam"]);
        $hasil_produksi=input($_POST["hasil_produksi"]);
        $reject_jahitan=input($_POST["reject_jahitan"]);
        $reject_bentuk=input($_POST["reject_bentuk"]);
        $total_reject=input($_POST["total_reject"]);
        $keterangan=input($_POST["keterangan"]);

        //Query update data pada tabel anggota
        $sql="UPDATE tbl_produksi SET
            tgl='$tgl',
			item='$item',
			jam='$jam',
			hasil_produksi='$hasil_produksi', 
            reject_jahitan='$reject_jahitan',
            reject_bentuk='$reject_bentuk',
            total_reject='$total_reject',
            keterangan='$keterangan'
			WHERE id_item =$id_item";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($koneksi,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:input.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>

    <center><h3>Update Data</h3></center>

    <div class="col-md-5">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="mb-3">
    <label  class="form-label" >Tanggal :</label>
    <input type="date" name="tgl" class="form-control" value="<?php echo $data['tgl']; ?>" required>
    </div>

    <div class="mb-3">
    <label  class="form-label" >Item :</label>
    <input type="text" name="item" class="form-control" value="<?php echo $data['item']; ?>" placeholder="Masukan Nama Item" required>
    </div>

    <div class="mb-3">
    <label  class="form-label" >Jam :</label>
    <input type="time" name="jam" class="form-control" value="<?php echo $data['jam']; ?>" placeholder="Masukan Jam" required>
    </div>

    <div class="mb-3">
    <label  class="form-label" >Hasil Produksi OK :</label>
    <input type="text" name="hasil_produksi" class="form-control" value="<?php echo $data['hasil_produksi']; ?>" placeholder="Masukan Jumlah">
    </div>

    <div class="mb-3">
    <label  class="form-label" >Reject Jahitan :</label>
    <input type="text" name="reject_jahitan" class="form-control" value="<?php echo $data['reject_jahitan']; ?>" placeholder="Masukan Jumlah" required>
    </div>

    <div class="mb-3">
    <label  class="form-label" >Reject Bentuk :</label>
    <input type="text" name="reject_bentuk" class="form-control" value="<?php echo $data['reject_bentuk']; ?>" placeholder="Masukan Jumlah" required>
    </div>

    <div class="mb-3">
    <label  class="form-label" >Reject Total :</label>
    <input type="text" name="total_reject" class="form-control" value="<?php echo $data['total_reject']; ?>" placeholder="Masukan Jumlah Total" required>
    </div>

    <div class="mb-3">
    <label  class="form-label" >Keterangan :</label>
    <textarea name="keterangan" class="form-control" cols="30" rows="10" value="<?php echo $data['keterangan']; ?>" placeholder="Keterangan"></textarea>
    <!-- <input type="textarea" id="nama" class="form-control" placeholder="Masukan Jam"> -->
    </div>
    
    <input type="hidden" name="id_item" value="<?php echo $data['id_item']; ?>" />

<button type="submit" name="submit" class="btn btn-primary">Submit</button>
    
</form>




    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>