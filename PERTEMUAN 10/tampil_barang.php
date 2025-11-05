<?php 
session_start();
if($_SESSION['status'] != "login"){
    header("location:login.php?pesan=belum_login");
    exit;
}

include('koneksi.php');
$db = new database();

// Logika Studi Kasus 1: Pencarian
if(isset($_GET['Cari']) && !empty($_GET['Cari'])){
    $data_barang = $db->cari_data_barang($_GET['Cari']);
} else {
    // Tampilkan semua data jika tidak ada pencarian
    $data_barang = $db->tampil_data();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Data Barang</title>
</head>
<body>
    <a href="index.php"> &lt;&lt; Kembali ke Menu Utama</a>
    <h3>Data Barang Elektronik</h3>

    <form method="get" action="">
        <input type="text" name="Cari" placeholder="Cari Nama Barang" value="<?php echo isset($_GET['Cari']) ? $_GET['Cari'] : ''; ?>">
        <input type="submit" value="Cari">
    </form>
    <br>

    <a href="tambah_barang.php"><button>Tambah Data</button></a>
    <a href="cetak_barang.php" target="_blank"><button>Print Data Barang</button></a>
    <br/><br/>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Barang</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Action</th>
        </tr>
        <?php 
        $no = 1;
        if(!empty($data_barang)) {
            foreach($data_barang as $row){
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['kd_barang']; ?></td>
                <td><?php echo $row['nama_barang']; ?></td>
                <td><?php echo $row['stok']; ?></td>
                <td><?php echo $row['harga_beli']; ?></td>
                <td><?php echo $row['harga_jual']; ?></td>
                <td>
                    <a href="edit_barang.php?id_barang=<?php echo $row['id_barang']; ?>">Edit</a>
                    <a href="proses_barang.php?id_barang=<?php echo $row['id_barang']; ?>&action=delete" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    <a href="cetak_barang_satuan.php?id_barang=<?php echo $row['id_barang']; ?>" target="_blank">Print Satuan</a>
                </td>
            </tr>
        <?php 
            }
        } else {
            echo "<tr><td colspan='7'>Data tidak ditemukan</td></tr>";
        }
        ?>
    </table>
</body>
</html>