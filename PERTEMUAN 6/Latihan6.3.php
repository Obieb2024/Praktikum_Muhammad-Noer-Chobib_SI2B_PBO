<?php
// Latihan6.3.php
class KonversiSuhu {
    public $celsius;

    public function __construct($celsius) {
        $this->celsius = $celsius;
    }

    public function toReamur() {
        return (4/5) * $this->celsius;
    }

    public function toFahrenheit() {
        return (9/5) * $this->celsius + 32;
    }

    public function toKelvin() {
        return $this->celsius + 273.15;
    }
}

// Suhu tetap, misal 36 derajat
$suhu = 36;

// Buat objek konversi
$konversi = new KonversiSuhu($suhu);

// Array hasil konversi
$hasil = [
    "celsius"    => $konversi->celsius,
    "reamur"     => $konversi->toReamur(),
    "fahrenheit" => $konversi->toFahrenheit(),
    "kelvin"     => $konversi->toKelvin()
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Constructor</title>
</head>
<body>
    <h2>Konversi Suhu dari Celcius</h2>
    <?php
    foreach ($hasil as $key => $value) {
        if ($key == "celsius") {
            echo "Suhu dalam Celcius = {$value} derajat<br>";
        } elseif ($key == "kelvin") {
            echo "Suhu dalam Kelvin = {$value} derajat<br>";
        } elseif ($key == "fahrenheit") {
            echo "Suhu dalam Fahrenheit = {$value} derajat<br>";
        } elseif ($key == "reamur") {
            echo "Suhu dalam Reamur = {$value} derajat<br>";
        }
    }
    ?>
</body>
</html>
