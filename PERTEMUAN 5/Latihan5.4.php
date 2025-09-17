<?php

// Mengimpor kelas induk dari file terpisah
require_once 'class-kendaraan.php';

// Kelas 'pesawat' yang mewarisi dari kelas 'kendaraan'
class pesawat extends kendaraan {
    // Properti privat untuk memastikan hanya kelas ini yang bisa mengaksesnya secara langsung
    private $tinggiMaks;
    private $kecepatanMaks;
    private $harga;
    private $merek;

    // Konstruktor untuk inisialisasi properti saat objek dibuat
    public function __construct($merek, $harga) {
        $this->merek = $merek;
        $this->harga = $harga;
    }

    // Metode untuk mengatur properti privat 'tinggiMaks'
    public function setTinggiMaks($tinggi) {
        $this->tinggiMaks = $tinggi;
    }

    // Metode untuk mengatur properti privat 'kecepatanMaks'
    public function setKecepatanMaks($kecepatan) {
        $this->kecepatanMaks = $kecepatan;
    }

    // Metode untuk mengakses (membaca) properti privat 'tinggiMaks'
    public function bacaTinggiMaks() {
        return $this->tinggiMaks;
    }

    // Metode untuk menghitung biaya operasional berdasarkan aturan yang diberikan
    public function biayaOperasional() {
        $biaya = 0;
        
        // Aturan pertama
        if ($this->tinggiMaks < 3000 && $this->kecepatanMaks < 500) {
            $biaya = 0.05 * $this->harga;
        } 
        // Aturan kedua
        elseif ($this->tinggiMaks >= 3000 && $this->tinggiMaks <= 5000 && $this->kecepatanMaks >= 500 && $this->kecepatanMaks <= 800) {
            $biaya = 0.20 * $this->harga;
        } 
        // Aturan ketiga
        elseif ($this->tinggiMaks > 5000 && $this->kecepatanMaks > 800) {
            $biaya = 0.30 * $this->harga;
        }

        return $biaya;
    }
    
    // Metode tambahan untuk mendapatkan merek dan harga
    public function getMerek() {
        return $this->merek;
    }
    
    public function getHarga() {
        return $this->harga;
    }
}

// Data pesawat dari tabel
$dataPesawat = [
    ['merek' => 'Boeing 737', 'harga' => 2000000000, 'tinggi' => 7500, 'kecepatan' => 650],
    ['merek' => 'Boeing 747', 'harga' => 3500000000, 'tinggi' => 5800, 'kecepatan' => 750],
    ['merek' => 'Cassa', 'harga' => 750000000, 'tinggi' => 3500, 'kecepatan' => 500]
];

// Loop untuk memproses setiap data pesawat
foreach ($dataPesawat as $pesawatData) {
    // Membuat objek baru dari kelas pesawat
    $pesawat = new pesawat($pesawatData['merek'], $pesawatData['harga']);
    
    // Mengatur properti privat menggunakan metode set
    $pesawat->setTinggiMaks($pesawatData['tinggi']);
    $pesawat->setKecepatanMaks($pesawatData['kecepatan']);
    
    // Menghitung biaya operasional
    $biaya = $pesawat->biayaOperasional();
    
    // Menampilkan output sesuai format yang diminta
    echo "Biaya operasional pesawat " . $pesawat->getMerek() . " dengan harga Rp " . number_format($pesawat->getHarga(), 0, ',', '.') . " yang memiliki tinggi maksimum " . $pesawat->bacaTinggiMaks() . " feet dan kecepatan maksimum " . $pesawatData['kecepatan'] . " km/jam adalah Rp " . number_format($biaya, 0, ',', '.') . "<br>";
}

?>