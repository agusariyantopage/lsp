<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];
$kolom = get_single_data($koneksi, "muk", "id_muk", $id);
$kolom_master = get_single_data($koneksi, "muk_master", "id_muk_master", $kolom['id_muk_master']);
?>

<form method="post" enctype="multipart/form-data" action="aksi/muk.php">
    <input type="hidden" name="aksi" value="ubah">
    <input type="hidden" name="id_muk" value="<?= $id; ?>">
    <input type="hidden" name="id_muk_master" value="<?= $kolom['id_muk_master']; ?>">

    <div>
        <label for="deskripsi">Master Materi Uji Kompetensi</label>
        <textarea name="deskripsi" class="form-control" rows="3" disabled><?= $kolom_master['deskripsi']; ?></textarea>
    </div>
    <div>
        <label for="kode_muk">Kode Materi Uji Kompetensi</label>
        <input type="text" name="kode_muk" class="form-control" required value="<?= $kolom['kode_muk']; ?>">
    </div>
    <div>
        <label for="nama_muk">Judul Materi Uji Kompetensi</label>
        <textarea name="nama_muk" class="form-control" rows="3" required><?= $kolom['nama_muk']; ?></textarea>
    </div>
    <div>
        <label for="jenis_muk">Jenis Materi Uji Kompetensi</label>
        <input type="text" name="jenis_muk" class="form-control" required value="<?= $kolom['jenis_muk']; ?>">
    </div>
    <div>
        <label for="tanggal_penetapan">Tanggal Penetapan</label>
        <input type="date" name="tanggal_penetapan" class="form-control" required value="<?= $kolom['tanggal_penetapan']; ?>">
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