<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include "koneksi.php";

$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pendaftaran WHERE id='$id'");
$row = $data->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pemain</title>
</head>
<body>

<h2>Edit Data Pemain</h2>

<form action="edit_proses.php" method="POST">
    
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    Nama:<br>
    <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br><br>

    Umur:<br>
    <input type="number" name="umur" value="<?php echo $row['umur']; ?>"><br><br>

    Posisi:<br>
    <select name="posisi">
        <option <?php if($row['posisi']=='Penyerang') echo 'selected'; ?>>Penyerang</option>
        <option <?php if($row['posisi']=='Gelandang') echo 'selected'; ?>>Gelandang</option>
        <option <?php if($row['posisi']=='Bek') echo 'selected'; ?>>Bek</option>
        <option <?php if($row['posisi']=='Kiper') echo 'selected'; ?>>Kiper</option>
    </select><br><br>

    Email:<br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

    No HP:<br>
    <input type="text" name="nohp" value="<?php echo $row['no hp']; ?>"><br><br>

    <button type="submit">Simpan Perubahan</button>

</form>

</body>
</html>
