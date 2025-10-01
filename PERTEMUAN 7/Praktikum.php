<?php
// Class Induk
class Tabungan {
    // property dengan hak akses private (enkapsulasi)
    private $saldo;

    // constructor untuk set saldo awal
    public function __construct($saldo_awal) {
        $this->saldo = $saldo_awal;
    }

    // method untuk menampilkan saldo
    public function getSaldo() {
        return $this->saldo;
    }

    // method untuk setor tunai
    public function setor($jumlah) {
        $this->saldo += $jumlah;
    }

    // method untuk tarik tunai
    public function tarik($jumlah) {
        if ($jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
        } else {
            echo "Saldo tidak cukup!\n";
        }
    }
}

// Class Anak (Siswa)
class Siswa extends Tabungan {
    private $nama;

    public function __construct($nama, $saldo_awal) {
        parent::__construct($saldo_awal);
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }
}

// Membuat array siswa (3 siswa)
$siswa = [
    new Siswa("Siswa 1", 100000),
    new Siswa("Siswa 2", 150000),
    new Siswa("Siswa 3", 200000)
];

// Menampilkan menu interaktif
while (true) {
    echo "\n=== Program Tabungan Sekolah ===\n";
    foreach ($siswa as $index => $s) {
        echo ($index+1) . ". " . $s->getNama() . " | Saldo: Rp " . $s->getSaldo() . "\n";
    }
    echo "4. Keluar\n";

    echo "Pilih siswa (1-3) atau 4 untuk keluar: ";
    $pilihan = trim(fgets(STDIN));

    if ($pilihan == 4) {
        echo "Program selesai.\n";
        break;
    }

    if ($pilihan < 1 || $pilihan > 3) {
        echo "Pilihan tidak valid!\n";
        continue;
    }

    $s = $siswa[$pilihan-1];
    echo "Halo, " . $s->getNama() . "!\n";
    echo "1. Setor Tunai\n";
    echo "2. Tarik Tunai\n";
    echo "Pilih menu: ";
    $menu = trim(fgets(STDIN));

    if ($menu == 1) {
        echo "Masukkan jumlah setor: ";
        $jumlah = trim(fgets(STDIN));
        $s->setor($jumlah);
        echo "Setor berhasil! Saldo sekarang: Rp " . $s->getSaldo() . "\n";
    } elseif ($menu == 2) {
        echo "Masukkan jumlah tarik: ";
        $jumlah = trim(fgets(STDIN));
        $s->tarik($jumlah);
        echo "Transaksi selesai! Saldo sekarang: Rp " . $s->getSaldo() . "\n";
    } else {
        echo "Menu tidak valid!\n";
    }
}
?>
