<!DOCTYPE html>
<html>
<head>
    <title>Input Data Baru - CRUD PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="judul">
        <h1>Membuat CRUD Dengan PHP Dan MySQL</h1>
        <h2>Input Data Baru</h2>
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

        <h3>Input data baru</h3>
        <form action="input-aksi.php" method="post">
            <div class="form-grup" style="margin-bottom: 15px;">
                <label for="nama" style="display: block; margin-bottom: 5px; font-weight: 600;">Nama</label>
                <input type="text" name="nama" id="nama" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-grup" style="margin-bottom: 15px;">
                <label for="alamat" style="display: block; margin-bottom: 5px; font-weight: 600;">Alamat</label>
                <input type="text" name="alamat" id="alamat" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-grup" style="margin-bottom: 15px;">
                <label for="pekerjaan" style="display: block; margin-bottom: 5px; font-weight: 600;">Pekerjaan</label>
                <input type="text" name="pekerjaan" id="pekerjaan" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-grup">
                <input type="submit" value="Simpan" class="tombol" style="background-color: var(--primary-color); color: white; border: none; cursor: pointer;">
            </div>
        </form>
    </div>
</body>
</html>