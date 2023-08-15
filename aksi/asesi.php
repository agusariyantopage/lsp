<?php
session_start();
include "../koneksi.php";
include "../function.php";
$redirect_link="location:$BASE_URL/asesor";

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
    
}
