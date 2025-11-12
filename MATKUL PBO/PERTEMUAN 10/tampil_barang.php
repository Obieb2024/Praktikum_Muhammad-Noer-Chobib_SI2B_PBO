<?php 
session_start();
if($_SESSION['status'] != "login"){
    header("location:login.php?pesan=belum_login");
    exit;
}

include('koneksi.php'); // <-- INI DIA TITIK KOMA YANG HILANG
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
    <style>
        /* CSS Sederhana untuk tampilan bersih */
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; vertical-align: middle; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 4px; color: white; display: inline-block; margin: 2px; }
        .btn-tambah { background-color: #007BFF; }
        .btn-print { background-color: #17a2b8; }
        .btn-edit { background-color: #28a745; }
        .btn-hapus { background-color: #dc3545; }
        .search-form { margin-bottom: 15px; }
        img { display: block; max-width: 100px; max-height: 100px; border-radius: 4px; }
        .action-cell { width: 100px; text-align: center; }
        .image-cell { width: 120px; text-align: center; }
    </style>
</head>
<body>
    <a href="index.php"> &lt;&lt; Kembali ke Menu Utama</a>
    <h3>Data Barang Elektronik</h3>

    <form method="get" action="tampil_barang.php" class="search-form">
        <input type="text" name="Cari" placeholder="Cari Nama Barang" value="<?php echo isset($_GET['Cari']) ? $_GET['Cari'] : ''; ?>">
        <input type="submit" value="Cari">
    </form>

    <a href="tambah_barang.php" class="btn btn-tambah">Tambah Data</a>
    <a href="cetak_barang.php" target="_blank" class="btn btn-print">Print Data Barang</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Barang</th>
                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th class="image-cell">Gambar</th>
                <th class="action-cell">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            if(!empty($data_barang)) {
                foreach($data_barang as $row){
                    // Format harga
                    $harga_beli_formatted = "Rp. " . number_format($row['harga_beli'], 0, ',', '.');
                    $harga_jual_formatted = "Rp. " . number_format($row['harga_jual'], 0, ',', '.');
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['kd_barang']; ?></td>
                    <td><?php echo $row['nama_barang']; ?></td>
                    <td><?php echo $row['stok']; ?></td>
                    <td><?php echo $harga_beli_formatted; ?></td>
                    <td><?php echo $harga_jual_formatted; ?></td>
                    <td class="image-cell">
                        <?php 
                        // INILAH FIX UNTUK MENAMPILKAN GAMBAR
                        // Cek jika nama file gambar ada dan file-nya ada di folder 'gambar'
                        if(!empty($row['gambar_produk']) && file_exists('gambar/'.$row['gambar_produk'])){
                            echo '<img src="gambar/' . $row['gambar_produk'] . '" alt="Gambar Produk">';
                        } else {
                            echo 'Tidak Ada Gambar';
                        }
                        ?>
                    </td>
                    <td class="action-cell">
                        <a href="edit_barang.php?id_barang=<?php echo $row['id_barang']; ?>" class="btn btn-edit">Edit</a>
                        <a href="proses_barang.php?action=delete&id_barang=<?php echo $row['id_barang']; ?>" class="btn btn-hapus" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='8' style='text-align:center;'>Data tidak ditemukan</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>