<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];
$kolom = get_single_data($koneksi, "asesor", "id_asesor", $id);
?>

<form method="post" enctype="multipart/form-data" action="aksi/asesor.php">
    <input type="hidden" name="aksi" value="ubah">
    <input type="hidden" name="id_asesor" value="<?= $kolom['id_asesor']; ?>">
    <div>
        <label for="nomor_registrasi">Nomor Registrasi Asesor</label>
        <input type="text" name="nomor_registrasi" class="form-control" required value="<?= $kolom['nomor_registrasi']; ?>">
    </div>
    <div>
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" required value="<?= $kolom['nama']; ?>">
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="kewarganegaraan">Kewarganegaraan</label>
            <input type="text" name="kewarganegaraan" class="form-control" required value="<?= $kolom['kewarganegaraan']; ?>">
        </div>
        <div class="col-md-6">
            <label for="nik">Nomor Induk Kependudukan</label>
            <input type="text" name="nik" class="form-control" required value="<?= $kolom['nik']; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" required value="<?= $kolom['tempat_lahir']; ?>">
        </div>
        <div class="col-md-4">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required value="<?= $kolom['tanggal_lahir']; ?>">
        </div>
        <div class="col-md-4">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <?php echo ($kolom['jenis_kelamin'] == 'Laki-Laki') ? "<option value='$kolom[jenis_kelamin]' selected>Laki-Laki</option>" : "<option>Laki-Laki</option>"; ?>
                <?php echo ($kolom['jenis_kelamin'] == 'Perempuan') ? "<option value='$kolom[jenis_kelamin]' selected>Perempuan</option>" : "<option>Perempuan</option>"; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
            <select name="pendidikan_terakhir" class="form-control" required>
                <option value="">-- Pilih Pendidikan Terakhir --</option>
                <?php echo ($kolom['pendidikan_terakhir'] == 'SD') ? "<option value='$kolom[pendidikan_terakhir]' selected>SD</option>" : "<option>SD</option>"; ?>
                <?php echo ($kolom['pendidikan_terakhir'] == 'SMP') ? "<option value='$kolom[pendidikan_terakhir]' selected>SMP</option>" : "<option>SMP</option>"; ?>
                <?php echo ($kolom['pendidikan_terakhir'] == 'SMA') ? "<option value='$kolom[pendidikan_terakhir]' selected>SMA</option>" : "<option>SMA</option>"; ?>
                <?php echo ($kolom['pendidikan_terakhir'] == 'D1') ? "<option value='$kolom[pendidikan_terakhir]' selected>D1</option>" : "<option>D1</option>"; ?>
                <?php echo ($kolom['pendidikan_terakhir'] == 'D2') ? "<option value='$kolom[pendidikan_terakhir]' selected>D2</option>" : "<option>D2</option>"; ?>
                <?php echo ($kolom['pendidikan_terakhir'] == 'D3') ? "<option value='$kolom[pendidikan_terakhir]' selected>D3</option>" : "<option>D3</option>"; ?>
                <?php echo ($kolom['pendidikan_terakhir'] == 'D4') ? "<option value='$kolom[pendidikan_terakhir]' selected>D4</option>" : "<option>D4</option>"; ?>
                <?php echo ($kolom['pendidikan_terakhir'] == 'S1') ? "<option value='$kolom[pendidikan_terakhir]' selected>S1</option>" : "<option>S1</option>"; ?>
                <?php echo ($kolom['pendidikan_terakhir'] == 'S2') ? "<option value='$kolom[pendidikan_terakhir]' selected>S2</option>" : "<option>S2</option>"; ?>
                <?php echo ($kolom['pendidikan_terakhir'] == 'S3') ? "<option value='$kolom[pendidikan_terakhir]' selected>S3</option>" : "<option>S3</option>"; ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" required value="<?= $kolom['pekerjaan']; ?>">
        </div>
    </div>
    <div>
        <label for="alamat">Alamat</label>
        <textarea name="alamat" class="form-control" required><?= $kolom['alamat']; ?></textarea>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="no_hp">Nomor Handphone</label>
            <input type="text" pattern="[0-9]+" name="no_hp" class="form-control" required value="<?= $kolom['no_hp']; ?>">
        </div>

        <div class="col-md-6">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required value="<?= $kolom['email']; ?>">
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-block mt-2">Ubah</button>
</form>