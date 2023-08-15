<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];
$kolom = get_single_data($koneksi, "muk", "id_muk", $id);
$kolom_master = get_single_data($koneksi, "muk_master", "id_muk_master", $kolom['id_muk_master']);
$id_skema = $kolom_master['id_skema'];
?>
<h6><b><?= strtoupper($kolom_master['deskripsi']); ?> / <?= strtoupper($kolom['nama_muk']); ?> [<?= $kolom['kode_muk']; ?>]</b></h6>
<ul class="nav nav-pills">
  <li class="nav-item md-6"><a class="nav-link active mb-2 md-6" href="#view" data-toggle="tab"><i class="fas fa-eye"></i> Aktif</a></li>
  <li class="nav-item md-6"><a class="nav-link mb-2 md-6" href="#tambah" data-toggle="tab"><i class="fa fa-plus"></i> Tambah</a></li>

</ul>
<div class="tab-content">
  <div class="active tab-pane" id="view">
    Unit Kerja Terpilih
    <form method="post" enctype="multipart/form-data" action="aksi/muk.php">
      <input type="hidden" name="aksi" value="setup-hapus-unit">
      <input type="hidden" name="id_muk" value="<?= $id; ?>">

      <table id="finditemx" class="table table-sm table-bordered table-striped" style="width: 100%;">
        <!-- Kepala Tabel -->
        <thead align="center">
          <tr>
            <th>No</th>
            <th>Kode Unit</th>
            <th>Judul Unit</th>
            <th>Pilih</th>
          </tr>
        </thead>
        <?php
        $no_unit = 0;
        $sql = "SELECT id_muk_unit,skema_unit.* from muk_unit,skema_unit WHERE muk_unit.id_skema_unit=skema_unit.id_skema_unit AND muk_unit.id_muk=$id AND muk_unit.dihapus_pada IS NULL";
        $query = mysqli_query($koneksi, $sql);
        while ($kolom = mysqli_fetch_array($query)) {
          $no_unit++;
        ?>
          <tr>
            <td><?= $no_unit; ?></td>
            <td><?= $kolom['kode_unit']; ?></td>
            <td><?= $kolom['judul_unit']; ?></td>
            <td align="center">
              <input type="checkbox" class="form-control-sm" name="id_unit[]" value="<?= $kolom['id_skema_unit']; ?>">
            </td>
          </tr>

        <?php
        }
        ?>
      </table>
      <input type="hidden" name="jumlah_unit" value="<?= $no_unit; ?>">
      <?php if ($no_unit > 0) { ?>
        <button type="submit" class="btn btn-danger btn-block mt-2"><i class="fas fa-trash"></i> Hapus Unit Kerja Terpilih</button>
      <?php } ?>
    </form>
  </div>

  <div class="tab-pane" id="tambah">
    Unit Kerja Tersedia
    <form method="post" enctype="multipart/form-data" action="aksi/muk.php">
      <input type="hidden" name="aksi" value="setup">
      <input type="hidden" name="id_muk" value="<?= $id; ?>">

      <table id="finditemx" class="table table-sm table-bordered table-striped" style="width: 100%;">
        <!-- Kepala Tabel -->
        <thead align="center">
          <tr>
            <th>No</th>
            <th>Kode Unit</th>
            <th>Judul Unit</th>
            <th>Pilih</th>
          </tr>
        </thead>
        <?php
        $no_unit = 0;
        // $sql = "SELECT * from skema_unit WHERE id_skema=$id_skema AND dihapus_pada IS NULL";
        $sql = "SELECT * from skema_unit WHERE id_skema=$id_skema AND dihapus_pada IS NULL AND id_skema_unit NOT IN (SELECT id_skema_unit FROM muk_unit WHERE id_muk=$id AND muk_unit.dihapus_pada IS NULL)";
        $query = mysqli_query($koneksi, $sql);
        while ($kolom = mysqli_fetch_array($query)) {
          $no_unit++;
        ?>
          <tr>
            <td><?= $no_unit; ?></td>
            <td><?= $kolom['kode_unit']; ?></td>
            <td><?= $kolom['judul_unit']; ?></td>
            <td align="center">
              <input type="checkbox" class="form-control-sm" name="id_unit[]" value="<?= $kolom['id_skema_unit']; ?>">
            </td>
          </tr>

        <?php
        }
        ?>
      </table>
      <input type="hidden" name="jumlah_unit" value="<?= $no_unit; ?>">
      <?php if ($no_unit > 0) { ?>
        <button type="submit" class="btn btn-primary btn-block mt-2"><i class="fas fa-plus"></i> Tambahkan Unit Kerja</button>
      <?php } ?>
    </form>
  </div>
</div>
<script>
  $(function() {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#finditem').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
    $('#noorder').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
    $('#noorder-nopaging').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
    $('#polos').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#polos_wrapper .col-md-6:eq(0)');
  });
</script>