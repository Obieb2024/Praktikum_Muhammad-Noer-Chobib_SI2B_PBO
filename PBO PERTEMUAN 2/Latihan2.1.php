<?php

class Guru {
    var $Nama_nama = array("de", "ce", "ve", "re");
    var $Nama_guru;
    var $NIK;
    var $Jabatan;
    var $Alamat;
}

class Murid {
    var $Nama_siswa;
    var $NIS;
    var $Kelas;
    var $Alamat;
}

class Kurikulum {
    var $Tahun_akademik;
    var $sks_matkul;
}

class Mobil {
    var $jumlahRoda = 4;
    var $warna = "Merah";
    var $bahanBakar = "Pertamax";
    var $harga = 12000000;
    var $merek = 'A';

    public function statusHarga()
    {
        if ($this->harga > 5000000) {
            $status = 'Mahal';
        } else {
            $status = 'Murah';
        }
        return $status;
    }
}

$ObjekBMW = new Mobil; // ini adalah objek BMW dari class Mobil
$ObjekTesla = new Mobil; // ini adalah objek Tesla dari class Mobil
$ObjekAudi = new Mobil; // ini adalah objek Audi dari class Mobil

echo 'Merek Mobil : ' . $ObjekBMW ->merek;
echo '<br>';
echo 'Jumlah Roda : ' . $ObjekBMW->jumlahRoda;
echo '<br>';
echo 'Warna : ' . $ObjekBMW ->warna;
echo '<br>';
echo 'Bahan Bakar : ' . $ObjekBMW ->bahanBakar;
echo '<br>';
echo 'Harga : ' . $ObjekBMW ->harga;


?>