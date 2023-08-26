<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AFN's Hotel</title>
    <!-- Link file CSS -->
    <link rel="stylesheet" href="src/css/style.css" />
  </head>
  <body>
    <!-- Header -->
    <header>
      <p><a href="#">AFN's Hotel</a></p>
      <nav>
        <ul>
          <li><a href="#products">PRODUK</a></li>
          <li><a href="#price-list">DAFTAR HARGA</a></li>
          <li><a href="#about-us">TENTANG KAMI</a></li>
          <li><a href="#booking-room">PESAN KAMAR</a></li>
        </ul>
      </nav>
    </header>

    <!-- Section Main -->
    <section id="main">
      <img src="assets/img/main-bg.jpg" id="home" class="gambar" alt="Main BG" />
    </section>

    <!-- Section Produk -->
    <section id="products">
      <h1>PRODUK</h1>
      <div class="grid">
        <div class="product-tile">
          <a href="#products">
            <img src="assets/img/standard.jpg" />
            <p>STANDARD</p>
          </a>
        </div>
        <div class="product-tile">
          <a href="#products">
            <img src="assets/img/deluxe.jpg" />
            <p>DELUXE</p>
          </a>
        </div>
        <div class="product-tile">
          <a href="#products">
            <img src="assets/img/executive.jpg" />
            <p>EXECUTIVE</p>
          </a>
        </div>
      </div>
    </section>

    <!-- Section Daftar Harga -->
    <section id="price-list">
      <h1>DAFTAR HARGA</h1>
      <div class="price-list-box">
        <div class="card card-1">
          <h3>STANDARD</h3>
          <p>Rp.500.000,-</p>
        </div>
        <div class="card card-2">
          <h3>DELUXE</h3>
          <p>Rp.750.000,-</p>
        </div>
        <div class="card card-3">
          <h3>FAMILY</h3>
          <p>Rp.1.000.000,-</p>
        </div>
      </div>
    </section>

    <!-- Section Tentang Kami -->
    <section id="about-us">
        <h1>TENTANG KAMI</h1>
        <table>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>Jl. Pegangsaan Timur No.12, Jakarta Pusat</td>
            </tr>
            <tr>
                <td>No. Telp</td>
                <td>:</td>
                <td>081234567890</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>afnhotel@gmail.com</td>
            </tr>
        </table>
    </section>

    <!-- Section Pesan Kamar -->
    <section id="booking-room">
      <h1>PESAN KAMAR</h1>
      <?php 
        // Koneksi ke database
	      include 'src/php/koneksi.php';

        // Mengambil data yang paling baru (terupdate)
	      $lastID = mysqli_query($koneksi, "SELECT MAX(id) as last_id FROM details");

        // Menghitung jumlah baris pada tabel details
	      $baris = mysqli_query($koneksi, "SELECT id FROM details");
        $jumlahBaris = mysqli_num_rows($baris);

        // Jika jumlah baris lebih dari 0, tampilkan form dengan data terbaru dari tabel details
        if ($jumlahBaris > 0) {

          // Ambil data terbaru
          while ($row = mysqli_fetch_array($lastID)) {
            
            // Mengambil semua data dari tabel detail
            $sqlQuery = mysqli_query($koneksi, "SELECT * FROM details WHERE id = $row[last_id]");
            
            // Ambil semua data dengan id terbaru lalu tampilkan form
            while ($d = mysqli_fetch_array($sqlQuery)) {
              ?>
                <form method="post" action="src/php/insert.php" id="booking-room-form">
                  <label for="name" id="name-label">
                    Nama Pemesan
                    <input id="name" name="name" type="text" value="<?php echo $d['nama_pemesan'] ?>" required />
                    <p class="alert">Nama harus diisi.</p>
                  </label>
                  <label id="gender-label">
                      Jenis Kelamin
                      <label for="male" id="male-label">
                          <input type="radio" name="gender" id="male" value="laki-laki" <?php ($d['jenis_kelamin'] =="laki-laki") ? "checked" : ($d['jenis_kelamin'] =="perempuan") ? "" :  "checked" ?> checked>
                          Laki-laki
                      </label>
                      <label for="female" id="female-label">
                          <input type="radio" name="gender" id="female" value="perempuan" <?php if($d['jenis_kelamin'] =="perempuan") {echo "checked";} ?>>
                          Perempuan
                      </label>
                  </label>
                  <label for="no-id" id="no-id-label">
                    Nomor Identitas
                    <input id="no-id" name="no-id" type="text" pattern="[0-9]{16}" value="<?php echo $d['nomor_identitas'] ?>" required />
                    <p class="alert">Isian salah...data harus 16 digit.</p>
                  </label>
                  <label for="room-type" id="room-type-label">
                    Tipe Kamar
                    <select name="room-type" id="room-type" required>
                      <option value="standard" <?php if($d['tipe_kamar'] =="standard") {echo "selected";} ?>>STANDARD</option>
                      <option value="deluxe" <?php if($d['tipe_kamar'] =="deluxe") {echo "selected";} ?>>DELUXE</option>
                      <option value="family" <?php if($d['tipe_kamar'] =="family") {echo "selected";} ?>>FAMILY</option>
                    </select>
                  </label>
                  <label for="price" id="price-label">
                    Harga Kamar
                    <input id="price" name="price" type="text" value="Rp<?php echo number_format($d['harga_kamar'], 2, ',', '.'); ?>" disabled />
                  </label>
                  <label for="date" id="date-label">
                    Tanggal Pesan
                    <input id="date" name="date" type="date" value="<?php echo $d['tanggal_pesan'] ?>" required />
                    <p class="alert">Tanggal harus diisi.</p>
                  </label>
                  <label for="duration" id="duration-label">
                    Durasi Menginap (hari)
                    <input id="duration" name="duration" type="number" min="1" value="<?php if($d['durasi_menginap'] == "") {echo "1";} else {echo $d['durasi_menginap'];} ?>" required />
                  </label>
                  <label for="breakfast" id="breakfast-label">
                    Termasuk Breakfast
                    <input id="breakfast" name="breakfast" type="checkbox" value="ya" <?php if($d['termasuk_breakfast'] =="ya") {echo "checked";} ?> /> Ya
                  </label>
                  <label for="total-price" id="total-price-label">
                    Total Bayar
                    <input id="total-price" name="total-price" type="text" value="Rp<?php echo number_format($d['total_bayar'], 2, ',', '.'); ?>" disabled />
                  </label>
                  <div id="list-button">
                      <input id="btn-total-price" type="submit" value="Hitung Total Bayar" />
                      <input id="btn-save" type="submit" value="Simpan" />
                      <input id="btn-cancel" type="submit" value="Batal" />
                  </div>
                </form>
              <?php              
            }
          }
          // Jika jumlah baris = 0, maka tampilkan form kosong
        } else {
          ?>
            <form method="post" action="src/php/insert.php" id="booking-room-form">
              <label for="name" id="name-label">
                Nama Pemesan
                <input id="name" name="name" type="text" required />
                <p class="alert">Nama harus diisi.</p>
              </label>
              <label id="gender-label">
                  Jenis Kelamin
                  <label for="male" id="male-label">
                      <input type="radio" name="gender" id="male" value="laki-laki" checked>
                      Laki-laki
                  </label>
                  <label for="female" id="female-label">
                      <input type="radio" name="gender" id="female" value="perempuan">
                      Perempuan
                  </label>
              </label>
              <label for="no-id" id="no-id-label">
                Nomor Identitas
                <input id="no-id" name="no-id" type="text" pattern="[0-9]{16}" required />
                <p class="alert">Isian salah...data harus 16 digit.</p>
              </label>
              <label for="room-type" id="room-type-label">
                Tipe Kamar
                <select name="room-type" id="room-type" required>
                  <option value="standard">STANDARD</option>
                  <option value="deluxe">DELUXE</option>
                  <option value="family">FAMILY</option>
                </select>
              </label>
              <label for="price" id="price-label">
                Harga Kamar
                <input id="price" name="price" type="text" disabled />
              </label>
              <label for="date" id="date-label">
                Tanggal Pesan
                <input id="date" name="date" type="date" required />
                <p class="alert">Tanggal harus diisi.</p>
              </label>
              <label for="duration" id="duration-label">
                Durasi Menginap (hari)
                <input id="duration" name="duration" type="number" min="1" value="1" required />
              </label>
              <label for="breakfast" id="breakfast-label">
                Termasuk Breakfast
                <input id="breakfast" name="breakfast" type="checkbox" value="ya" /> Ya
              </label>
              <label for="total-price" id="total-price-label">
                Total Bayar
                <input id="total-price" name="total-price" type="text" disabled />
              </label>
              <div id="list-button">
                  <input id="btn-total-price" type="submit" value="Hitung Total Bayar" />
                  <input id="btn-save" type="submit" value="Simpan" />
                  <input id="btn-cancel" type="reset" value="Batal" />
              </div>
            </form>
          <?php
        }
      ?>
    </section>
    <?php
    // Menghitung jumlah baris pada tabel cust_receipt
    $barisCust = mysqli_query($koneksi, "SELECT id FROM cust_receipt");
    $jumlahBarisCust = mysqli_num_rows($barisCust);

    // Jika jumlah baris sama dengan 1, tampilkan detail pesanan
    if ($jumlahBarisCust = 1) {
      $custDetails = mysqli_query($koneksi, "SELECT * FROM cust_receipt");

      // Ambil data detail pesanan
      while ($cust = mysqli_fetch_array($custDetails)) {
      ?>
      <div class="detail-pesanan">
        <div class="detail-box">
          <p class="selamat">Selamat! Pesanan Anda berhasil dibuat.</p>
          <p class="penting"><strong>Perhatian!</strong> Mohon ambil foto/screenshot layar Anda sebelum ditutup.</p>
          <hr />
          <p class="rincian">Detail Pesanan</p>
          <form method="post" action="src/php/cust-receipt.php">
            <table>
              <tr>
                  <td>Nama Pemesan</td>
                  <td>:</td>
                  <td><?php echo $cust['nama_pemesan']; ?></td>
              </tr>
              <tr>
                  <td>Nomor Identitas</td>
                  <td>:</td>
                  <td><?php echo $cust['nomor_identitas']; ?></td>
              </tr>
              <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td><?php echo ucfirst($cust['jenis_kelamin']); ?></td>
              </tr>
              <tr>
                  <td>Tipe Kamar</td>
                  <td>:</td>
                  <td><?php echo ucfirst($cust['tipe_kamar']); ?></td>
              </tr>
              <tr>
                  <td>Durasi Menginap</td>
                  <td>:</td>
                  <td><?php echo $cust['durasi_menginap']. " hari"; ?></td>
              </tr>
              <tr>
                  <td>Diskon</td>
                  <td>:</td>
                  <td><?php echo $cust['discount'] ."%"; ?></td>
              </tr>
              <tr>
                  <td>Total Bayar</td>
                  <td>:</td>
                  <td><?php echo "Rp" .number_format($cust['total_bayar'], 2, ',', '.'); ?></td>
              </tr>
            </table>
            <hr />  
            <input class="btn-close" type="submit" value="Tutup" />
          </form>
        </div>          
      </div>
      <?php
      }
    }     
    ?>
    <footer>
      <p>Copyright &copy; 2023. AFN's Hotel</p>
    </footer>

    <!-- Link file JavaScript -->
    <script src="src/js/script.js"></script>
  </body>
</html>
