<?php 
// Menghubungkan source code dengan database
$koneksi = mysqli_connect("localhost", "root", "", "ujikom_pnj_lsp");

// Jika koneksi gagal, maka eksekusi kode di bawah.
if(mysqli_connect_error()){
	echo "Koneksi database gagal: " . mysqli_connect_error();
}

?>