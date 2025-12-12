<?php
echo "proses.php terbaca<br>";
include "koneksi.php";

$nama   = $_POST['nama'];
$umur   = $_POST['umur'];
$posisi = $_POST['posisi'];
$email  = $_POST['email'];
$nohp   = $_POST['nohp'];

// upload foto
$foto = $_FILES['foto']['name'];
$lokasi = $_FILES['foto']['tmp_name'];
$folder = "foto_pemain/" . $foto;

if (!is_dir("foto_pemain")) {
    mkdir("foto_pemain");
}

move_uploaded_file($lokasi, $folder);

$sql = "INSERT INTO pendaftaran (nama, umur, posisi, email, `no hp`, foto)
        VALUES ('$nama', '$umur', '$posisi', '$email', '$nohp', '$foto')";

if($koneksi->query($sql)){
    echo "Pendaftaran Berhasil! <a href='member.php'>Lihat Member</a>";
} else {
    echo "Gagal: " . $koneksi->error;
}
?>
