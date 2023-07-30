<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];
// $id = 1;
$kolom_kuk = get_single_data($koneksi, "skema_kuk", "id_skema_kuk", $id);
$kolom_elemen = get_single_data($koneksi, "skema_elemen", "id_skema_elemen",$kolom_kuk['id_skema_elemen']);
$kolom_skema = get_single_data($koneksi, "skema_unit", "id_skema_unit",$kolom_elemen['id_skema_unit']);
?>

<form method="post" enctype="multipart/form-data" action="aksi/skema_kuk.php">
    <input type="hidden" name="aksi" value="ubah">
    <input type="hidden" name="id_skema" value="<?= $kolom_skema['id_skema']; ?>">
    <input type="hidden" name="id_skema_elemen" value="<?= $kolom_elemen['id_skema_elemen']; ?>">
    <input type="hidden" name="id_skema_kuk" value="<?= $kolom_kuk['id_skema_kuk']; ?>">
    <div>
        <label for="kode_elemen">Kode Elemen</label>
        <input type="text" name="kode_elemen" class="form-control" value="<?= $kolom_elemen['kode_elemen']; ?>" disabled>
    </div>
    <div>
        <label for="judul_elemen">Judul Elemen</label>
        <textarea name="judul_elemen" class="form-control" rows="3" disabled><?= $kolom_elemen['judul_elemen']; ?></textarea>
    </div>
    <div>
        <label for="kode_kuk">Kode Kriteria Unjuk Kerja</label>
        <input type="text" name="kode_kuk" class="form-control" value="<?= $kolom_kuk['kode_kuk']; ?>" required>
    </div>
    <div>
        <label for="judul_kuk">Judul Kriteria Unjuk Kerja</label>
        <textarea name="judul_kuk" class="form-control" rows="3" required><?= $kolom_kuk['judul_kuk']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-2">Ubah</button>
</form>