<?php
class customException extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
    return $errorMsg;
  }
}

// Ganti dengan email yang valid
$email = "someone@example.com";

try {
  // Cek apakah formatnya valid
  if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
    // Baris ini TIDAK akan dieksekusi karena emailnya valid
    throw new customException($email);
  }

  // Tambahkan pesan ini untuk menunjukkan validasi berhasil
  echo "<b>" . $email . "</b> adalah alamat email yang valid! ✅";

}
catch (customException $e) {
  // Blok ini TIDAK akan dieksekusi
  echo $e->errorMessage();
}
?>