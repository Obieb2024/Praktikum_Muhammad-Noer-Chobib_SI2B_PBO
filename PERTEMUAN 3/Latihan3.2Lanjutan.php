<?php

class Kendaraan
{
    var $merek;
    var $jmlRoda;
    var $harga;
    var $warna;
    var $bhnBakar;
    var $tahun;

    function setMerek($x)
    {
        $this->merek = $x;
    }

    function setHarga($x)
    {
        $this->harga = $x;
    }

    function setJmlroda($x)
    {
        $this->jmlRoda = $x;
    }

    function setWarna($x)
    {
        $this->warna = $x;
    }

    function setbhnBakar($x)
    {
        $this->bhnBakar = $x;
    }

    function setTahun($x)
    {
        $this->tahun = $x;
    }
}

// Objek 1
$kendaraan1 = new Kendaraan();
$kendaraan1->setMerek('Toyota Yaris');
$kendaraan1->setJmlroda(4);
$kendaraan1->setHarga(160000000);
$kendaraan1->setWarna('Merah');
$kendaraan1->setbhnBakar('Premium');
$kendaraan1->setTahun(2005);

// Objek 2
$kendaraan2 = new Kendaraan();
$kendaraan2->setMerek('Honda Scoopy');
$kendaraan2->setJmlroda(2);
$kendaraan2->setHarga(13000000);
$kendaraan2->setWarna('Putih');
$kendaraan2->setbhnBakar('Premium');
$kendaraan2->setTahun(2004);

// Objek 3
$kendaraan3 = new Kendaraan();
$kendaraan3->setMerek('Isuzu Panther');
$kendaraan3->setJmlroda(4);
$kendaraan3->setHarga(170000000);
$kendaraan3->setWarna('Hitam');
$kendaraan3->setbhnBakar('Solar');
$kendaraan3->setTahun(2003);

echo "Kendaraan 1<br>";
echo "Merek = " . $kendaraan1->merek . "<br>";
echo "Jumlah Roda = " . $kendaraan1->jmlRoda . "<br>";
echo "Harga = " . $kendaraan1->harga . "<br>";
echo "Warna = " . $kendaraan1->warna . "<br>";
echo "Bahan Bakar = " . $kendaraan1->bhnBakar . "<br>";
echo "Tahun = " . $kendaraan1->tahun . "<br><br>";

echo "Kendaraan 2<br>";
echo "Merek = " . $kendaraan2->merek . "<br>";
echo "Jumlah Roda = " . $kendaraan2->jmlRoda . "<br>";
echo "Harga = " . $kendaraan2->harga . "<br>";
echo "Warna = " . $kendaraan2->warna . "<br>";
echo "Bahan Bakar = " . $kendaraan2->bhnBakar . "<br>";
echo "Tahun = " . $kendaraan2->tahun . "<br><br>";

echo "Kendaraan 3<br>";
echo "Merek = " . $kendaraan3->merek . "<br>";
echo "Jumlah Roda = " . $kendaraan3->jmlRoda . "<br>";
echo "Harga = " . $kendaraan3->harga . "<br>";
echo "Warna = " . $kendaraan3->warna . "<br>";
echo "Bahan Bakar = " . $kendaraan3->bhnBakar . "<br>";
echo "Tahun = " . $kendaraan3->tahun . "<br>";

?>