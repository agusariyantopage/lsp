<?php
session_start();
include "../koneksi.php";
include "../function.php";
$redirect_link="location:$BASE_URL/skema";

if (!empty($_POST)) {
    if ($_POST['aksi'] == 'tambah') {
        $kode_skema = $_POST['kode_skema'];
        $nama_skema = $_POST['nama_skema'];
        $jenis_skema = $_POST['jenis_skema'];
        $tanggal_penetapan = $_POST['tanggal_penetapan'];
        $mode_skema = $_POST['mode_skema'];
        $status = $_POST['status'];        

        $sql = "INSERT INTO skema (id_skema, mode_skema, nama_skema, kode_skema, jenis_skema, tanggal_penetapan, status, dibuat_pada, diubah_pada, dihapus_pada) values(DEFAULT, '$mode_skema', '$nama_skema', '$kode_skema', '$jenis_skema', '$tanggal_penetapan', '$status', DEFAULT, DEFAULT, DEFAULT)";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);
        header($redirect_link);

    } else if ($_POST['aksi'] == 'ubah') {
        $id_skema = $_POST['id_skema'];
        $kode_skema = $_POST['kode_skema'];
        $nama_skema = $_POST['nama_skema'];
        $jenis_skema = $_POST['jenis_skema'];
        $tanggal_penetapan = $_POST['tanggal_penetapan'];
        $mode_skema = $_POST['mode_skema'];
        $status = $_POST['status'];

        $sql = "UPDATE skema SET mode_skema='$mode_skema', nama_skema='$nama_skema', kode_skema='$kode_skema', jenis_skema='$jenis_skema', tanggal_penetapan='$tanggal_penetapan', status='$status', diubah_pada=DEFAULT WHERE id_skema=$id_skema";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header($redirect_link);
        
    } else if ($_POST['aksi'] == 'hapus') {
        $id_skema = $_POST['id_skema'];       

        $sql = "UPDATE skema SET dihapus_pada=(SELECT NOW()) WHERE id_skema=$id_skema";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header($redirect_link);
        
    } else if ($_POST['aksi'] == 'tambah-unit') {
        $id_skema = $_POST['id_skema'];
        $kode_unit = $_POST['kode_unit'];
        $judul_unit = $_POST['judul_unit'];

        $sql = "INSERT INTO skema_unit (id_skema_unit, id_skema, kode_unit, judul_unit, dibuat_pada, diubah_pada, dihapus_pada) values(DEFAULT, $id_skema, '$kode_unit', '$judul_unit', DEFAULT, DEFAULT, DEFAULT)";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);
        header("location:../index.php?p=skema-ubah&id=$id_skema");
    } else if ($_POST['aksi'] == 'ubah-unit') {
        $id_skema_unit = $_POST['id_skema_unit'];
        $id_skema = $_POST['id_skema'];
        $kode_unit = $_POST['kode_unit'];
        $judul_unit = $_POST['judul_unit'];

        $sql = "UPDATE skema_unit SET kode_unit='$kode_unit', judul_unit='$judul_unit',diubah_pada=DEFAULT WHERE id_skema_unit=$id_skema_unit";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);
        header("location:../index.php?p=skema-ubah&id=$id_skema");
    } else if ($_POST['aksi'] == 'hapus-unit') {
        $id_skema_unit = $_POST['id_skema_unit'];
        $id_skema = $_POST['id_skema'];       

        $sql = "UPDATE skema_unit SET dihapus_pada=(SELECT NOW()) WHERE id_skema_unit=$id_skema_unit";
        mysqli_query($koneksi, $sql);    
        pesan_transaksi($koneksi);        
        header("location:../index.php?p=skema-ubah&id=$id_skema");
        
    }
}

if (!empty($_GET['aksi'])) {    
    
}
