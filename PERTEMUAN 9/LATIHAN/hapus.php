<?php
// 1. Sertakan file koneksi
include 'koneksi.php';

// 2. Cek apakah ID ada di URL dan tidak kosong
if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    // 3. Ambil ID dari URL
    $id = $_GET['id'];

    // 4. Siapkan query (SQL) menggunakan placeholder (?)
    // Ini adalah 'template' yang aman
    $sql = "DELETE FROM table_user WHERE id = ?";

    // 5. Siapkan statement menggunakan koneksi
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        // 6. Bind (ikat) variabel $id ke placeholder (?)
        // "i" berarti $id diperlakukan sebagai Tipe Integer
        mysqli_stmt_bind_param($stmt, "i", $id);

        // 7. Eksekusi statement
        if (mysqli_stmt_execute($stmt)) {
            // Berhasil dihapus, alihkan ke halaman index
            header("location:index.php?pesan=hapus");
            exit(); // Penting! Hentikan eksekusi skrip
        } else {
            // Gagal eksekusi (misal, ada error database)
            echo "Error: Gagal menghapus data. " . mysqli_error($koneksi);
        }

        // 8. Tutup statement
        mysqli_stmt_close($stmt);

    } else {
        // Gagal menyiapkan statement
        echo "Error: Gagal menyiapkan query. " . mysqli_error($koneksi);
    }
} else {
    // Jika tidak ada ID di URL
    echo "Error: ID tidak ditemukan di URL.";
    // Arahkan kembali ke index dengan pesan gagal
    // header("location:index.php?pesan=gagal_hapus");
    // exit();
}

// 9. Tutup koneksi
mysqli_close($koneksi);
?>