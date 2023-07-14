<?php
    // Variabel Klien
    $BASE_URL="http://localhost/lsp";
    $APP_TITLE="APP LSP";
    $APP_VERSION="1.0";
    $APP_COMPANY_NAME="LSP SMK Triatma Jaya";
    $APP_COMPANY_ADDRESS="Jl. Kubu Gunung Tegal Jaya";
    $APP_COMPANY_PHONE="(0361) 412-971";
    $APP_COMPANY_EMAIL="info@lsp.com";
    $APP_LOGO="dist/img/logo_eclipse.png";
    $APP_ICO="dist/img/logo_eclipse.png";

    // Setting Default
    $ENABLE_EDIT_HARGA_JUAL=true;

    
    // Variabel Koneksi
    $servername     ="localhost";
    $database       ="dblsp";
    $username       ="root";
    $password       ="";

    // Koneksi Ke Database
    $koneksi =mysqli_connect($servername,$username,$password,$database);
    $mysqli = new mysqli($servername,$username,$password,$database); // OOP Style
    $mysqli->select_db($database); 
    $mysqli->query("SET NAMES 'utf8'");

    
    // Cek apakah koneksi berhasil
    if(!$koneksi){
        die("koneksi Ke Database Gagal :".mysqli_connect_error());
    } else {
        //echo "Koneksi Ke Database Berhasil";
    }

?>