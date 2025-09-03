<?php

class Pembayaran
{
    private $kartuMember;
    private $totalBelanja;
    private $diskon;
    private $totalBayar;

    public function __construct($punyaKartuMember, $belanjaan)
    {
        $this->kartuMember = $punyaKartuMember;
        $this->totalBelanja = $belanjaan;
        $this->diskon = 0;
        $this->totalBayar = 0;
    }

    public function hitungDiskon()
    {
        if ($this->kartuMember) {
            if ($this->totalBelanja >= 500000) {
                $this->diskon = 50000;
            } elseif ($this->totalBelanja >= 100000) {
                $this->diskon = 15000;
            } else {
                $this->diskon = 5000;
            }
        } else {
            // Jika tidak memiliki kartu member
            if ($this->totalBelanja >= 90000) {
                $this->diskon = 0; // Sesuai dengan tabel, diskon tetap 0
            }
        }
    }

    public function hitungTotalBayar()
    {
        $this->totalBayar = $this->totalBelanja - $this->diskon;
    }
    
    public function tampilkanHasil()
    {
        $statusKartu = $this->kartuMember ? "ya" : "tidak";
        
        echo "Apakah ada kartu member: " . $statusKartu . "<br>";
        echo "Total belanjaan: " . number_format($this->totalBelanja, 0, ',', '.') . "<br>";
        echo "Total Bayar: Rp " . number_format($this->totalBayar, 0, ',', '.') . "<br>";
    }
}

// Contoh penggunaan
// Pembeli 1: Memiliki kartu, total belanja 334000
$pembelian1 = new Pembayaran(true, 334000);
$pembelian1->hitungDiskon();
$pembelian1->hitungTotalBayar();
$pembelian1->tampilkanHasil();

echo "<br>";

// Pembeli 2: Tidak memiliki kartu, total belanja 90000
$pembelian2 = new Pembayaran(false, 90000);
$pembelian2->hitungDiskon();
$pembelian2->hitungTotalBayar();
$pembelian2->tampilkanHasil();