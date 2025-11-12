<?php 
session_start();
if($_SESSION['status'] != "login"){
    header("location:login.php?pesan=belum_login");
    exit;
}

include('koneksi.php'); // <-- Pastikan ada titik-koma
$koneksi = new database(); 

$action = isset($_GET['action']) ? $_GET['action'] : '';

// -----------------------------------------------------
// PROSES TAMBAH DATA (ADD)
// -----------------------------------------------------
if($action == "add")
{
    // Panggil fungsi tambah_data_customer
    $koneksi->tambah_data_customer(
        $_POST['nik'],
        $_POST['nama'],
        $_POST['jk'],
        $_POST['alamat'],
        $_POST['telp'],
        $_POST['email'],
        $_POST['pass'] 
    );
    
    // Kembali ke halaman tampil_customer.php
    header('location:tampil_customer.php');
}
// -----------------------------------------------------
// PROSES EDIT DATA (EDIT)
// -----------------------------------------------------
else if($action == "edit")
{
    $id_customer = $_GET['id']; // Ambil ID dari URL
    
    $koneksi->edit_data_customer(
        $id_customer,
        $_POST['nik'],
        $_POST['nama'],
        $_POST['jk'],
        $_POST['alamat'],
        $_POST['telp'],
        $_POST['email'],
        $_POST['pass']
    );
    
    // Kembali ke halaman tampil_customer.php
    header('location:tampil_customer.php');
}
// -----------------------------------------------------
// PROSES HAPUS DATA (DELETE)
// -----------------------------------------------------
else if($action == "delete")
{
    $id_customer = $_GET['id']; // Ambil ID dari URL
    $koneksi->delete_data_customer($id_customer);
    
    // Kembali ke halaman tampil_customer.php
    header('location:tampil_customer.php');
}
?>