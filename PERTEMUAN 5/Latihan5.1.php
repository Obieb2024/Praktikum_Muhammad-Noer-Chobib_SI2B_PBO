<?php

// Kelas induk atau superclass bernama 'manusia'
class manusia {
    public $nama_saya;

    // Metode untuk memberikan nama pada properti $nama_saya
    public function berinama($saya) {
        $this->nama_saya = $saya;
    }
}

//---

// Kelas turunan atau subclass bernama 'teman', yang mewarisi dari 'manusia'
class teman extends manusia {
    public $nama_teman;

    // Metode unik untuk kelas 'teman'
    public function berinamateman($teman) {
        $this->nama_teman = $teman;
    }
}

//---

// Instansiasi kelas 'teman' untuk membuat objek baru
$objectteman = new teman();

// Menggunakan metode dari kelas induk (manusia)
// Ini menunjukkan bahwa kelas 'teman' mewarisi metode 'berinama'
$objectteman->berinama("Dika");

// Menggunakan metode dari kelas turunan (teman)
$objectteman->berinamateman("Andra");

//---

// Menampilkan properti yang telah diisi
echo "Nama Saya: " . $objectteman->nama_saya . "<br>";
echo "Nama Teman Saya: " . $objectteman->nama_teman . "<br>";

?>