<?php
session_start();
if($_SESSION['status'] != "login"){
    header("location:login.php?pesan=belum_login");
    exit;
}

include('koneksi.php'); // <-- Pastikan ada titik-koma
$db = new database();

// Ambil ID dari URL
$id_customer = $_GET['id'];
if(empty($id_customer)){
    header('location:tampil_customer.php');
}

// Ambil data customer yang mau diedit
$data_edit_customer = $db->tampil_edit_data_customer($id_customer);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Customer</title>
</head>
<body>
    <h3>Form Edit Data Customer</h3>
    <a href="tampil_customer.php">&lt;&lt; Kembali</a>
    <br><br>

    <form method="post" action="proses_customer.php?action=edit&id=<?php echo $id_customer; ?>">
        <table>
            <?php 
            // Loop untuk menampilkan data
            foreach ($data_edit_customer as $d) { 
            ?>
            <tr>
                <td>NIK</td>
                <td><input type="text" name="nik" value="<?php echo $d['nik_customer']; ?>" required/></td>
            </tr>
            <tr>
                <td>Nama Customer</td>
                <td><input type="text" name="nama" value="<?php echo $d['nama_customer']; ?>" required/></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jk" required>
                        <option value="Laki-laki" <?php if($d['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if($d['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" required><?php echo $d['alamat_customer']; ?></textarea></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="telp" value="<?php echo $d['telepon_customer']; ?>" required/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php echo $d['email_customer']; ?>" required/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="pass" />
                    <small style="color:red">Abaikan jika tidak ingin mengubah password</small>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Ubah"/>
                </td>
            </tr>
            <?php } ?>
        </table>
    </form>
</body>
</html>