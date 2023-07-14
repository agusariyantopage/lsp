<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];


$kolom = get_single_data($koneksi, "skema", "id_skema", $id);


?>

<form method="post" enctype="multipart/form-data" action="aksi/skema.php">
    <input type="hidden" name="aksi" value="ubah">
    <input type="hidden" name="id_skema" value="<?= $kolom['id_skema']; ?>">
    
    <div>
        <label for="mode_skema">Mode Skema</label>
        <input type="text" name="mode_skema" class="form-control" value="<?= $kolom['mode_skema']; ?>" required>
    </div>
    <div>
        <label for="nama_skema">Nama Skema</label>
        <textarea name="nama_skema" class="form-control" rows="3" required><?= $kolom['nama_skema']; ?></textarea>        
    </div>
    <div>
        <label for="kode_skema">Kode Skema</label>
        <input type="text" name="kode_skema" class="form-control" value="<?= $kolom['kode_skema']; ?>" required>
    </div>
    <div>
        <label for="jenis_skema">Jenis Skema</label>
        <input type="text" name="jenis_skema" class="form-control" value="<?= $kolom['jenis_skema']; ?>" required>
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