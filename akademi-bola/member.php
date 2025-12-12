<?php
include "koneksi.php";
$data = $koneksi->query("SELECT * FROM pendaftaran ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Home - Klub Sepakbola</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header class="site-header">
    <div class="container header-inner">
      <a href="#" class="brand">
        <!-- simple soccer ball SVG + text -->
        <svg class="logo" viewBox="0 0 64 64" aria-hidden="true" focusable="false">
          <circle cx="32" cy="32" r="30" fill="white" stroke="#0b72c4" stroke-width="2"/>
          <path d="M32 6 L23 20 L10 22 L18 33 L15 46 L32 40 L49 46 L46 33 L54 22 L41 20 Z" fill="#0b72c4"/>
          <circle cx="32" cy="32" r="3" fill="#e6f5ff"/>
        </svg>
        <span class="brand-text">Blue FC</span>
      </a>

      <button class="nav-toggle" aria-controls="main-nav" aria-expanded="false" aria-label="Buka menu">
        <span class="hamburger"></span>
      </button>

      <nav id="main-nav" class="main-nav" aria-label="Navigasi utama">
        <ul class="nav-list">
          <li><a href="#" class="active">Beranda</a></li>
          <li><a href="#">Jadwal</a></li>
          <li><a href="member.php">Pemain</a></li>
          <li><a href="#">Berita</a></li>
          <li><a href="pendaftaran.html">Pendaftaran</a></li>
          <li><a href="login.php">Login Admin</a></li>

        </ul>
      </nav>
    </div>
  </header>

<h2>Daftar Pemain Terdaftar</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Foto</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Posisi</th>
        <th>Email</th>
        <th>No HP</th>
    </tr>

    <?php
    $no = 1;
    while($row = $data->fetch_assoc()){
        echo "
            <tr>
                <td>$no</td>
                <td><img src='foto_pemain/{$row['foto']}' width='80'></td>
                <td>{$row['nama']}</td>
                <td>{$row['umur']}</td>
                <td>{$row['posisi']}</td>
                <td>{$row['email']}</td>
                <td>{$row['no hp']}</td>
            </tr>
        ";
        $no++;
    }
    ?>

</table>

</body>
</html>
