<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];
// $id = 1;
$kolom = get_single_data($koneksi, "skema_elemen", "id_skema_elemen", $id);
$kolom_skema = get_single_data($koneksi, "skema_unit", "id_skema_unit",$kolom['id_skema_unit']);
?>

<form method="post" enctype="multipart/form-data" action="aksi/skema_kuk.php">
    <input type="hidden" name="aksi" value="tambah">
    <input type="hidden" name="id_skema" value="<?= $kolom_skema['id_skema']; ?>">
    <input type="hidden" name="id_skema_elemen" value="<?= $id; ?>">
    <div>
        <label for="kode_elemen">Kode Elemen</label>
        <input type="text" name="kode_elemen" class="form-control" value="<?= $kolom['kode_elemen']; ?>" disabled>
    </div>
    <div>
        <label for="judul_elemen">Judul Elemen</label>
        <textarea name="judul_elemen" class="form-control" rows="3" disabled><?= $kolom['judul_elemen']; ?></textarea>
    </div>
    <div>
        <label for="kode_kuk">Kode Kriteria Unjuk Kerja</label>
        <input type="text" name="kode_kuk" class="form-control">
    </div>
    <div>
        <label for="judul_kuk">Judul Kriteria Unjuk Kerja</label>
        <textarea name="judul_kuk" class="form-control" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-2">Tambah</button>
</form>