<?php 

// Menghubungkan dengan database
include 'koneksi.php';

// Menangkap data dari form
$nama_pemesan	    = $_POST['name'];
$nomor_identitas    = $_POST['no-id'];
$jenis_kelamin	    = $_POST['gender'];
$tipe_kamar			= $_POST['room-type'];
$durasi_menginap	= $_POST['duration'];
$tanggal            = $_POST['date'];

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
} else {
    $harga_sarapan = 0;
}

// Menghitung total bayar
$total_bayar = (($harga_kamar * ((100 - $discount) / 100)) + $harga_sarapan) * $durasi_menginap;

// Menginput data ke database dengan tabel customer
mysqli_query($koneksi, "INSERT INTO customer VALUES('', '$nama_pemesan', '$nomor_identitas', '$jenis_kelamin', '$tipe_kamar', '$durasi_menginap', '$discount', '$total_bayar')");

// Menginput data ke database dengan tabel cust_receipt
mysqli_query($koneksi, "INSERT INTO cust_receipt VALUES('', '$nama_pemesan', '$nomor_identitas', '$jenis_kelamin', '$tipe_kamar', '$durasi_menginap', '$discount', '$total_bayar')");

// Menghapus semua data pada tabel details
mysqli_query($koneksi, "DELETE FROM details");

// Mengembalikan ke halaman awal
header("location:../../index.php");

?>