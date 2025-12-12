<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
include "koneksi.php";

$id   = $_POST['id'];
$nama = $_POST['nama'];
$umur = $_POST['umur'];
$posisi = $_POST['posisi'];
$email = $_POST['email'];
$nohp  = $_POST['nohp']; // ini harus sama dengan name input di form

$sql = "UPDATE pendaftaran SET 
            nama='$nama',
            umur='$umur',
            posisi='$posisi',
            email='$email',
            `no hp`='$nohp'
        WHERE id='$id'";

if($koneksi->query($sql)){
    echo "Update Berhasil! <a href='admin.php'>Kembali</a>";
} else {
    echo "Gagal: " . $koneksi->error;
}
?>

