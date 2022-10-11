<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Pengecekan QC</title>

    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <!-- <link rel="stylesheet" href="fontawesome/css/all.min.css" type="text/css" /> 
    <link rel="stylesheet" href="css/slick.css" type="text/css" />   
    <link rel="stylesheet" href="css/tooplate-simply-amazed.css" type="text/css" /> -->

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

        $tgl=input($_POST["tgl"]);
        $item=input($_POST["item"]);
        $jam=input($_POST["jam"]);
        $hasil_produksi=input($_POST["hasil_produksi"]);
        $reject_jahitan=input($_POST["reject_jahitan"]);
        $reject_bentuk=input($_POST["reject_bentuk"]);
        $total_reject=input($_POST["total_reject"]);
        $keterangan=input($_POST["keterangan"]);


        //Query input menginput data kedalam tabel anggota
        $sql="INSERT INTO tbl_produksi (tgl,item,jam,hasil_produksi,reject_jahitan,reject_bentuk,total_reject,keterangan) VALUES
		('$tgl','$item','$jam','$hasil_produksi','$reject_jahitan','$reject_bentuk','$total_reject','$keterangan')";

        //Mengeksekusi/menjalankan query diatas
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

<div class="col-md-5">
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="mb-3">
    <label  class="form-label" >Tanggal :</label>
    <input type="date" name="tgl" class="form-control" required>
    </div>

    <div class="mb-3">
    <label  class="form-label" >Item :</label>
    <?php $sql = mysqli_query($koneksi, "SELECT * FROM tbl_item"); 
            // $item = mysqli_fetch_array($sql);
    ?>
    <select class="form-select" name="item" id="">
        <option disabled selected>Silahkan Pilih Item</option>
        <?php while($item = mysqli_fetch_array($sql)) { ?>
    <option value="<?php echo $item['item']; ?>"><?php echo $item['item']; ?></option>
   <?php } ?>
    <!-- <input type="text" name="item" class="form-control" placeholder="Masukan Nama Item" required> -->
    </select>
    </div>

    <div class="mb-3">
    <label  class="form-label" >Jam :</label>
    <input type="time" name="jam" class="form-control" placeholder="Masukan Jam" required>
    </div>

    <div class="mb-3">
    <label  class="form-label" >Hasil Produksi OK :</label>
    <input type="text" name="hasil_produksi" class="form-control" placeholder="Masukan Jumlah">
    </div>

    <div class="mb-3">
    <label  class="form-label" >Reject Jahitan :</label>
    <input type="text" name="reject_jahitan" class="form-control" placeholder="Masukan Jumlah" required>
    </div>

    <div class="mb-3">
    <label  class="form-label" >Reject Bentuk :</label>
    <input type="text" name="reject_bentuk" class="form-control" placeholder="Masukan Jumlah" required>
    </div>

    <div class="mb-3">
    <label  class="form-label" >Reject Total :</label>
    <input type="text" name="total_reject" class="form-control" placeholder="Masukan Jumlah Total" required>
    </div>

    <div class="mb-3">
    <label  class="form-label" >Keterangan :</label>
    <textarea name="keterangan" class="form-control" cols="30" rows="10" placeholder="Keterangan"></textarea>
    <!-- <input type="textarea" id="nama" class="form-control" placeholder="Masukan Jam"> -->
    </div>
    
<br>
    <div class="mb-3">
        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
        
    </div>
    
</form>
</div>

<div class="container">

<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_item'])) {
        $id_item=htmlspecialchars($_GET["id_item"]);

        $sql="DELETE FROM tbl_produksi WHERE id_item='$id_item' ";
        $hasil=mysqli_query($koneksi,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:input.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>
<div class="card">
<table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Item</th>
            <th>Jam</th>
            <th>Hasil Produksi</th>
            <th>Reject Jahitan</th>
            <th>Reject Bentuk</th>
            <th>Total Reject</th>
            <th>Keterangan</th>
            <th colspan='2'>Aksi</th>
            

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="SELECT * FROM tbl_produksi order by id_item desc";

        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>

            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["tgl"]; ?></td>
                <td><?php echo $data["item"];   ?></td>
                <td><?php echo $data["jam"];   ?></td>
                <td><?php echo $data["hasil_produksi"];   ?></td>
                <td><?php echo $data["reject_jahitan"];   ?></td>
                <td><?php echo $data["reject_bentuk"];   ?></td>
                <td><?php echo $data["total_reject"];   ?></td>
                <td><?php echo $data["keterangan"];   ?></td>
                
                <td>
                    <a href="update_produksi.php?id_item=<?php echo htmlspecialchars($data['id_item']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_item=<?php echo $data['id_item']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>

        
    <?php  } ?>
        


</table>

</div>

<a href="halaman_pegawai.php"><button type="submit" class="btn btn-primary" >Kembali</button></a>

<a href="cetak.php">
<button type="button" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
  <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
  <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
</svg>Cetak</button>
</a>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.singlePageNav.min.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/templatemo-script.js"></script>


</body>
</html>