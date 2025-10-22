<?php
// Mengaktifkan display error dan error reporting
ini_set('display_errors', 1);
error_reporting(error_level: E_ALL);
mysqli_report(flags: MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Menyertakan file koneksi database
include 'koneksi.php';

// Mengambil data dari form POST
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$pekerjaan = $_POST['pekerjaan'];

// Perintah INSERT data ke tabel user
mysqli_query($koneksi, "INSERT INTO user (nama, alamat, pekerjaan) VALUES ('$nama', '$alamat', '$pekerjaan')");

// Mengarahkan kembali ke halaman index dengan pesan sukses
header("location:index.php?pesan=input");
?>