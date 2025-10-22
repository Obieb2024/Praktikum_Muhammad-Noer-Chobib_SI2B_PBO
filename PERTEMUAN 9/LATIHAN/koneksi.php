<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "si_gudang";

// isi nama host, username mysql, dan password mysql anda
$koneksi = mysqli_connect($host, $username, $password, $database);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error()); }
?>