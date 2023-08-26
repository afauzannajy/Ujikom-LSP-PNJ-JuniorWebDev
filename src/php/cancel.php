<?php 

// Menghubungkan dengan database
include 'koneksi.php';

// Menghapus semua data pada tabel details untuk membersihkan form
mysqli_query($koneksi, "DELETE FROM details");

// Mengembalikan ke halaman awal pada section pesan kamar
header("location:../../index.php#booking-room");

?>