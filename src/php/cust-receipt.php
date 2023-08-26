<?php 

// Menghubungkan dengan database
include 'koneksi.php';

// Menghapus semua data pada tabel cust_receipt
mysqli_query($koneksi, "DELETE FROM cust_receipt");

// Mengembalikan ke halaman awal
header("location:../../index.php");

?>