<?php

class Test {
    public function __construct() {
        // Logika untuk konstruktor bisa ditambahkan di sini.
        // Saat ini, tidak ada yang spesifik.
    }

    // Metode magis __call() dipanggil ketika metode yang tidak ada diakses.
    public function __call($method_name, $parameters) {
        if ($method_name == "Function") {
            $count = count($parameters);
            
            switch ($count) {
                case 1:
                    echo "You are passing 1 argument";
                    break;
                case 2:
                    echo "You are passing 2 arguments";
                    break;
                default:
                    // Melempar exception jika jumlah argumen tidak sesuai
                    throw new Exception("Bad argument");
            }
        } else {
            // Melempar exception jika metode yang dipanggil tidak "Function"
            throw new Exception("Function $method_name does not exist");
        }
    }
}

$a = new Test();

// Memanggil metode 'Function' dengan satu argumen
$a->Function("ankur");

echo "<br>";

// Memanggil metode 'Function' dengan dua argumen
$a->Function("techflirt", "ankur");

?>