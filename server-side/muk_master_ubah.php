<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];
$kolom = get_single_data($koneksi, "muk_master", "id_muk_master", $id);
$paramater="WHERE id_skema=".$kolom['id_skema'];
?>

<form method="post" enctype="multipart/form-data" action="aksi/muk_master.php">
    <input type="hidden" name="aksi" value="ubah">
    <input type="hidden" name="id_muk_master" value="<?= $kolom['id_muk_master']; ?>">
    <div>
        <label for="id_skema">Skema</label>
        <select name="id_skema" class="form-control" required disabled>            
            <?= call_option_selected($koneksi, "skema", "id_skema", "id_skema", "nama_skema",$kolom['id_skema']); ?>
        </select>
    </div>
    <div>
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3" required><?= $kolom['deskripsi']; ?></textarea>
    </div>
    <div>
        <label for="tanggal_penetapan">Tanggal Penetapan</label>
        <input type="date" name="tanggal_penetapan" class="form-control" value="<?= $kolom['tanggal_penetapan']; ?>" required>
    </div>
    <div>
        <label for="status">Status</label>
        <select name="status" class="form-control" required>
            <option value="">-- Pilih Status --</option>
            <?php echo ($kolom['status'] == 'Aktif') ? "<option value='$kolom[status]' selected>Aktif</option>" : "<option>Aktif</option>"; ?>
            <?php echo ($kolom['status'] == 'Non Aktif') ? "<option value='$kolom[status]' selected>Non Aktif</option>" : "<option>Non Aktif</option>"; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary btn-block mt-2">Ubah</button>
</form>