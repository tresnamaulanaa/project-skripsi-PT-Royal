<?php

require 'db.php';
//FUNGSI MENAMPILKAN DATA
function select($query)
{
    //PANGGIL KONEKSI DATABASE
    global $db;

    $result   = mysqli_query($db, $query);
    $rows     = [];

    while   ($row = mysqli_fetch_assoc($result)) {
      $rows[]   = $row;
    }
    return $rows;
  }

  //FUNGSI TAMBAH DATA
function tambah($post)
{
  global $db;

  $id_buyer     = strip_tags($post['id_buyer']);
  $nama_buyer   = strip_tags($post['nama_buyer']);
  $ket          = strip_tags($post['ket']);
  $foto         = upload();

  //QUERY TAMBAH DATA
  $query = "INSERT INTO tb_buyer VALUES('$id_buyer', '$nama_buyer', '$ket', '$foto')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// Membuat fungsi Ubah
function ubahBuyer($post)
{
    global $db;
    
  $id_buyer             = strip_tags($post['id_buyer']);
  $nama_buyer           = strip_tags($post['nama_buyer']);
  $ket                  = strip_tags($post['ket']);
  $fotoLama             = strip_tags($post['fotoLama']);

    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }
  //QUERY UPDATE DATA
  $query = "UPDATE tb_buyer SET id_buyer = '$id_buyer', nama_buyer = '$nama_buyer', ket = '$ket', foto = '$foto' WHERE id_buyer = $id_buyer";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
    
}

// Membuat fungsi upload gambar
function upload()
{
    // Syarat
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // Jika tidak mengupload gambar atau tidak memenuhi persyaratan diatas maka akan menampilkan alert dibawah
    if ($error === 4) {
        echo "<script>alert('Pilih Foto terlebih dahulu!');</script>";
        return false;
    }

    // format atau ekstensi yang diperbolehkan untuk upload gambar adalah
    $extValid = ['jpg', 'jpeg', 'png'];
    $ext = explode('.', $namaFile);
    $ext = strtolower(end($ext));

    // Jika format atau ekstensi bukan gambar maka akan menampilkan alert dibawah
    if (!in_array($ext, $extValid)) {
        echo "<script>alert('Yang anda upload bukanlah gambar!');</script>";
        return false;
    }

    // Jika ukuran gambar lebih dari 3.000.000 byte maka akan menampilkan alert dibawah
    if ($ukuranFile > 3000000) {
        echo "<script>alert('Ukuran Foto anda terlalu besar!');</script>";
        return false;
    }

    // nama gambar akan berubah angka acak/unik jika sudah berhasil tersimpan
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ext;

    // memindahkan file ke dalam folde img dengan nama baru
    move_uploaded_file($tmpName, 'img/buyer/' . $namaFileBaru);

    return $namaFileBaru;
}

// Membuat fungsi hapus Buyer
function hapusBuyer($id_buyer)
{
    global $db;

    //AMBIL FOTO SESUAI DATA YG DI PILLIH
    $foto = select("SELECT * FROM tb_buyer WHERE id_buyer = $id_buyer")[0];
    unlink("img/buyer/". $foto['foto']);

    mysqli_query($db, "DELETE FROM tb_buyer WHERE id_buyer = $id_buyer");
    return mysqli_affected_rows($db);
}