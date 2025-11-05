<?php
// edit_data.php

// 1. Menghubungkan ke file koneksi database
include('koneksi.php');

// 2. Membuat instance objek database
$db = new database();

// 3. Mengambil id_barang dari URL
$id_barang = $_GET['id_barang'];

// 4. Mengambil data barang yang akan diedit dari database
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
                    <td>
                        <input type="hidden" name="id_barang" value="<?php echo $d['id_barang']; ?>">
                        <input type="text" name="kd_barang" value="<?php echo $d['kd_barang']; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td><input type="text" name="nama_barang" value="<?php echo $d['nama_barang']; ?>"></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="text" name="stok" value="<?php echo $d['stok']; ?>"></td>
                </tr>
                <tr>
                    <td>Harga Beli</td>
                    <td><input type="text" name="harga_beli" value="<?php echo $d['harga_beli']; ?>"></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td><input type="text" name="harga_jual" value="<?php echo $d['harga_jual']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="tombol" value="Ubah">
                        <a href="tampil_data.php">
                            <input type="button" name="tombol" value="Kembali">
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>
</body>
</html>