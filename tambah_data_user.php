<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran User</title>
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

        $nama=input($_POST["nama"]);
        $username=input($_POST["username"]);
        $password=input($_POST["password"]);
        $level=input($_POST["level"]);

        //Query input menginput data kedalam tabel anggota
        $sql="INSERT INTO user (nama,username,password,level) VALUES
		('$nama','$username','$password','$level')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($koneksi,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:tambah_user.php");
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
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" placeholder="Masukan Username" required/>

        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Masukan Password" required />
        </div>
        <div class="form-group">
            <label>Level:</label>
            <input type="text" name="level" class="form-control" placeholder="Masukan Level" required/>
        </div>
       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    </div> 
</div>
</body>
</html>