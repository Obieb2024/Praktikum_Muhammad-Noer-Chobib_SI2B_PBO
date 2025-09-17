<?php

// Kelas induk atau superclass bernama 'manusia'
class manusia {
    public $nama;
    public $umur;
    public $gender;

    // Metode untuk sapaan
    public function bicara() {
        echo "Selamat Datang";
    }

    // Metode untuk menampilkan informasi lengkap
    public function getInfo() {
        echo "Nama: " . $this->nama . "<br>";
        echo "Umur: " . $this->umur . "<br>";
        echo "JK: " . $this->gender . "<br>";
    }
}

//---

// Kelas anak 'ayah' yang mewarisi dari 'manusia'
class ayah extends manusia {
    // Metode unik untuk kelas 'ayah'
    public function pekerjaan() {
        echo "Pegawai Negeri Sipil<br>";
    }
}

//---

// Kelas anak 'ibu' yang mewarisi dari 'manusia'
class ibu extends manusia {
    // Metode unik untuk kelas 'ibu'
    public function pekerjaan() {
        echo "Ibu Rumah Tangga<br>";
    }
}

//---

// Kelas anak 'anak' yang mewarisi dari 'manusia'
class anak extends manusia {
    // Metode unik untuk kelas 'anak'
    public function pekerjaan() {
        echo "Pelajar<br>";
    }
}

//---

// Instansiasi dan penggunaan objek ayah
$objekAyah = new ayah();
$objekAyah->nama = "Budi";
$objekAyah->gender = "Laki-Laki";
$objekAyah->umur = "45";

echo "<b>Info Ayah</b><br>";
$objekAyah->getInfo();
$objekAyah->pekerjaan();

echo "<br>";

// Instansiasi dan penggunaan objek ibu
$objekIbu = new ibu();
$objekIbu->nama = "Dini";
$objekIbu->gender = "Perempuan";
$objekIbu->umur = "38";

echo "<b>Info Ibu</b><br>";
$objekIbu->getInfo();
$objekIbu->pekerjaan();

echo "<br>";

// Instansiasi dan penggunaan objek anak
$objekAnak = new anak();
$objekAnak->nama = "Ardi";
$objekAnak->gender = "Laki-Laki";
$objekAnak->umur = "15";

echo "<b>Info Anak</b><br>";
$objekAnak->getInfo();
$objekAnak->pekerjaan();

?>