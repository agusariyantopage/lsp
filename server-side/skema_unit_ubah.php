<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];
$kolom = get_single_data($koneksi, "skema_unit", "id_skema_unit", $id);
?>

<form method="post" enctype="multipart/form-data" action="aksi/skema.php">
    <input type="hidden" name="aksi" value="ubah-unit">
    <input type="hidden" name="id_skema_unit" value="<?= $kolom['id_skema_unit']; ?>">
    <input type="hidden" name="id_skema" value="<?= $kolom['id_skema']; ?>">
    <div>
        <label for="kode_unit">Kode Unit</label>
        <input type="text" value="<?= $kolom['kode_unit']; ?>" name="kode_unit" class="form-control" required>
    </div>
    <div>
        <label for="judul_unit">Judul Unit</label>
        <textarea name="judul_unit" class="form-control" rows="3" required><?= $kolom['judul_unit']; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary btn-block mt-2">Ubah</button>
</form>