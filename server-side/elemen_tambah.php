<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];
// $id = 1;
$kolom = get_single_data($koneksi, "skema_unit", "id_skema_unit", $id);
?>

<form method="post" enctype="multipart/form-data" action="aksi/skema_elemen.php">
    <input type="hidden" name="aksi" value="tambah">
    <input type="hidden" name="id_skema" value="<?= $kolom['id_skema']; ?>">
    <input type="hidden" name="id_skema_unit" value="<?= $id; ?>">
    <div>
        <label for="kode_unit">Kode Unit</label>
        <input type="text" name="kode_unit" class="form-control" value="<?= $kolom['kode_unit']; ?>" disabled>
    </div>
    <div>
        <label for="judul_unit">Judul Unit</label>
        <textarea name="judul_unit" class="form-control" rows="3" disabled><?= $kolom['judul_unit']; ?></textarea>
    </div>
    <div>
        <label for="kode_elemen">Kode Elemen</label>
        <input type="text" name="kode_elemen" class="form-control">
    </div>
    <div>
        <label for="judul_elemen">Judul Elemen</label>
        <textarea name="judul_elemen" class="form-control" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-2">Tambah</button>
</form>