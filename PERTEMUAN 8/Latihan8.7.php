<?php
// Fungsi yang dapat melempar exception
function checkNum($number) {
  if($number > 1) {
    // Melemparkan exception jika angka lebih besar dari 1
    throw new Exception("Nilai harus 1 atau di bawahnya");
  }
  return true;
}

// Menggunakan blok try...catch untuk menangani potensi error
try {
  // Mencoba menjalankan kode yang mungkin menyebabkan exception
  checkNum(2); 
  
  // Baris ini tidak akan pernah dieksekusi jika exception terjadi
  echo 'Jika Anda melihat ini, angkanya adalah 1 atau kurang.'; 

} catch(Exception $e) {
  // Menangkap exception dan menampilkan pesan errornya
  echo 'Terjadi kesalahan: ' . $e->getMessage();
}
?>