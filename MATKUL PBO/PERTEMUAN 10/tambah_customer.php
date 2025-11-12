<?php 
session_start();
if($_SESSION['status'] != "login"){
    header("location:login.php?pesan=belum_login");
    exit;
}
include('koneksi.php'); // <-- Pastikan ada titik-koma
$db = new database();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Customer</title>
</head>
<body>
    <h3>Form Tambah Data Customer</h3>
    <a href="tampil_customer.php">&lt;&lt; Kembali</a>
    <br><br>

    <form method="post" action="proses_customer.php?action=add">
        <table>
            <tr>
                <td>NIK</td>
                <td><input type="text" name="nik" required/></td>
            </tr>
            <tr>
                <td>Nama Customer</td>
                <td><input type="text" name="nama" required/></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jk" required>
                        <option value="">Pilih...</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" required></textarea></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="telp" required/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass" required/></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Simpan"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>