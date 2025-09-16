<?php

$mahasiswaData = array(
    array("Aditya", "SI 2", "Pemrograman Berorientasi Objek", 80),
    array("Shinta", "SI 2", "Pemrograman Berorientasi Objek", 75),
    array("Ineu", "SI 2", "Pemrograman Berorientasi Objek", 55)
);

for ($i = 0; $i < count($mahasiswaData); $i++) {
    $nama = $mahasiswaData[$i][0];
    $kelas = $mahasiswaData[$i][1];
    $mataKuliah = $mahasiswaData[$i][2];
    $nilai = $mahasiswaData[$i][3];
    $status = "";

    if ($nilai >= 70) {
        $status = "Lulus Kuis";
    } else {
        $status = "Tidak Lulus Kuis";
    }

    echo "Nama : " . $nama . "<br>";
    echo "Kelas : " . $kelas . "<br>";
    echo "Mata Kuliah : " . $mataKuliah . "<br>";
    echo "Nilai : " . $nilai . "<br>";
    echo $status . "<br><br>";
}

?>