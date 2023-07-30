<?php
session_start();
include "../koneksi.php";
include "../function.php";
$redirect_link="location:$BASE_URL/skema";

if (!empty($_POST)) {
    if ($_POST['aksi'] == 'tambah') {
        $id_skema = $_POST['id_skema'];
        $id_skema_unit = $_POST['id_skema_unit'];
        $kode_elemen = $_POST['kode_elemen'];
        $judul_elemen = $_POST['judul_elemen'];

        $sql = "INSERT INTO skema_elemen (id_skema_elemen, id_skema_unit, kode_elemen, judul_elemen, dibuat_pada, diubah_pada, dihapus_pada) values(DEFAULT, $id_skema_unit, '$kode_elemen', '$judul_elemen', DEFAULT, DEFAULT, DEFAULT)";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);
        header("location:../index.php?p=skema-rincian&id=$id_skema");
    } else if ($_POST['aksi'] == 'ubah') {
        $id_skema = $_POST['id_skema'];
        $id_skema_elemen = $_POST['id_skema_elemen'];        
        $kode_elemen = $_POST['kode_elemen'];
        $judul_elemen = $_POST['judul_elemen'];

        $sql = "UPDATE skema_elemen SET kode_elemen='$kode_elemen', judul_elemen='$judul_elemen', diubah_pada=DEFAULT WHERE id_skema_elemen=$id_skema_elemen";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header("location:../index.php?p=skema-rincian&id=$id_skema");
    } else if ($_POST['aksi'] == 'hapus') {
        $id_skema = $_POST['id_skema'];
        $id_skema_elemen = $_POST['id_skema_elemen'];          

        $sql = "UPDATE skema_elemen SET dihapus_pada=(SELECT NOW()) WHERE id_skema_elemen=$id_skema_elemen";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi); 
        header("location:../index.php?p=skema-rincian&id=$id_skema");
        // echo $sql;           
    }
}

if (!empty($_GET['aksi'])) {    
    
}
