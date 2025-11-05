<?php 
session_start();
if($_SESSION['status'] != "login"){
    header("location:login.php?pesan=belum_login");
    exit;
}

include('koneksi.php');
$db = new database();

$id_barang = $_GET['id_barang'];
$data_edit_barang = $db->tampil_edit_data($id_barang);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Barang</title>
</head>
<body>
    <h3>Form Edit Data Barang</h3>
    <form method="post" action="proses_barang.php?action=edit&id_barang=<?php echo $id_barang; ?>">
        <table>
            <?php foreach ($data_edit_barang as $d) { ?>
                <tr>
                    <td>Kode Barang</td>
                    <td><input type="text" name="kd_barang" value="<?php echo $d['kd_barang']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td><input type="text" name="nama_barang" value="<?php echo $d['nama_barang']; ?>" required></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="number" name="stok" value="<?php echo $d['stok']; ?>" required></td>
                </tr>
                <tr>
                    <td>Harga Beli</td>
                    <td><input type="number" name="harga_beli" value="<?php echo $d['harga_beli']; ?>" required></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td><input type="number" name="harga_jual" value="<?php echo $d['harga_jual']; ?>" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Ubah">
                        <a href="tampil_barang.php"> 
                            <input type="button" value="Kembali">
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>
</body>
</html>