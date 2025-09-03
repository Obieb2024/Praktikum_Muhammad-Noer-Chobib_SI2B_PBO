<?php

class barangHarian {
    var $namaBarang = 'Mie Instan';
    var $harga ;
    var $jumlah ;

    function hitungTotalPembayaran(){
    $total = $this ->harga * $this ->jumlah ;
    return $total;
    }

    function statusPembayaran (){
       if ($this->harga > 50000) {
            $status = 'Mahal';
        } else {
            $status = 'Murah';
        }
        return $status;
    }
}

$barang1 = new barangHarian () ;
$barang1 -> harga = 15000;
$barang1 -> jumlah = 3;

$barang2 = new barangHarian() ;
$barang2 -> harga = 2000;
$barang2 -> namaBarang = 'Kopi';
$barang2 -> jumlah = 3;

$barang3 = new barangHarian();
$barang3 -> harga =  20000;
$barang3 -> namaBarang = 'Air Mineral';
$barang3 -> jumlah = 3;



echo 'Nama Barang = ' . $barang1 -> namaBarang  ; 
echo '<br>';
echo 'Harga = ' . $barang1 -> harga  ;
echo '<br>';
echo 'Jumlah = ' . $barang1 -> jumlah  ;
echo '<br>';
echo 'Total = ' . $barang1 -> hitungTotalPembayaran() ;
echo '<br>';
echo $barang1 -> statusPembayaran ();
echo '<br>';
echo '<br>';
echo 'Nama Barang = ' . $barang2 -> namaBarang  ; 
echo '<br>';
echo 'Harga = ' . $barang2 -> harga  ;
echo '<br>';
echo 'Jumlah = ' . $barang2 -> jumlah  ;
echo '<br>';
echo 'Total : ' . $barang2 -> hitungTotalPembayaran() ;
echo '<br>';
echo $barang2 -> statusPembayaran ();
echo '<br>';
echo '<br>';
echo 'Nama Barang = ' . $barang3 -> namaBarang  ; 
echo '<br>';
echo 'Harga = ' . $barang3 -> harga  ;
echo '<br>';
echo 'Jumlah = ' . $barang3-> jumlah  ;
echo '<br>';
echo 'Total = ' . $barang3 -> hitungTotalPembayaran() ;
echo '<br>';
echo $barang3 -> statusPembayaran ();
echo '<br>';
?>