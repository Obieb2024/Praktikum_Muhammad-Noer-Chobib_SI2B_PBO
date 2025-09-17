<?php

require_once 'Employee.php';

class Programmer extends Employee {
    public function hitungBonus() {
        $gaji = $this->gajiDasar;

        if ($this->masaKerja < 1) {
            return 0; // Tidak ada bonus
        } elseif ($this->masaKerja >= 1 && $this->masaKerja <= 10) {
            return 0.01 * $this->masaKerja * $gaji;
        } elseif ($this->masaKerja > 10) {
            return 0.02 * $this->masaKerja * $gaji;
        }
    }

    public function hitungTotalGaji() {
        return $this->gajiDasar + $this->hitungBonus();
    }
}

require_once 'Employee.php';

class Direktur extends Employee {
    public function hitungBonus() {
        return 0.5 * $this->masaKerja * $this->gajiDasar;
    }

    public function hitungTunjangan() {
        return 0.1 * $this->masaKerja * $this->gajiDasar;
    }

    public function hitungTotalGaji() {
        return $this->gajiDasar + $this->hitungBonus() + $this->hitungTunjangan();
    }
}
require_once 'Employee.php';

class PegawaiMingguan extends Employee {
    private $hargaBarang;
    private $stockBarang;
    private $totalPenjualan;

    public function __construct($masaKerja, $hargaBarang, $stockBarang, $totalPenjualan) {
        parent::__construct($masaKerja);
        $this->hargaBarang = $hargaBarang;
        $this->stockBarang = $stockBarang;
        $this->totalPenjualan = $totalPenjualan;
    }

    public function hitungBonus() {
        $persentasePenjualan = ($this->totalPenjualan / $this->stockBarang) * 100;

        if ($persentasePenjualan > 70) {
            return 0.10 * $this->hargaBarang * $this->totalPenjualan;
        } else {
            return 0.03 * $this->hargaBarang * $this->totalPenjualan;
        }
    }
    
    public function hitungTotalGaji() {
        return $this->gajiDasar + $this->hitungBonus();
    }
}


function tampilkanOutputProgrammer($masaKerja, $gajiDasar, $bonus, $total) {
    echo "<h3>Masa Kerja: " . $masaKerja . " tahun</h3>";
    echo "Gaji Pokok: Rp " . number_format($gajiDasar, 0, ',', '.') . "<br>";
    echo "Bonus: Rp " . number_format($bonus, 0, ',', '.') . "<br>";
    echo "Total Gaji: Rp " . number_format($total, 0, ',', '.') . "<br><br>";

}

function tampilkanOutputDirektur($tipeKaryawan, $gaji, $bonus, $tunjangan, $total) {
    echo "<h3>$tipeKaryawan</h3>";
    echo "Gaji Pokok: Rp " . number_format($gaji, 0, ',', '.') . "<br>";
    echo "Bonus: Rp " . number_format($bonus, 0, ',', '.') . "<br>";
    echo "Tunjangan: Rp " . number_format($tunjangan, 0, ',', '.') . "<br>";
    echo "Total Gaji: Rp " . number_format($total, 0, ',', '.') . "<br><br>";
}
// Skenario 1: Masa kerja di bawah 1 tahun
$programmer1 = new Programmer(0.5); // 6 bulan
tampilkanOutputProgrammer(
    $programmer1->getMasaKerja(),
    $programmer1->getGajiDasar(),
    $programmer1->hitungBonus(),
    $programmer1->hitungTotalGaji()
);

// Skenario 2: Masa kerja antara 1 - 10 tahun
$programmer2 = new Programmer(5); // 5 tahun
tampilkanOutputProgrammer(
    $programmer2->getMasaKerja(),
    $programmer2->getGajiDasar(),
    $programmer2->hitungBonus(),
    $programmer2->hitungTotalGaji()
);

// Skenario 3: Masa kerja di atas 10 tahun
$programmer3 = new Programmer(12); // 12 tahun
tampilkanOutputProgrammer(
    $programmer3->getMasaKerja(),
    $programmer3->getGajiDasar(),
    $programmer3->hitungBonus(),
    $programmer3->hitungTotalGaji()
);

// 2. Direktur (kode yang diperbarui)
$direktur = new Direktur(15);
tampilkanOutputDirektur(
    "Gaji Direktur (15 tahun)",
    $direktur->getGajiDasar(),
    $direktur->hitungBonus(),
    $direktur->hitungTunjangan(),
    $direktur->hitungTotalGaji()
);

// 3. Pegawai Mingguan (kode sebelumnya)
$pegawai1 = new PegawaiMingguan(1, 50000, 250, 200);
echo "<h3>Gaji Pegawai Mingguan (Penjualan > 70%)</h3>";
echo "Gaji Pokok: Rp " . number_format($pegawai1->getGajiDasar(), 0, ',', '.') . "<br>";
echo "Bonus: Rp " . number_format($pegawai1->hitungBonus(), 0, ',', '.') . "<br>";
echo "Total Gaji: Rp " . number_format($pegawai1->hitungTotalGaji(), 0, ',', '.') . "<br><br>";

$pegawai2 = new PegawaiMingguan(1, 50000, 250, 150);
echo "<h3>Gaji Pegawai Mingguan (Penjualan <= 70%)</h3>";
echo "Gaji Pokok: Rp " . number_format($pegawai2->getGajiDasar(), 0, ',', '.') . "<br>";
echo "Bonus: Rp " . number_format($pegawai2->hitungBonus(), 0, ',', '.') . "<br>";
echo "Total Gaji: Rp " . number_format($pegawai2->hitungTotalGaji(), 0, ',', '.') . "<br><br>";

?>