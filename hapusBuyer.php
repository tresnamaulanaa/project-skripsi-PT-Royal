<?php

// Memanggil atau membutuhkan file function.php
require 'config/app.php';

// Mengambil data dari id dengan fungsi get
$id_buyer = $_GET['id_buyer'];

// Jika fungsi hapus lebih dari 0/data terhapus, maka munculkan alert dibawah
if (hapusBuyer($id_buyer) > 0) {
    echo "<script>
                alert('Berhasil dihapus!');
                document.location.href = 'buyer.php';
            </script>";
} else {
    // Jika fungsi hapus dibawah dari 0/data tidak terhapus, maka munculkan alert dibawah
    echo "<script>
            alert('Gagal dihapus!');
        </script>";
}