<?php

echo "Dari mana Anda berasal: ";
// Membaca input dari keyboard dan langsung menghapus spasi atau enter yang tidak perlu di awal dan akhir.
$asal = trim(fgets(STDIN));

// Menampilkan kembali sapaan dengan input yang sudah bersih.
echo "Oh, dari $asal ya, salam kenal!\n";

?>  