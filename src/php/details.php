<?php 

// Menghubungkan dengan database
include 'koneksi.php';

// Menangkap data dari form
$nama_pemesan	    = $_POST['name'];
$jenis_kelamin	    = $_POST['gender'];
$nomor_identitas    = $_POST['no-id'];
$tipe_kamar			= $_POST['room-type'];
$tanggal_pesan      = $_POST['date'];
$durasi_menginap	= $_POST['duration'];

// Menetapkan harga berdasarkan tipe kamar
if($tipe_kamar == 'standard'){
    $harga_kamar = 500000;
} elseif ($tipe_kamar == 'deluxe') {
    $harga_kamar = 750000;
} elseif ($tipe_kamar == 'family') {
    $harga_kamar = 1000000;
}

// Memberikan diskon 10% jika menginap lebih dari 3 hari
if ($durasi_menginap >= 3) {
    $discount = 10;
} else {
    $discount = 0;
}

// Menambahkan harga jika memesan sarapan
$sarapan = $_POST['breakfast'];
if ($sarapan == 'ya') {
    $harga_sarapan = 80000;
    $sarapan = 'ya';
} else {
    $harga_sarapan = 0;
    $sarapan = 'tidak';
}

// Menghitung total bayar
$total_bayar = (($harga_kamar * ((100 - $discount) / 100)) + $harga_sarapan) * $durasi_menginap;

// Menginput data ke database dengan tabel details
mysqli_query($koneksi, "INSERT INTO details VALUES('', '$nama_pemesan', '$jenis_kelamin', '$nomor_identitas', '$tipe_kamar', '$harga_kamar', '$tanggal_pesan', '$durasi_menginap', '$sarapan', '$total_bayar')");

// Mengembalikan ke halaman awal pada section pesan kamar
header("location:../../index.php#booking-room");

?>