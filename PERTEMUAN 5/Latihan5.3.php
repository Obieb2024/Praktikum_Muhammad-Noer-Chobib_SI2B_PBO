<?php

// Kelas induk atau superclass
class BangunDatar {
    public function luas() {
        // Metode ini akan di-override di setiap kelas anak
        return 0;
    }

    public function keliling() {
        // Metode ini akan di-override di setiap kelas anak
        return 0;
    }
}

//---

// Kelas anak Persegi
class Persegi extends BangunDatar {
    public $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function luas() {
        return $this->sisi * $this->sisi;
    }

    public function keliling() {
        return 4 * $this->sisi;
    }
}

//---

// Kelas anak Lingkaran
class Lingkaran extends BangunDatar {
    public $r;

    public function __construct($r) {
        $this->r = $r;
    }

    public function luas() {
        return M_PI * $this->r * $this->r;
    }

    public function keliling() {
        return 2 * M_PI * $this->r;
    }
}

//---

// Kelas anak PersegiPanjang
class PersegiPanjang extends BangunDatar {
    public $panjang;
    public $lebar;

    public function __construct($panjang, $lebar) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function luas() {
        return $this->panjang * $this->lebar;
    }

    public function keliling() {
        return 2 * ($this->panjang + $this->lebar);
    }
}

//---

// Kelas anak Segitiga
class Segitiga extends BangunDatar {
    public $alas;
    public $tinggi;

    public function __construct($alas, $tinggi) {
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }

    public function luas() {
        return 0.5 * $this->alas * $this->tinggi;
    }

    // Untuk keliling segitiga, biasanya butuh sisi lain,
    // tapi karena diagram hanya ada alas dan tinggi,
    // kita asumsikan ini segitiga siku-siku untuk contoh sederhana.
    public function keliling() {
        $sisiMiring = sqrt(($this->alas * $this->alas) + ($this->tinggi * $this->tinggi));
        return $this->alas + $this->tinggi + $sisiMiring;
    }
}

//---

// Main program untuk pengujian dan output
function main() {
    echo "<h3>Hasil Perhitungan Bangun Datar</h3>";
    echo "<hr>";

    // Buat objek dari setiap kelas
    $persegi = new Persegi(5);
    $lingkaran = new Lingkaran(7);
    $persegiPanjang = new PersegiPanjang(10, 6);
    $segitiga = new Segitiga(8, 6);

    // Tampilkan hasil untuk Persegi
    echo "<h4>Persegi</h4>";
    echo "Luas: " . $persegi->luas() . "<br>";
    echo "Keliling: " . $persegi->keliling() . "<br>";
    echo "<hr>";

    // Tampilkan hasil untuk Lingkaran
    echo "<h4>Lingkaran</h4>";
    echo "Luas: " . number_format($lingkaran->luas(), 2) . "<br>";
    echo "Keliling: " . number_format($lingkaran->keliling(), 2) . "<br>";
    echo "<hr>";

    // Tampilkan hasil untuk Persegi Panjang
    echo "<h4>Persegi Panjang</h4>";
    echo "Luas: " . $persegiPanjang->luas() . "<br>";
    echo "Keliling: " . $persegiPanjang->keliling() . "<br>";
    echo "<hr>";

    // Tampilkan hasil untuk Segitiga
    echo "<h4>Segitiga (Diasumsikan siku-siku)</h4>";
    echo "Luas: " . $segitiga->luas() . "<br>";
    echo "Keliling: " . $segitiga->keliling() . "<br>";
    echo "<hr>";
}

// Jalankan fungsi main
main();

?>