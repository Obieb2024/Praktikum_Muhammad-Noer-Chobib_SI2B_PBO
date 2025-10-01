<?php
// Class abstrak (abstract class) didefinisikan sebagai class yang tidak bisa diinstansiasi menjadi object.
// Sebuah class abstrak setidaknya memiliki satu method abstrak (abstract method).
// Jika mendefinisikan sebuah class abstrak, kita harus membuat class turunan dari class abstrak tersebut.
// Tujuan dibuat abstrak class adalah agar setiap class turunan menggunakan method abstrak pada class induk secara fleksibel.

abstract class Hewan {
    abstract public function Makan();
    abstract public function Bergerak();
    abstract public function Beranak();
}

class Burung extends Hewan {
    public function Makan() {
        return "Burung makan biji-bijian";
    }

    public function Bergerak() {
        return "Burung bergerak dengan berjalan, terbang dan melompat";
    }

    public function Beranak() {
        return "Burung berkembang biak dengan bertelur";
    }
}

class Kambing extends Hewan {
    public function Makan() {
        return "Kambing makan rumput";
    }

    public function Bergerak() {
        return "Kambing bergerak dengan berjalan dan berlari";
    }

    public function Beranak() {
        return "Kambing beranak dengan melahirkan";
    }
}

// Membuat objek dari class turunan
$burung = new Burung();
$kambing = new Kambing();

// Menampilkan perilaku Burung
echo "<b>Perilaku Burung :</b><br/>";
echo $burung->Makan() . "<br/>";
echo $burung->Bergerak() . "<br/>";
echo $burung->Beranak() . "<br/>";

// Menampilkan perilaku Kambing
echo "<br><b>Perilaku Kambing :</b><br/>";
echo $kambing->Makan() . "<br/>";
echo $kambing->Bergerak() . "<br/>";
echo $kambing->Beranak() . "<br/>";
?>
