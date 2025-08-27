<?php
$besaraPinjaman = 1000000;
$besarBunga = 10;
$lamaAngsuran = 5;
$keterlambatanAngsuran = 40;
$denda = 0.15;

$bunga = $besaraPinjaman * ($besarBunga / 100);
$totalPinjaman = $besaraPinjaman + $bunga;

$besarAngsuran = $totalPinjaman / $lamaAngsuran;
$dendaKeterlambatan = ($denda / 100) * $besarAngsuran * $keterlambatanAngsuran;

$besaranPembayaran = $besarAngsuran + $dendaKeterlambatan;

echo "Program Penghitung Besaran Angsuran Hutang<br>";
echo '<br>';
echo "Besaran Pinjaman : Rp. " . number_format($besaraPinjaman, 0, ',', '.') . "<br>";
echo "besar bunga (10%) : " . $bunga . "<br>";
echo "Total Pinjaman : Rp. " . number_format($totalPinjaman, 0, ',', '.') . "<br>";
echo "Lama angsuran (bulan) : " . $lamaAngsuran . "<br>";
echo "Besaran angsuran/bulan : Rp. " . number_format($besarAngsuran, 0, ',', '.') . "<br><br>";

echo "Keterlambatan Angsuran (Hari): " . $keterlambatanAngsuran . "<br>";
echo "Denda Keterlambatan/hari : " . number_format($dendaKeterlambatan, 0, ',', '.') . "<br>";
echo "Besaran Pembayaran : " . number_format($besaranPembayaran, 0, ',', '.') . "<br>";
?>