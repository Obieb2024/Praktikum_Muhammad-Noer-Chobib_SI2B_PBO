<?php
class Kendaraan
{
    public $jumlahRoda = 4;
    public $warna;
    public $bahanBakar = "Premium";
    public $harga = 10000000;
    public $merek;
    public $tahunPembuatan = 2004;

    public function statusHarga()
    {
        if ($this->harga > 50000000) {
            $status = "Harga Kendaraan Mahal";
        } else {
            $status = "Harga Kendaraan Murah";
        }
        return $status;
    }
    
    public function statusSubsidi()
    {
        if ($this->tahunPembuatan < 2005 && $this->bahanBakar == "Premium") {
            $status = "DAPAT SUBSIDI";
        } else {
            $status = "TIDAK DAPAT SUBSIDI";
        }
        return $status;
    }
    public function hargaSecondKendaraan()
    {
        $hargaBekas = $this->harga * 0.5; // Menggunakan harga 50% dari harga awal sebagai contoh
        return "Rp " . number_format($hargaBekas, 0, ',', '.');
    }
}

//instansiasi kelas
$ObjekKendaraan = new Kendaraan(); //pembuatan objek dari kelas
echo "Jumlah Roda : " . $ObjekKendaraan->jumlahRoda . "<br>"; //proses instansiasi pemanggilan variable
echo "Status Harga : " . $ObjekKendaraan->statusHarga(); //proses instansiasi/pemanggilan function dari kelas
echo "<br>";
echo "Status Subsidi : " . $ObjekKendaraan->statusSubsidi();
echo "<br>";
//Objek 1
//deklarasi objek dan instansiasi objek (berada di luar class)
$ObjekKendaraan1 = new Kendaraan;
//setting properties
$ObjekKendaraan1->harga=100000;
$ObjekKendaraan1->tahunPembuatan = 1999;
//instansiasi objek (pemanggilan method/function)
echo "Status Harga : " . $ObjekKendaraan1->statusHarga();
echo "<br>";
//Objek 2
//deklarasi objek dan instansiasi objek (berada di luar class)
$ObjekKendaraan2 = new Kendaraan;
//setting properties
$ObjekKendaraan2->bahanBakar = "Pertamax";
$ObjekKendaraan2->tahunPembuatan = 1999;
//instansiasi objek (pemanggilan method/function)
echo "<br>";
echo "Status BBM: " . $ObjekKendaraan2->statusSubsidi();
echo "<br>";
echo "Harga Bekas: " . $ObjekKendaraan2->hargaSecondKendaraan();
?>