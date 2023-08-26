// Memanipulasi elemen form
const formPemesanan = document.getElementById("booking-room-form");

// Memanipulasi elemen button Hitung Total Bayar
const btnHitungTotalBayar = document.getElementById("btn-total-price");

// Jika button Hitung Total Bayar diklik, maka ganti action pada form menjadi details.php
btnHitungTotalBayar.addEventListener("click", function () {
  formPemesanan.action = "src/php/details.php";

  // Cek apakah action sudah terganti atau belum apabila button diklik
  console.log(formPemesanan.action);
});

// Memanipulasi elemen button Batal
const btnBatal = document.getElementById("btn-cancel");

// Jika button  diklik, maka ganti action pada form menjadi details.php
btnBatal.addEventListener("click", function () {
  formPemesanan.action = "src/php/cancel.php";

  // Cek apakah action sudah terganti atau belum apabila button diklik
  console.log(formPemesanan.action);
});

// Memanipulasi elemen button Tutup dan div dengan class detail-pesanan
const detailPesanan = document.querySelector(".detail-pesanan");
const btnTutup = document.querySelector(".btn-close");

// Jika detail pesanan tidak kosong
if (detailPesanan) {
  // Ganti display detail pesanan menjadi none agar web kembali ke tampilan awal
  btnTutup.addEventListener("click", function () {
    detailPesanan.style.display = "none";
  });
}
