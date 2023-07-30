<?php
session_start();
include "../koneksi.php";
include "../function.php";
$redirect_link="location:$BASE_URL/tuk";

if (!empty($_POST)) {
    if ($_POST['aksi'] == 'tambah') {
        $kode_tuk = $_POST['kode_tuk'];
        $nama_tuk = $_POST['nama_tuk'];
        $jenis_tuk = $_POST['jenis_tuk'];
        $alamat = $_POST['alamat'];
        $no_telepon = $_POST['no_telepon'];
        $no_hp = $_POST['no_hp'];
        $no_fax = $_POST['no_fax'];
        $email = $_POST['email'];             

        $sql = "INSERT INTO tuk (id_tuk, kode_tuk, nama_tuk, jenis_tuk, alamat, no_telepon, no_hp, no_fax, email, dibuat_pada, diubah_pada, dihapus_pada) values(DEFAULT, '$kode_tuk', '$nama_tuk', '$jenis_tuk', '$alamat', '$no_telepon', '$no_hp', '$no_fax', '$email', DEFAULT, DEFAULT, DEFAULT)";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header($redirect_link);

    } else if ($_POST['aksi'] == 'ubah') {
        $id_tuk = $_POST['id_tuk'];
        $kode_tuk = $_POST['kode_tuk'];
        $nama_tuk = $_POST['nama_tuk'];
        $jenis_tuk = $_POST['jenis_tuk'];
        $alamat = $_POST['alamat'];
        $no_telepon = $_POST['no_telepon'];
        $no_hp = $_POST['no_hp'];
        $no_fax = $_POST['no_fax'];
        $email = $_POST['email']; 

        $sql = "UPDATE tuk SET kode_tuk='$kode_tuk', nama_tuk='$nama_tuk', jenis_tuk='$jenis_tuk', alamat='$alamat', no_telepon='$no_telepon', no_hp='$no_hp', no_fax='$no_fax', email='$email', diubah_pada=DEFAULT WHERE id_tuk=$id_tuk";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header($redirect_link);
        
    } else if ($_POST['aksi'] == 'hapus') {
        $id_tuk = $_POST['id_tuk'];       

        $sql = "UPDATE tuk SET dihapus_pada=(SELECT NOW()) WHERE id_tuk=$id_tuk";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header($redirect_link);
        // echo $sql;
        
    }
}

if (!empty($_GET['aksi'])) {    
    
}
