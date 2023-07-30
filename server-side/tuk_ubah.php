<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];
$kolom = get_single_data($koneksi, "tuk", "id_tuk", $id);
?>

<form method="post" enctype="multipart/form-data" action="aksi/tuk.php">
    <input type="hidden" name="aksi" value="ubah">
    <input type="hidden" name="id_tuk" value="<?= $kolom['id_tuk']; ?>">
    <div>
        <label for="kode_tuk">Kode TUK</label>
        <input type="text" name="kode_tuk" class="form-control" required value="<?= $kolom['kode_tuk']; ?>">
    </div>
    <div>
        <label for="nama_tuk">Nama TUK</label>
        <input type="text" name="nama_tuk" class="form-control" required value="<?= $kolom['nama_tuk']; ?>">
    </div>
    <div>
        <label for="jenis_tuk">Jenis TUK</label>
        <input type="text" name="jenis_tuk" class="form-control" required value="<?= $kolom['jenis_tuk']; ?>">
    </div>
    <div>
        <label for="alamat">Alamat</label>
        <textarea name="alamat" class="form-control" required><?= $kolom['alamat']; ?></textarea>
    </div>
    <div>
        <label for="no_telepon">Nomor Telepon</label>
        <input type="text" pattern="[0-9]+" name="no_telepon" class="form-control" required value="<?= $kolom['no_telepon']; ?>">
    </div>
    <div>
        <label for="no_hp">Nomor Handphone</label>
        <input type="text" pattern="[0-9]+" name="no_hp" class="form-control" required value="<?= $kolom['no_hp']; ?>">
    </div>
    <div>
        <label for="no_fax">Nomor Fax</label>
        <input type="text" pattern="[0-9]+" name="no_fax" class="form-control" value="<?= $kolom['no_fax']; ?>">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" required value="<?= $kolom['email']; ?>">
    </div>

    <button type="submit" class="btn btn-primary btn-block mt-2">Ubah</button>
</form>