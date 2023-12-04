<?php
include 'koneksi.php';

// Periksa apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Lanjutkan dengan query DELETE
$koneksi->query("DELETE FROM barang WHERE id_barang='$_GET[id]'");

echo "<script>alert('produk anda telah terhapus')</script>";
echo "<script>location='index.php?halaman=barang'</script>";
?>