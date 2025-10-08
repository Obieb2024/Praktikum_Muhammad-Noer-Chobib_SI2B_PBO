<?php

/**
 * Mendefinisikan kelas exception kustom untuk menangani error validasi email.
 * Kelas ini mewarisi (extends) dari kelas Exception bawaan PHP.
 */
class emailValidationException extends Exception {
    /**
     * Fungsi untuk membuat pesan error yang lebih detail dan terformat.
     * @return string Pesan error yang berisi informasi file, baris, dan penyebab error.
     */
    public function getCustomErrorMessage() {
        // Membuat format pesan error yang informatif
        // basename() digunakan agar path file lebih pendek dan rapi
        $errorMsg = 'Error caught on line ' . $this->getLine() . ' in ' . basename($this->getFile()) 
        . ':<br><b>' . $this->getMessage() . '</b> tidak memenuhi kriteria (tidak mengandung kata "lab4/lab5" dan/atau format tidak valid).';
        return '<p style="color:red;">' . $errorMsg . '</p>';
    }
}

// -----------------------------------------------------------------------------

// 1. Data email yang akan divalidasi dimasukkan ke dalam array
$emails = [
    "lab4a@polsub.ac.id",
    "lab4b@polsub.ac.id",
    "lab4c@polsub.ac.id",
    "lab4d@polsub.ac.id",
    "lab5a@polsub.ac.id",
    "lab5b@polsub.ac.id",
    "lab5c@polsub.ac.id",
    "someone@example.com",     // Format valid, tapi tidak mengandung kata kunci
    "ini-bukan-email",         // Format tidak valid
    "lab4-tapi-error@.co.id"   // Format tidak valid
];

// Inisialisasi variabel untuk menghitung email
$validCount = 0;
$invalidCount = 0;
$lab4Count = 0;
$lab5Count = 0;

echo "<h2>Hasil Pengecekan dan Validasi Email</h2>";

// 2. Melakukan pengecekan dan validasi menggunakan perulangan
foreach ($emails as $email) {
    try {
        // Melakukan validasi di dalam blok try
        // Kondisi GAGAL jika:
        // 1. Format email tidak valid (filter_var mengembalikan false)
        // ATAU
        // 2. Email TIDAK mengandung 'lab4' DAN TIDAK mengandung 'lab5'
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE || (strpos($email, 'lab4') === FALSE && strpos($email, 'lab5') === FALSE)) {
            // Jika validasi gagal, lemparkan exception kustom dengan email sebagai pesannya
            throw new emailValidationException($email);
        }

        // Jika kode sampai di sini, berarti email valid
        $validCount++;
        
        // Pengecekan tambahan untuk menghitung jenis email yang valid
        if (strpos($email, 'lab4') !== FALSE) {
            $lab4Count++;
            echo "$email <b>mengandung kata 'lab4'</b> dan E-mail valid ✅<br>";
        } elseif (strpos($email, 'lab5') !== FALSE) {
            $lab5Count++;
            echo "$email <b>mengandung kata 'lab5'</b> dan E-mail valid ✅<br>";
        }

    } catch (emailValidationException $e) {
        // Menangkap exception yang dilemparkan
        $invalidCount++;
        // Menampilkan pesan error kustom dari objek exception
        echo $e->getCustomErrorMessage();
    }
}

// 3. Menampilkan hasil hitung counting email
echo "<hr><h3>Ringkasan Hasil</h3>";
echo "Total Email Valid: <b>$validCount</b><br>";
echo "Total Email Tidak Valid: <b>$invalidCount</b><br>";
echo "<br>";
echo "Terdapat <b>$lab4Count email</b> yang termasuk kategori lab-4.<br>";
echo "Terdapat <b>$lab5Count email</b> yang termasuk kategori lab-5.<br>";

?>