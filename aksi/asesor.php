<?php
session_start();
include "../koneksi.php";
include "../function.php";
$redirect_link="location:$BASE_URL/asesor";

if (!empty($_POST)) {
    if ($_POST['aksi'] == 'tambah') {
        $nomor_registrasi = $_POST['nomor_registrasi'];
        $nama = $_POST['nama'];
        $nik = $_POST['nik'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
        $pekerjaan = $_POST['pekerjaan'];
        $no_hp = $_POST['no_hp'];
        $kewarganegaraan = $_POST['kewarganegaraan'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];             

        $sql = "INSERT INTO asesor (id_asesor, nomor_registrasi, nama, nik, tempat_lahir, tanggal_lahir, jenis_kelamin, pendidikan_terakhir, pekerjaan, no_hp, kewarganegaraan, alamat, email, dibuat_pada, diubah_pada, dihapus_pada) values(DEFAULT, '$nomor_registrasi', '$nama', '$nik', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$pendidikan_terakhir', '$pekerjaan', '$no_hp', '$kewarganegaraan', '$alamat', '$email', DEFAULT, DEFAULT, DEFAULT)";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header($redirect_link);        

    } else if ($_POST['aksi'] == 'ubah') {
        $id_asesor = $_POST['id_asesor'];
        $nomor_registrasi = $_POST['nomor_registrasi'];
        $nama = $_POST['nama'];
        $nik = $_POST['nik'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
        $pekerjaan = $_POST['pekerjaan'];
        $no_hp = $_POST['no_hp'];
        $kewarganegaraan = $_POST['kewarganegaraan'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];  

        $sql = "UPDATE asesor SET nomor_registrasi='$nomor_registrasi', nama='$nama', nik='$nik', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', pendidikan_terakhir= '$pendidikan_terakhir', pekerjaan= '$pekerjaan', no_hp= '$no_hp', kewarganegaraan= '$kewarganegaraan', alamat= '$alamat', email= '$email', diubah_pada=DEFAULT WHERE id_asesor=$id_asesor";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header($redirect_link);
        
    } else if ($_POST['aksi'] == 'hapus') {
        $id_asesor = $_POST['id_asesor'];       

        $sql = "UPDATE asesor SET dihapus_pada=(SELECT NOW()) WHERE id_asesor=$id_asesor";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header($redirect_link);       
                
    }
}

if (!empty($_GET['aksi'])) {    
    
}
