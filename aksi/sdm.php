<?php
session_start();
include "../koneksi.php";
include "../function.php";
$redirect_link="location:$BASE_URL/sdm";

if (!empty($_POST)) {
    if ($_POST['aksi'] == 'tambah') {
        $id_sdm_jabatan = $_POST['id_sdm_jabatan'];
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

        $sql = "INSERT INTO sdm (id_sdm, id_sdm_jabatan, nama, nik, tempat_lahir, tanggal_lahir, jenis_kelamin, pendidikan_terakhir, pekerjaan, no_hp, kewarganegaraan, alamat, email, dibuat_pada, diubah_pada, dihapus_pada) values(DEFAULT, $id_sdm_jabatan, '$nama', '$nik', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$pendidikan_terakhir', '$pekerjaan', '$no_hp', '$kewarganegaraan', '$alamat', '$email', DEFAULT, DEFAULT, DEFAULT)";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header($redirect_link);        

    } else if ($_POST['aksi'] == 'ubah') {
        $id_sdm = $_POST['id_sdm'];
        $id_sdm_jabatan = $_POST['id_sdm_jabatan'];
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

        $sql = "UPDATE sdm SET id_sdm_jabatan=$id_sdm_jabatan, nama='$nama', nik='$nik', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', pendidikan_terakhir= '$pendidikan_terakhir', pekerjaan= '$pekerjaan', no_hp= '$no_hp', kewarganegaraan= '$kewarganegaraan', alamat= '$alamat', email= '$email', diubah_pada=DEFAULT WHERE id_sdm=$id_sdm";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header($redirect_link);
        
    } else if ($_POST['aksi'] == 'hapus') {
        $id_sdm = $_POST['id_sdm'];       

        $sql = "UPDATE sdm SET dihapus_pada=(SELECT NOW()) WHERE id_sdm=$id_sdm";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header($redirect_link);       
                
    }
}

if (!empty($_GET['aksi'])) {    
    
}
