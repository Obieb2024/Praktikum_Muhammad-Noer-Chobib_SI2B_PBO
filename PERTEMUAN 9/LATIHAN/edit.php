<!DOCTYPE html>
<html>
<head>
    <title>Edit Data - CRUD PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="judul">
        <h1>Membuat CRUD Dengan PHP Dan MySQL</h1>
        <h2>Edit Data User</h2>
    </div>

    <nav class="menu">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Data Master</a></li> 
                <li>
                    <a href="#">Data Transaksi</a>
                    <ul> 
                        <li><a href="#">Transaksi Pembelian</a></li>
                        <li><a href="#">Transaksi Penjualan</a></li>
                    </ul>
                </li>
                <li><a href="#">Laporan</a></li> 
            </ul>
        </div>
    </nav>
    <div class="container">
        <a href="index.php" class="tombol">Kembali</a>
        <br/>
        <h3>Edit data</h3>

        <?php 
        include "koneksi.php";
        $id = $_GET['id'];
        $query_mysql = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
        if($data = mysqli_fetch_assoc($query_mysql)){
        ?>

        <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            
            <div class="form-grup" style="margin-bottom: 15px;">
                <label for="nama" style="display: block; margin-bottom: 5px; font-weight: 600;">Nama</label>
                <input type="text" name="nama" id="nama" value="<?php echo $data['nama']; ?>" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-grup" style="margin-bottom: 15px;">
                <label for="alamat" style="display: block; margin-bottom: 5px; font-weight: 600;">Alamat</label>
                <input type="text" name="alamat" id="alamat" value="<?php echo $data['alamat']; ?>" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-grup" style="margin-bottom: 15px;">
                <label for="pekerjaan" style="display: block; margin-bottom: 5px; font-weight: 600;">Pekerjaan</label>
                <input type="text" name="pekerjaan" id="pekerjaan" value="<?php echo $data['pekerjaan']; ?>" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-grup">
                <input type="submit" value="Update" class="tombol" style="background-color: var(--primary-color); color: white; border: none; cursor: pointer;">
            </div>
        </form>
        
        <?php 
        } else {
            echo "<p>Data tidak ditemukan.</p>";
        }
        ?>
    </div>
</body>
</html>