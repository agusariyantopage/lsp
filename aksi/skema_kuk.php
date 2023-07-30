<?php
session_start();
include "../koneksi.php";
include "../function.php";
$redirect_link="location:$BASE_URL/skema";

if (!empty($_POST)) {
    if ($_POST['aksi'] == 'tambah') {
        $id_skema = $_POST['id_skema'];
        $id_skema_elemen = $_POST['id_skema_elemen'];
        $kode_kuk = $_POST['kode_kuk'];
        $judul_kuk = $_POST['judul_kuk'];

        $sql = "INSERT INTO skema_kuk (id_skema_kuk, id_skema_elemen, kode_kuk, judul_kuk, dibuat_pada, diubah_pada, dihapus_pada) values(DEFAULT, $id_skema_elemen, '$kode_kuk', '$judul_kuk', DEFAULT, DEFAULT, DEFAULT)";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);
        header("location:../index.php?p=skema-rincian&id=$id_skema");
    } else if ($_POST['aksi'] == 'ubah') {
        $id_skema = $_POST['id_skema'];
        $id_skema_elemen = $_POST['id_skema_elemen'];
        $id_skema_kuk = $_POST['id_skema_kuk'];
        $kode_kuk = $_POST['kode_kuk'];
        $judul_kuk = $_POST['judul_kuk'];
        $sql = "UPDATE skema_kuk SET kode_kuk='$kode_kuk', judul_kuk='$judul_kuk', diubah_pada=DEFAULT WHERE id_skema_kuk=$id_skema_kuk";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);
        header("location:../index.php?p=skema-rincian&id=$id_skema");
    } else if ($_POST['aksi'] == 'hapus') {
        $id_skema = $_POST['id_skema'];
        $id_skema_elemen = $_POST['id_skema_elemen'];
        $id_skema_kuk = $_POST['id_skema_kuk'];     

        $sql = "UPDATE skema_kuk SET dihapus_pada=(SELECT NOW()) WHERE id_skema_kuk=$id_skema_kuk";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi); 
        header("location:../index.php?p=skema-rincian&id=$id_skema");
        
    }
}

if (!empty($_GET['aksi'])) {    
    
}
