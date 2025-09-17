<?php
class Warung {
    public $namaBarang;
    public $harga;

    public function __construct ($namaBarang, $harga) {
        $this ->namaBarang = $namaBarang;
        $this ->harga = $harga;
    }
    public function informasi() {
        echo "Barang : $this->namaBarang, Harga : $this->harga <br>";
    }
}

class Warung2 extends Warung {
    public $exp;

    public function __construct($namaBarang, $harga, $exp) {
        parent ::__construct($namaBarang, $harga);
        $this->exp = $exp;
    }
    //overriding
    public function informasi(){
        echo "Barang2 : $this->namaBarang, Harga : $this->harga, Kadaluarsa : $this->exp <br>";
    }
}

//overloading
class Warung3 {
    public function __call($namaBarang, $jokowi){
        if ($namaBarang == "total") {
            if (count($jokowi) == 1) {
                return $jokowi[0];
            }
            else if (count($jokowi) == 2) {
                return $jokowi[0]* $jokowi[1];
            }
            else {
                return 0;
            }
        }
    }
}


$barang1 = new Warung("Susu kotak", 6000);
$barang1 -> informasi();

$barang2 = new Warung2("Bakso Pentol", 10000, "28-08-2025");
$barang2-> informasi();

$barang3 = new Warung3();
echo "Harga Indomie setelah diskon : Rp. " . $barang3->total(4000) . "<br>";
echo "Harga Telur : Rp. " . $barang3->total(2000, 5)
?>