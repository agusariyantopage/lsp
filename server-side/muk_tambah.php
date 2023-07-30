<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];
$kolom = get_single_data($koneksi, "muk_master", "id_muk_master", $id);
?>

<form method="post" enctype="multipart/form-data" action="aksi/muk.php">
    <input type="hidden" name="aksi" value="tambah">
    <input type="hidden" name="id_muk_master" value="<?= $id; ?>">

    <div>
        <label for="deskripsi">Master Materi Uji Kompetensi</label>
        <textarea name="deskripsi" class="form-control" rows="3" disabled><?= $kolom['deskripsi']; ?></textarea>
    </div>
    <div>
        <label for="kode_muk">Kode Materi Uji Kompetensi</label>
        <input type="text" name="kode_muk" class="form-control" required>
    </div>
    <div>
        <label for="nama_muk">Judul Materi Uji Kompetensi</label>
        <textarea name="nama_muk" class="form-control" rows="3" required></textarea>
    </div>
    <div>
        <label for="jenis_muk">Jenis Materi Uji Kompetensi</label>
        <input type="text" name="jenis_muk" class="form-control">
    </div>
    <div>
        <label for="tanggal_penetapan">Tanggal Penetapan</label>
        <input type="date" name="tanggal_penetapan" class="form-control" required>
    </div>
    <div>
        <label for="status">Status</label>
        <select name="status" class="form-control" required>
            <option value="">-- Pilih Status --</option>
            <option>Aktif</option>
            <option>Non Aktif</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-2">Tambah</button>
</form>