<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}


include "koneksi.php";

// Jika tombol hapus ditekan
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    // Ambil data untuk menghapus foto
    $ambil = $koneksi->query("SELECT foto FROM pendaftaran WHERE id='$id'");
    $data = $ambil->fetch_assoc();
    $foto = $data['foto'];

    // Hapus file foto jika ada
    if (file_exists("foto_pemain/" . $foto)) {
        unlink("foto_pemain/" . $foto);
    }

    // Hapus data dari database
    $koneksi->query("DELETE FROM pendaftaran WHERE id='$id'");

    echo "<script>alert('Data berhasil dihapus!'); window.location='admin.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Data Pendaftar</title>
      <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #555;
            padding: 10px;
            text-align: left;
        }
        img {
            width: 60px;
            border-radius: 5px;
        }
        .btn-hapus {
            background: red;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-hapus:hover {
            opacity: 0.8;
        }
    </style>
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
            <li><a href="index.html" >Beranda</a></li>
            <li><a href="#">Jadwal</a></li>
            <li><a href="member.php ">Pemain</a></li>
            <li><a href="#">Berita</a></li>
            <li><a href="pendaftaran.html">Pendaftaran</a></li>
            <li><a href="login.php"class="active">Login Admin</a></li>
          </ul>
        </nav>
      </div>
    </header>

<h2>Data Pendaftar Pemain</h2>
<a href="logout.php" style="background:red;color:white;padding:8px;text-decoration:none;border-radius:4px;">
    Logout
</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Posisi</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>

    <?php
    $result = $koneksi->query("SELECT * FROM pendaftaran ORDER BY id DESC");
    while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
    <td><?php echo $no++; ?></td>
    <td><img src="foto_pemain/<?php echo $row['foto']; ?>" width="60"></td>
    <td><?php echo $row['nama']; ?></td>
    <td><?php echo $row['umur']; ?></td>
    <td><?php echo $row['posisi']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['no_hp']; ?></td>
    
    <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
        <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Hapus data?');">Hapus</a>
    </td>
</tr>
    <?php } ?>
</table>

</body>
</html>
