<?php

class Shape {
    const PI = 3.142;

    public function __call($name, $arguments) {
        if ($name == 'area') {
            switch (count($arguments)) {
                case 0:
                    // Jika tidak ada argumen, kembalikan 0
                    return 0;
                case 1:
                    // Jika satu argumen (radius), hitung luas lingkaran
                    // Rumus: PI * r * r. Catatan: kode awal kurang tepat (PI * arg[0]). Seharusnya PI * arg[0] * arg[0] atau PI * pow(arg[0], 2).
                    // Versi yang benar:
                    return self::PI * $arguments[0] * $arguments[0];
                case 2:
                    // Jika dua argumen (panjang & lebar), hitung luas persegi panjang
                    // Rumus: panjang * lebar
                    return $arguments[0] * $arguments[1];
                default:
                    // Jika jumlah argumen tidak sesuai
                    return "Error: Jumlah argumen tidak valid untuk 'area'.";
            }
        }
    }
}

// Buat objek untuk lingkaran
$circle = new Shape();
// Panggil metode 'area' dengan satu argumen (radius = 3)
echo "Luas Lingkaran: " . $circle->area(3) . "<br>";

// Buat objek untuk persegi panjang
$rect = new Shape();
// Panggil metode 'area' dengan dua argumen (panjang = 8, lebar = 6)
echo "Luas Persegi Panjang: " . $rect->area(8, 6) . "<br>";

?>