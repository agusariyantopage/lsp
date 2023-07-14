<?php
session_start();
include "../koneksi.php";

if (!empty($_POST)) {
    if ($_POST['aksi'] == 'tambah') {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $akses = $_POST['akses'];

        $sql = "insert into user (nama, username, password, dibuat_pada, diubah_pada, terakhir_login, akses, status) values('$nama','$username','$password',DEFAULT,DEFAULT,DEFAULT,'$akses',DEFAULT)";
        mysqli_query($koneksi, $sql);
        echo $sql;
        header('location:../index.php?p=user');
    } else if ($_POST['aksi'] == 'ubah') {
        $id_user = $_POST['id_user'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $akses = $_POST['akses'];


        $sql = "UPDATE user set nama='$nama',username='$username',password='$password',akses='$akses',diubah_pada=DEFAULT where id_user=$id_user";
        mysqli_query($koneksi, $sql);
        header('location:../index.php?p=user');
    } else if ($_POST['aksi'] == 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        if ($role == "Administrator") {
            $sql = "select * from user where username='$username' and password='$password' and status!='ONLINE'";
        }
        else if($role == "Asesor"){

        }
        else if($role == "Asesi"){

        }
        $query = mysqli_query($koneksi, $sql);
        //echo $sql;
        $sukses = mysqli_num_rows($query);

        if ($sukses >= 1) {
            $user = mysqli_fetch_array($query);
            $_SESSION['backend_user_id']       = $user['id_user'];
            $_SESSION['backend_user_nama']     = $user['nama'];
            $_SESSION['backend_user_akses']    = $user['akses'];
            $_SESSION['status_proses']         = '';
            $_SESSION['jurnal_temporer'] = array();

            // Update Status User
            $sql2 = "update user set terakhir_login=DEFAULT,status='ONLINE' where id_user=$_SESSION[backend_user_id]";
            mysqli_query($koneksi, $sql2);
            $_SESSION['status_proses'] = 'LOGIN-SUKSES';
            header("location:../index.php");
        } else {
            $sql2 = "update user set status='OFFLINE' where username='$username' and password='$password'";
            mysqli_query($koneksi, $sql2);
            $_SESSION['status_proses'] = 'LOGIN-GAGAL';
            header("location:../login.php");
        }
    }
}

if (!empty($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        $x0 = $_GET['token'];
        // Jalankan Prosedur Cek Data
        $sql = "delete from user where md5(id_user)='$x0'";
        mysqli_query($koneksi, $sql);
        //echo $sql;
        header('location:../index.php?p=user');
    }
    if ($_GET['aksi'] == 'buang-spasi') {
        $sql = "update user set nama=trim(nama)";
        mysqli_query($koneksi, $sql);
        //echo $sql;
        header('location:../index.php?p=user');
    }
    if ($_GET['aksi'] == 'set-kapital') {
        $sql = "update user set nama=upper(nama)";
        mysqli_query($koneksi, $sql);
        //echo $sql;
        header('location:../index.php?p=user');
    }
    if ($_GET['aksi'] == 'set-proper') {
        $sql = "UPDATE user SET nama = CONCAT(UPPER(SUBSTRING(nama, 1, 1)), LOWER(SUBSTRING(nama FROM 2)))";
        mysqli_query($koneksi, $sql);
        //echo $sql;
        header('location:../index.php?p=user');
    }
    if ($_GET['aksi'] == 'logout') {
        $sql = "UPDATE user SET status='OFFLINE',terakhir_login=DEFAULT WHERE id_user=$_SESSION[backend_user_id]";
        mysqli_query($koneksi, $sql);
        session_destroy();
        header('location:../login.php');
    }
}
