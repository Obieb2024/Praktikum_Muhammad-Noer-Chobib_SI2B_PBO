<?php
session_start();
if($_SESSION['status'] != "login"){
    header("location:login.php?pesan=belum_login");
    exit;
}

include('koneksi.php');
$db = new database();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Barang</title>
</head>
<body onload="window.print()"> <h2>LAPORAN DATA BARANG CV JAYA</h2>
    <table width="100%" border="1" style="border-collapse: collapse;">
        <tr>
            <th width="5%">No</th>
            <th width="15%">Kode Barang</th>
            <th width="25%">Barang</th>
            <th width="10%">Stok</th>
            <th width="15%">Harga Beli</th>
            <th width="15%">Harga Jual</th>
            <th width="15%">Keuntungan</th>
        </tr>

        <?php
        $data_barang = $db->tampil_data();
        $no = 1; 
        foreach ($data_barang as $row) {
        ?>
            <tr>
                <td style="text-align: center;"><?php echo $no++; ?></td>
                <td><?php echo $row['kd_barang']; ?></td>
                <td><?php echo $row['nama_barang']; ?></td>
                <td style="text-align: center;"><?php echo $row['stok']; ?></td>
                <td style="text-align: right;">Rp. <?php echo number_format($row['harga_beli']); ?></td>
                <td style="text-align: right;">Rp. <?php echo number_format($row['harga_jual']); ?></td>
                <td style="text-align: right;">Rp. <?php echo number_format($row['harga_jual'] - $row['harga_beli']); ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>