<?php
include "koneksi.php";

if (isset($_POST['lihat'])) {
    $tglawal=$_POST['dateawal'];
    $tglakhir=$_POST['dateakhir'];

    global $koneksi;

    $sql="SELECT * FROM tbl_produksi WHERE tgl BETWEEN '$tglawal' AND '$tglakhir' ";
    $query=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));

    if (mysqli_num_rows($query)>0)  { ?>



<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
    }
    table#item{
        width: 80%;
        font-size: 12px;
    }
    table,th{
        border: 1px solid black;
        border-collapse: collapse;

    }
    td{
        border:1px solid black;
    }
</style>

<title>Laporan <?php echo $tglawal."||".$tglakhir;?></title>
    <h1><center>Laporan Quality Control</center></h1>
    <center>Periode <?php echo "<b>".$tglawal."</b>"?> sampai <?php echo "<b>".$tglakhir."</b>"?></center>
    <center>PT Royal Puspita
        <br>
        <hr>
        Dicetak | Tanggal <?= date('d-F-Y') ?>

   <div class="well"> <center>
    <table style="border-spacing: 0px;" id="item" class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>Tanggal</th>
            <th>Item</th>
            <th>Jam</th>
            <th>Hasil Produksi</th>
            <th>Reject jahitan</th>
            <th>Reject bentuk</th>
            <th>Total reject</th>
            <th>Keterangan</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $no =1;
        while ($a = mysqli_fetch_assoc($query)) {
        
            ?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $a['tgl'];?></td>
            <td><?php echo $a['item']; ?></td>
            <td><?php echo $a['jam']; ?></td>
            <td><?php echo $a['hasil_produksi']; ?> </td>
            <td><?php echo $a['reject_jahitan']; ?></td>
            <td><?php echo $a['reject_bentuk']; ?></td>
            <td><?php echo $a['total_reject']; ?></td>
            <td><?php echo $a['keterangan']; ?></td>
        </tr>
        <?php
        $no++;
        }
        ?>

    </tbody>
    </table>
        </center>
   </div>
    </selection>
    
<?php }

}

?>