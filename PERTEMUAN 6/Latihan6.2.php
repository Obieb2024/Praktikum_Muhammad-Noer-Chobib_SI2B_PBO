<?php

/**
 * Class Segitiga untuk merepresentasikan objek segitiga
 * dan menghitung luasnya.
 */
class Segitiga
{
    // Menggunakan private untuk enkapsulasi, artinya properti ini
    // hanya bisa diakses dari dalam class itu sendiri.
    private float $tinggi;
    private float $alas; // Mengganti nama 'lebar' menjadi 'alas' agar lebih sesuai konteks.

    /**
     * Constructor untuk membuat objek Segitiga baru.
     *
     * @param float $tinggi Tinggi dari segitiga.
     * @param float $alas Alas dari segitiga.
     */
    public function __construct(float $tinggi, float $alas)
    {
        $this->tinggi = $tinggi;
        $this->alas = $alas;
    }

    /**
     * Menghitung dan mengembalikan nilai luas segitiga.
     * Fungsi ini hanya bertanggung jawab untuk menghitung, tidak untuk menampilkan.
     *
     * @return float Luas segitiga.
     */
    public function hitungLuas(): float
    {
        return ($this->alas * $this->tinggi) / 2;
    }

    /**
     * Mengembalikan nilai tinggi.
     * @return float
     */
    public function getTinggi(): float
    {
        return $this->tinggi;
    }

    /**
     * Mengembalikan nilai alas.
     * @return float
     */
    public function getAlas(): float
    {
        return $this->alas;
    }
}

// ---- Proses Penggunaan Class ----

// 1. Membuat objek (instance) baru dari class Segitiga
$segitiga = new Segitiga(200, 500);

// 2. Memanggil method untuk menghitung luas dan menyimpannya di variabel
$luas = $segitiga->hitungLuas();

// 3. Menampilkan informasi ke layar
echo "Tinggi Segitiga = " . $segitiga->getTinggi() . "<br/>";
echo "Alas Segitiga = " . $segitiga->getAlas() . "<br/>";
echo "<br/><b>Luas Segitiga = $luas</b>";

?>