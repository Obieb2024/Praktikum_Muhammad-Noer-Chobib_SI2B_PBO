<?php

class Kendaraan
{
    public $harga;
    public $bahanBakar;
    public $tahunPembuatan;
    public $platNomor;

    public function __construct($harga, $bahanBakar, $tahunPembuatan, $platNomor)
    {
        $this->harga = $harga;
        $this->bahanBakar = $bahanBakar;
        $this->tahunPembuatan = $tahunPembuatan;
        $this->platNomor = $platNomor;
    }

    public function getStatusHarga()
    {
        if ($this->harga > 50000000) {
            return "Mahal";
        } else {
            return "Murah";
        }
    }

    public function getStatusBBM()
    {
        if ($this->bahanBakar == "Premium" && $this->tahunPembuatan < 2005) {
            return "Mendapat Subsidi";
        } else {
            return "Tidak Mendapat Subsidi";
        }
    }

    public function getHargaBekas()
    {
        $hargaBekas = 0;
        if ($this->tahunPembuatan > 2005) {
            $hargaBekas = $this->harga * 0.8; // Turun 20%
        } elseif ($this->tahunPembuatan >= 2000 && $this->tahunPembuatan <= 2005) {
            $hargaBekas = $this->harga * 0.7; // Turun 30%
        } elseif ($this->tahunPembuatan < 2000) {
            $hargaBekas = $this->harga * 0.6; // Turun 40%
        }
        return $hargaBekas;
    }

    public function getJumlahPajak()
    {
        if ($this->tahunPembuatan <= 2017) {
            return $this->harga * 0.025; // 2.5% dari harga
        } else {
            return 0; // Tidak ada pajak jika tahun di atas 2017
        }
    }

    public function getHariOperasi()
    {
        $nomorTerakhir = (int) substr($this->platNomor, -1);
        if ($nomorTerakhir % 2 == 0) { // Genap
            return "Selasa, Kamis, Sabtu";
        } else { // Ganjil
            return "Senin, Rabu, Jumat, Minggu";
        }
    }
}

// Buat objek kendaraan dengan data yang relevan
// Contoh data: harga 50.000.000, Premium, tahun 2004, plat nomor genap
$mobil = new Kendaraan(50000000, "Premium", 2004, "B 1234 A");

echo "Status Harga: " . $mobil->getStatusHarga() . "<br>";
echo "Status BBM: " . $mobil->getStatusBBM() . "<br>";
echo "Harga Bekas: " . number_format($mobil->getHargaBekas(), 0, ',', '.') . "<br>";
echo "Jumlah Pajak: " . number_format($mobil->getJumlahPajak(), 0, ',', '.') . "<br>";
echo "Hari Operasi: " . $mobil->getHariOperasi() . "<br>";

?>