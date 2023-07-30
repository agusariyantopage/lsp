<?php
session_start();
include "../koneksi.php";
include "../function.php";
$redirect_link="location:$BASE_URL/master-muk";

if (!empty($_POST)) {
    if ($_POST['aksi'] == 'tambah') {
        $id_skema = $_POST['id_skema'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal_penetapan = $_POST['tanggal_penetapan'];
        $status = $_POST['status'];                 

        $sql = "INSERT INTO muk_master (id_muk_master, id_skema, deskripsi, tanggal_penetapan, status, dibuat_pada, diubah_pada, dihapus_pada) values(DEFAULT, $id_skema, '$deskripsi', '$tanggal_penetapan', '$status', DEFAULT, DEFAULT, DEFAULT)";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header($redirect_link);

    } else if ($_POST['aksi'] == 'ubah') {
        $id_muk_master = $_POST['id_muk_master'];
        // $id_skema = $_POST['id_skema'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal_penetapan = $_POST['tanggal_penetapan'];
        $status = $_POST['status'];  

        $sql = "UPDATE muk_master SET deskripsi='$deskripsi', tanggal_penetapan='$tanggal_penetapan', status='$status', diubah_pada=DEFAULT WHERE id_muk_master=$id_muk_master";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header($redirect_link);
        
        
    } else if ($_POST['aksi'] == 'hapus') {
        $id_muk_master = $_POST['id_muk_master'];       

        $sql = "UPDATE muk_master SET dihapus_pada=(SELECT NOW()) WHERE id_muk_master=$id_muk_master";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header($redirect_link);
        // echo $sql;
        
    }
}

if (!empty($_GET['aksi'])) {    
    
}
