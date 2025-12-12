<?php
$koneksi = new mysqli("localhost", "root", "", "sepakbola");

if($koneksi->connect_error){
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
