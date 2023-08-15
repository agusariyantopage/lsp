<?php
session_start();
include "../koneksi.php";
include "../function.php";
$redirect_link="location:$BASE_URL/registrasi-asesmen";

if (!empty($_POST)) {
    if ($_POST['aksi'] == 'daftar-akun') {
        $nama_lengkap = $_POST['nama_lengkap'];
        $nomor_identitas = $_POST['nomor_identitas'];
        $email_pribadi = $_POST['email_pribadi'];
        $password_asesi = $_POST['password_asesi'];
        $repassword_asesi = $_POST['repassword_asesi'];
       
        $sql = "INSERT INTO asesi (id_asesi,nama_lengkap,nomor_identitas,email_pribadi,password_asesi) values(DEFAULT,'$nama_lengkap','$nomor_identitas','$email_pribadi','$password_asesi')";
        mysqli_query($koneksi, $sql);    
echo $sql;
        // pesan_transaksi($koneksi);        
        // header($redirect_link);        

    } else if ($_POST['aksi'] == 'ubah') {
        
        
    } else if ($_POST['aksi'] == 'hapus') {         
                
    }
}

if (!empty($_GET['aksi'])) {    
    if($_GET['aksi']== 'aktivasi'){
        $id_asesi_registrasi_asesmen = $_GET['id'];
        $id_asesi = $_GET['id_asesi'];
        $sql_unaktifasi="UPDATE asesi_registrasi_asesmen SET is_aktif=0 WHERE id_asesi_registrasi_asesmen!=$id_asesi_registrasi_asesmen AND id_asesi=$id_asesi";
        $sql_aktifasi="UPDATE asesi_registrasi_asesmen SET is_aktif=1 WHERE id_asesi_registrasi_asesmen=$id_asesi_registrasi_asesmen";
        mysqli_query($koneksi, $sql_unaktifasi); 
        mysqli_query($koneksi, $sql_aktifasi); 
        
        pesan_transaksi($koneksi);        
        header($redirect_link); 
    }
}
