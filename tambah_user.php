<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
    
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id'])) {
        $id_user=htmlspecialchars($_GET["id"]);

        $sql="DELETE FROM user WHERE id='$id_user' ";
        $hasil=mysqli_query($koneksi,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:tambah_user.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Level</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="SELECT * FROM user order by id desc";

        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["username"];   ?></td>
                <td><?php echo $data["password"];   ?></td>
                <td><?php echo $data["level"];   ?></td>
                
                <td>
                    <a href="update_user.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?php echo $data['id']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="tambah_data_user.php" class="btn btn-primary" role="button">Tambah Data</a>
    <a href="admin/index.php" class="btn btn-primary" role="button">Kembali</a>
</div>

</body>
</html>
