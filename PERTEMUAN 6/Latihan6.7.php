<?php

// Membuat class Karyawan
class Karyawan {
    // Properti private untuk menyimpan data karyawan
    private $nama;
    private $golongan;
    private $jamLembur;

    // Daftar Gaji Pokok berdasarkan Golongan
    private $gajiPokokList = [
        "Ib" => 1250000, "IIa" => 2000000, "IIIa" => 2400000,
        "Ic" => 1300000, "IIb" => 2100000, "IIIb" => 2500000,
        "Id" => 1350000, "IIc" => 2200000, "IIIc" => 2600000,
        "IId" => 2300000, "IIId" => 2700000,
        "IVa" => 2800000, "IVb" => 2900000,
        "IVc" => 3000000, "IVd" => 3100000
    ];
    
    const UPAH_LEMBUR_PER_JAM = 15000;

    public function __construct($nama, $golongan, $jamLembur) {
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->jamLembur = $jamLembur;
    }

    public function getNama() {
         return $this->nama; }
    public function getGolongan() { 
        return $this->golongan; }
    public function getJamLembur() { 
        return $this->jamLembur; }

    public function getGajiPokok() {
        return $this->gajiPokokList[$this->golongan] ?? 0;
    }

    public function getGajiLembur() {
        return $this->jamLembur * self::UPAH_LEMBUR_PER_JAM;
    }

    public function getTotalGaji() {
        return $this->getGajiPokok() + $this->getGajiLembur();
    }
}

// Data karyawan dalam array
$dataKaryawan = [
    ["nama" => "Winny",     "golongan" => "IIb",  "lembur" => 30],
    ["nama" => "Stevany",   "golongan" => "IIIc", "lembur" => 32],
    ["nama" => "Alfred",    "golongan" => "IVb",  "lembur" => 30],
    ["nama" => "Ferdinand", "golongan" => "IIIc", "lembur" => 40]
];

// Membuat objek dari data
$objekKaryawan = [];
foreach ($dataKaryawan as $data) {
    $objekKaryawan[] = new Karyawan($data['nama'], $data['golongan'], $data['lembur']);
}


// Format dibawah ini  : string, rata kanan, lebar 18
$format = "%-16s %-11s %-19s %18s\n";

// Menampilkan header
printf($format, "Nama Karyawan", "Golongan", "Total Jam Lembur", "Total Gaji");

// Menampilkan data baris per baris
foreach ($objekKaryawan as $karyawan) {
    $totalGajiKeseluruhan = number_format($karyawan->getTotalGaji(), 2, ',', '.');

    printf(
        $format, 
        $karyawan->getNama(), 
        $karyawan->getGolongan(), 
        $karyawan->getJamLembur(), 
        $totalGajiKeseluruhan
    );
}

?>