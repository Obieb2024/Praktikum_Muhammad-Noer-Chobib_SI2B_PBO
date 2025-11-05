<?php 
class database{
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "belajar_oop";
	var $koneksi = "";

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}

    // ===================================================================
	// == METHOD LOGIN
	// ===================================================================
    function cek_login($username, $password)
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");
        if(mysqli_num_rows($data) > 0){
            while($row = mysqli_fetch_array($data)){ $hasil[] = $row; }
            return $hasil;
        } else {
            return false;
        }
    }

	// ===================================================================
	// == METHOD DATA BARANG (Studi Kasus 1)
	// ===================================================================
	function tampil_data()
	{
		$data = mysqli_query($this->koneksi,"select * from tb_barang");
		$hasil = [];
        while($row = mysqli_fetch_array($data)){ $hasil[] = $row; }
		return $hasil;
	}

    // FUNGSI BARU (Studi Kasus 1: Pencarian)
    function cari_data_barang($keyword)
	{
		$data = mysqli_query($this->koneksi,"select * from tb_barang where nama_barang like '%$keyword%'");
		$hasil = [];
        while($row = mysqli_fetch_array($data)){ $hasil[] = $row; }
        return $hasil;
	}

	function tambah_data($kd_barang, $nama_barang, $stok, $harga_beli, $harga_jual)
	{
        // Saya perbaiki SQL dari gambar Anda agar sesuai
		mysqli_query($this->koneksi,"insert into tb_barang (kd_barang, nama_barang, stok, harga_beli, harga_jual) values ('$kd_barang','$nama_barang','$stok','$harga_beli','$harga_jual')");
	}

	function tampil_edit_data($id_barang)
	{
		$data = mysqli_query($this->koneksi,"select * from tb_barang where id_barang='$id_barang'");
		$hasil = [];
        while($d = mysqli_fetch_array($data)){ $hasil[] = $d; }
		return $hasil;
	}

	function edit_data($id_barang, $nama_barang, $stok, $harga_beli, $harga_jual)
	{
        // Saya perbaiki SQL dari gambar Anda agar sesuai (tanpa kd_barang)
		mysqli_query($this->koneksi,"update tb_barang set nama_barang='$nama_barang', stok='$stok', harga_beli='$harga_beli', harga_jual='$harga_jual' where id_barang='$id_barang'");
	}

	function delete_data($id_barang)
	{
		mysqli_query($this->koneksi,"delete from tb_barang where id_barang='$id_barang'");
	}

	function kode_barang()
	{
		$data = mysqli_query($this->koneksi, "SELECT MAX(kd_barang) as kd_barang FROM tb_barang");
		$hasil = [];
        while($row = mysqli_fetch_array($data)){ $hasil[] = $row; }
		return $hasil;
	}

    // ===================================================================
	// == METHOD DATA CUSTOMER (Studi Kasus 2)
	// ===================================================================
	function tampil_data_customer()
	{
		$data = mysqli_query($this->koneksi,"select * from tb_customer");
		$hasil = [];
        while($row = mysqli_fetch_array($data)){ $hasil[] = $row; }
		return $hasil;
	}
    function tambah_data_customer($nik, $nama, $jk, $alamat, $telp, $email, $pass)
    {
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        mysqli_query($this->koneksi, "insert into tb_customer (nik_customer, nama_customer, jenis_kelamin, alamat_customer, telepon_customer, email_customer, pass_customer) values ('$nik', '$nama', '$jk', '$alamat', '$telp', '$email', '$pass_hash')");
    }
    function tampil_edit_data_customer($id)
    {
        $data = mysqli_query($this->koneksi, "select * from tb_customer where id_customer='$id'");
        $hasil = [];
        while($d = mysqli_fetch_array($data)){ $hasil[] = $d; }
		return $hasil;
    }
    function edit_data_customer($id, $nik, $nama, $jk, $alamat, $telp, $email, $pass)
    {
        if(empty($pass)) {
             mysqli_query($this->koneksi, "update tb_customer set nik_customer='$nik', nama_customer='$nama', jenis_kelamin='$jk', alamat_customer='$alamat', telepon_customer='$telp', email_customer='$email' where id_customer='$id'");
        } else {
            $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
            mysqli_query($this->koneksi, "update tb_customer set nik_customer='$nik', nama_customer='$nama', jenis_kelamin='$jk', alamat_customer='$alamat', telepon_customer='$telp', email_customer='$email', pass_customer='$pass_hash' where id_customer='$id'");
        }
    }
    function delete_data_customer($id)
    {
        mysqli_query($this->koneksi, "delete from tb_customer where id_customer='$id'");
    }

    // ===================================================================
	// == METHOD DATA SUPPLIER (Studi Kasus 2)
	// ===================================================================
    function tampil_data_supplier()
	{
		$data = mysqli_query($this->koneksi,"select * from tb_supplier");
		$hasil = [];
        while($row = mysqli_fetch_array($data)){ $hasil[] = $row; }
		return $hasil;
	}
    function tambah_data_supplier($id_supplier, $nama, $alamat, $telp, $email, $pass)
    {
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        mysqli_query($this->koneksi, "insert into tb_supplier (id_supplier, nama_supplier, alamat_supplier, telepon_supplier, email_supplier, pass_supplier) values ('$id_supplier', '$nama', '$alamat', '$telp', '$email', '$pass_hash')");
    }
    function tampil_edit_data_supplier($id)
    {
        $data = mysqli_query($this->koneksi, "select * from tb_supplier where id_supplier='$id'");
        $hasil = [];
        while($d = mysqli_fetch_array($data)){ $hasil[] = $d; }
		return $hasil;
    }
    function edit_data_supplier($id, $nama, $alamat, $telp, $email, $pass)
    {
        if(empty($pass)) {
            mysqli_query($this->koneksi, "update tb_supplier set nama_supplier='$nama', alamat_supplier='$alamat', telepon_supplier='$telp', email_supplier='$email' where id_supplier='$id'");
        } else {
            $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
            mysqli_query($this->koneksi, "update tb_supplier set nama_supplier='$nama', alamat_supplier='$alamat', telepon_supplier='$telp', email_supplier='$email', pass_supplier='$pass_hash' where id_supplier='$id'");
        }
    }
    function delete_data_supplier($id)
    {
        mysqli_query($this->koneksi, "delete from tb_supplier where id_supplier='$id'");
    }

    // ===================================================================
	// == METHOD HITUNG DATA (Dashboard)
	// ===================================================================
    function hitung_data_barang() {
        $data = mysqli_query($this->koneksi, "SELECT COUNT(id_barang) as total FROM tb_barang");
        $row = mysqli_fetch_array($data);
        return $row['total'];
    }
    function hitung_data_customer() {
        $data = mysqli_query($this->koneksi, "SELECT COUNT(id_customer) as total FROM tb_customer");
        $row = mysqli_fetch_array($data);
        return $row['total'];
    }
    function hitung_data_supplier() {
        $data = mysqli_query($this->koneksi, "SELECT COUNT(id_supplier) as total FROM tb_supplier");
        $row = mysqli_fetch_array($data);
        return $row['total'];
    }
} 
?>