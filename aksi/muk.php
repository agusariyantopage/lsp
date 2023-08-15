<?php
session_start();
include "../koneksi.php";
include "../function.php";
$redirect_link = "location:$BASE_URL/muk";

if (!empty($_POST)) {
    if ($_POST['aksi'] == 'tambah') {
        $id_muk_master = $_POST['id_muk_master'];
        $kode_muk = $_POST['kode_muk'];
        $nama_muk = $_POST['nama_muk'];
        $jenis_muk = $_POST['jenis_muk'];
        $tanggal_penetapan = $_POST['tanggal_penetapan'];
        $status = $_POST['status'];

        $sql = "INSERT INTO muk (id_muk, id_muk_master, kode_muk, nama_muk, jenis_muk, tanggal_penetapan, status, dibuat_pada, diubah_pada, dihapus_pada) values(DEFAULT, $id_muk_master, '$kode_muk', '$nama_muk', '$jenis_muk', '$tanggal_penetapan', '$status', DEFAULT, DEFAULT, DEFAULT)";
        mysqli_query($koneksi, $sql);
        pesan_transaksi($koneksi);
        header($redirect_link);
    } else if ($_POST['aksi'] == 'ubah') {
        $id_muk = $_POST['id_muk'];
        $id_muk_master = $_POST['id_muk_master'];
        $kode_muk = $_POST['kode_muk'];
        $nama_muk = strtoupper($_POST['nama_muk']);
        $jenis_muk = $_POST['jenis_muk'];
        $tanggal_penetapan = $_POST['tanggal_penetapan'];
        $status = $_POST['status'];

        $sql = "UPDATE muk SET kode_muk='$kode_muk', nama_muk='$nama_muk', jenis_muk='$jenis_muk',tanggal_penetapan='$tanggal_penetapan', status='$status', diubah_pada=DEFAULT WHERE id_muk=$id_muk";
        mysqli_query($koneksi, $sql);
        pesan_transaksi($koneksi);
        header($redirect_link);
    } else if ($_POST['aksi'] == 'hapus') {
        $id_muk = $_POST['id_muk'];

        $sql = "UPDATE muk SET dihapus_pada=(SELECT NOW()) WHERE id_muk=$id_muk";
        mysqli_query($koneksi, $sql);
        pesan_transaksi($koneksi);
        header($redirect_link);
        // echo $sql;

    } else if ($_POST['aksi'] == 'setup') {
        $id_muk = $_POST['id_muk'];       
        $jumlah_unit = $_POST['jumlah_unit'];
        
        for ($i = 0; $i < $jumlah_unit; $i++) {
            if (!empty($_POST['id_unit'][$i])) {
                $id_skema_unit=$_POST['id_unit'][$i];                
                $sql="INSERT INTO muk_unit(id_muk_unit, id_muk, id_skema_unit, dibuat_pada, diubah_pada, dihapus_pada) VALUES(DEFAULT, $id_muk, $id_skema_unit, DEFAULT, DEFAULT, DEFAULT)";
                mysqli_query($koneksi, $sql);
            }
        }
        pesan_transaksi($koneksi);        
        header($redirect_link);
        

    } else if ($_POST['aksi'] == 'setup-hapus-unit') {
        $id_muk = $_POST['id_muk'];       
        $jumlah_unit = $_POST['jumlah_unit'];
        
        for ($i = 0; $i < $jumlah_unit; $i++) {
            if (!empty($_POST['id_unit'][$i])) {
                $id_skema_unit=$_POST['id_unit'][$i];                
                $sql="UPDATE muk_unit SET dihapus_pada=(SELECT NOW()) WHERE id_muk=$id_muk AND id_skema_unit=$id_skema_unit";
                mysqli_query($koneksi, $sql);
            }
        }
        pesan_transaksi($koneksi);        
        header($redirect_link);        
    }
}

if (!empty($_GET['aksi'])) {
}
