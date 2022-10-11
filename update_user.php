<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['id'])) {
        $id_user=input($_GET["id"]);

        $sql="SELECT * FROM user WHERE id=$id_user";
        $hasil=mysqli_query($koneksi,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_user=htmlspecialchars($_POST["id"]);
        $nama=input($_POST["nama"]);
        $username=input($_POST["username"]);
        $password=input($_POST["password"]);
        $level=input($_POST["level"]);

        //Query update data pada tabel anggota
        $sql="UPDATE user SET
            nama='$nama',
			username='$username',
			password='$password',
			level='$level'
			WHERE id =$id_user";

        //Mengeksekusi atau menjalankan query diatas
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
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" placeholder="Masukan Username" required/>

        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" value="<?php echo $data['password']; ?>" placeholder="Masukan Password" required/>
        </div>
        <div class="form-group">
            <label>Level:</label>
            <input type="text" name="level" class="form-control" value="<?php echo $data['level']; ?>" placeholder="Masukan Level" required/>
        </div>

        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>