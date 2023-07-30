<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];
$kolom_elemen = get_single_data($koneksi, "skema_elemen", "id_skema_elemen",$id);
$kolom_skema = get_single_data($koneksi, "skema_unit", "id_skema_unit",$kolom_elemen['id_skema_unit']);
?>

<form method="post" enctype="multipart/form-data" action="aksi/skema_elemen.php">
    <input type="hidden" name="aksi" value="ubah">
    <input type="hidden" name="id_skema" value="<?= $kolom_skema['id_skema']; ?>">
    <input type="hidden" name="id_skema_unit" value="<?= $kolom_skema['id_skema_unit']; ?>">
    <input type="hidden" name="id_skema_elemen" value="<?= $kolom_elemen['id_skema_elemen']; ?>">
    <div>
        <label for="kode_unit">Kode Unit</label>
        <input type="text" name="kode_unit" class="form-control" value="<?= $kolom_skema['kode_unit']; ?>" disabled>
    </div>
    <div>
        <label for="judul_unit">Judul Unit</label>
        <textarea name="judul_unit" class="form-control" rows="3" disabled><?= $kolom_skema['judul_unit']; ?></textarea>
    </div>
    <div>
        <label for="kode_elemen">Kode Elemen</label>
        <input type="text" name="kode_elemen" class="form-control" value="<?= $kolom_elemen['kode_elemen']; ?>" required>
    </div>
    <div>
        <label for="judul_elemen">Judul Elemen</label>
        <textarea name="judul_elemen" class="form-control" rows="3" required><?= $kolom_elemen['judul_elemen']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-2">Ubah</button>
</form>