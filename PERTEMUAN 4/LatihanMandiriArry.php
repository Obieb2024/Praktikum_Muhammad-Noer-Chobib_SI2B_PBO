<?php

// Menggunakan array untuk menyimpan data pinjaman
$dataPinjaman = array(
    "pinjaman" => 1000000,
    "bunga" => 10, // dalam persen
    "lama_angsuran" => 5
);

// Mendefinisikan variabel dari array untuk kemudahan
$pinjaman = $dataPinjaman['pinjaman'];
$bunga = $dataPinjaman['bunga'];
$lamaAngsuran = $dataPinjaman['lama_angsuran'];

// Menghitung angsuran pokok per bulan
$angsuranPokok = $pinjaman / $lamaAngsuran;

// Array nama-nama bulan dalam bahasa Indonesia
$namaAngsuran = array("pertama", "kedua", "ketiga", "keempat", "kelima");

// Menampilkan header informasi
echo "Latihan 4<br><br>";
echo "TOKO PEGADAIAN SYARIAH<br>";
echo "Jl Keadilan No 16<br>";
echo "Telp 732746238<br><br>";
echo "Program Penghitung Besaran Angsuran Hutang<br><br>";

// Menampilkan data pinjaman
echo "Besaran Pinjaman : Rp." . number_format($pinjaman, 0, ',', '.') . ";<br>";
echo "Masukan Besaran Bunga (%) : " . $bunga . "<br>";
echo "Lama Angsuran (bulan) : " . $lamaAngsuran . "<br><br>";

// Menggunakan perulangan for untuk menghitung dan menampilkan setiap angsuran
for ($i = 0; $i < $lamaAngsuran; $i++) {
    // Menghitung sisa pinjaman pada awal bulan
    $sisaPinjaman = $pinjaman - ($angsuranPokok * $i);
    
    // Menghitung bunga untuk bulan ini
    $bungaBulan = ($sisaPinjaman * $bunga) / 100;
    
    // Menghitung total angsuran (pokok + bunga)
    $totalAngsuran = $angsuranPokok + $bungaBulan;

    // Menampilkan detail angsuran
    echo "Angsuran " . $namaAngsuran[$i] . " : " 
        . number_format($angsuranPokok, 0, ',', '.') . " + " 
        . number_format($bungaBulan, 0, ',', '.') . " = " 
        . number_format($totalAngsuran, 0, ',', '.') . "<br>";
}

?>