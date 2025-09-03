<?php

// Data mahasiswa dalam bentuk array
$mahasiswa = [
    ['nama' => 'Mahasiswa 1', 'nilai' => 55],
    ['nama' => 'Mahasiswa 2', 'nilai' => 76],
    ['nama' => 'Mahasiswa 3', 'nilai' => 65],
    ['nama' => 'Mahasiswa 4', 'nilai' => 95],
    ['nama' => 'Mahasiswa 5', 'nilai' => 59],
    ['nama' => 'Mahasiswa 6', 'nilai' => 65],
    ['nama' => 'Mahasiswa 7', 'nilai' => 70],
    ['nama' => 'Mahasiswa 8', 'nilai' => 66],
    ['nama' => 'Mahasiswa 9', 'nilai' => 62],
    ['nama' => 'Mahasiswa 10', 'nilai' => 85],
];

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>No</th><th>Nama</th><th>Nilai</th><th>Keterangan</th></tr>";

$no = 1;
foreach ($mahasiswa as $data) {
    $nama = $data['nama'];
    $nilai = $data['nilai'];
    $keterangan = "";

    // Penggunaan if bercabang untuk menentukan ganjil/genap
    if ($nilai % 2 == 0) {
        $keterangan = "Nilai Angka Genap";
    } else {
        $keterangan = "Nilai Angka Ganjil";
    }
    
    echo "<tr>";
    echo "<td>" . $no . "</td>";
    echo "<td>" . $nama . "</td>";
    echo "<td>" . $nilai . "</td>";
    echo "<td>" . $keterangan . "</td>";
    echo "</tr>";
    
    $no++;
}
echo "</table>";

?>