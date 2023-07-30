<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];
$kolom = get_single_data($koneksi, "muk", "id_muk", $id);
$kolom_master = get_single_data($koneksi, "muk_master", "id_muk_master", $kolom['id_muk_master']);
$id_skema=$kolom_master['id_skema'];
?>

<form method="post" enctype="multipart/form-data" action="aksi/muk.php">
    <input type="hidden" name="aksi" value="ubah">
    <table id="finditem" class="table table-sm table-bordered table-striped">
        <!-- Kepala Tabel -->
        <thead>
            <tr>
                <td>No</td>
                <td>Kode Unit</td>
                <td>Judul Unit</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <?php
        $no_unit = 0;
        $sql = "SELECT * from skema_unit WHERE id_skema=$id_skema AND dihapus_pada IS NULL";
        $query = mysqli_query($koneksi, $sql);
        while ($kolom = mysqli_fetch_array($query)) {
            $no_unit++;
        ?>
            <tr>
                <td><?= $no_unit; ?></td>
                <td><?= $kolom['kode_unit']; ?></td>
                <td><?= $kolom['judul_unit']; ?></td>
                <td>
                    <input type="checkbox" class="form-control-sm" name="id_unit">
                </td>
            </tr>

        <?php
        }
        ?>
    </table>
    <button type="submit" class="btn btn-primary btn-block mt-2"><i class="fas fa-save"></i> Simpan Pengaturan</button>
</form>