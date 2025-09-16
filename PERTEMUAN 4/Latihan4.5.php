<?php
class Kendaraan {
    private $merek;
    private $jmlRoda;
    private $harga;
    private $warna;
    private $bhnBakar;
    private $tahun;

    // Setter
    public function setMerek($merek) { $this->merek = $merek; }
    public function setJmlRoda($jmlRoda) { $this->jmlRoda = $jmlRoda; }
    public function setHarga($harga) { $this->harga = $harga; }
    public function setWarna($warna) { $this->warna = $warna; }
    public function setBhnBakar($bhnBakar) { $this->bhnBakar = $bhnBakar; }
    public function setTahun($tahun) { $this->tahun = $tahun; }

    // Getter
    public function getMerek() { return $this->merek; }
    public function getJmlRoda() { return $this->jmlRoda; }
    public function getHarga() { return $this->harga; }
    public function getWarna() { return $this->warna; }
    public function getBhnBakar() { return $this->bhnBakar; }
    public function getTahun() { return $this->tahun; }

    // Method tambahan untuk cek subsidi
    public function getSubsidi() {
        if ($this->bhnBakar == "Premium") {
            return "Dapat Subsidi";
        } else {
            return "Tidak Dapat Subsidi";
        }
    }

    // Method tambahan untuk hitung harga second
    public function hargaSecond() {
        $umur = date("Y") - $this->tahun;
        $penurunan = $umur * 0.1 * $this->harga; // turunan 10% per tahun
        $hargaSecond = $this->harga - $penurunan;
        return $hargaSecond > 0 ? $hargaSecond : 0;
    }
}

// ==============================
// Data kendaraan dalam array
// ==============================
$Data1 = [
    'merek' => 'Toyota',
    'jmlRoda' => 4,
    'harga' => 200000000,
    'warna' => 'Hitam',
    'bhnBakar' => 'Premium',
    'tahun' => 2018
];