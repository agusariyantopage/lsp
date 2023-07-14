<?php
include "../koneksi.php";
$id_produk = $_POST['id_produk'];
$konsiyasi = $_POST['konsiyasi'];
$sql = "update produk set servis=$konsinyasi, diubah_pada=DEFAULT where id_produk=$id_produk";
mysqli_query($koneksi, $sql);
