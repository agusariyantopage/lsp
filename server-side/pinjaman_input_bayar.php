<?php
include "../koneksi.php";
$id_pinjaman = $_POST['id_pinjaman'];

$sql_cek_urut = "SELECT COUNT(id_pinjaman) AS pembayaran_ke FROM pinjaman_mutasi WHERE id_pinjaman=$id_pinjaman";
$query_cek_urut = mysqli_query($koneksi, $sql_cek_urut);
$data_cek_urut = mysqli_fetch_array($query_cek_urut);
$urut = $data_cek_urut['pembayaran_ke'] + 1;

$sql_umum = "SELECT * FROM pinjaman WHERE id_pinjaman=$id_pinjaman";
$query_umum = mysqli_query($koneksi, $sql_umum);
$data_umum = mysqli_fetch_array($query_umum);
$pagu_bulanan = $data_umum['pagu_bulanan'];
$bunga_persen = $data_umum['bunga_tahunan'] / 12;
$bunga_nominal = round($bunga_persen * $data_umum['saldo_terakhir'] / 100);

if ($pagu_bulanan > 0) {
  $cicilan_nominal=$pagu_bulanan-$bunga_nominal;
  if (($cicilan_nominal * 2) > $data_umum['saldo_terakhir']) {
    $cicilan_nominal = round($data_umum['saldo_terakhir']);
  }
} else {
  $cicilan_nominal = round($data_umum['jumlah_pinjaman'] / $data_umum['durasi_kontrak_bulan']);
  if (($cicilan_nominal * 2) > $data_umum['saldo_terakhir']) {
    $cicilan_nominal = round($data_umum['saldo_terakhir']);
  }
}

$tanggal_awal = $data_umum['tanggal_awal_kontrak'];
$tahunTransaksi = substr($tanggal_awal, 0, 4);
$bulanTransaksi = substr($tanggal_awal, 5, 2);
$hariTransaksi = substr($tanggal_awal, 8, 2);

if ($hariTransaksi > 28) { // Maksimal Tutup Buku Diatur Setiap Tanggal 28
  $hariTransaksi = 28;
}
$bulanTransaksi = (int)$bulanTransaksi + ($urut - 0);
if ($bulanTransaksi > 12) {
  //$tahun_inc=round($bulanTransaksi/12,0,PHP_ROUND_HALF_DOWN);
  $tahun_inc = floor($bulanTransaksi / 12);
  $tahunTransaksi = $tahunTransaksi + $tahun_inc;
  $bulanTransaksi = $bulanTransaksi - (12 * $tahun_inc);
  if ($bulanTransaksi == 0) {
    $bulanTransaksi = 12;
    $tahunTransaksi = $tahunTransaksi - 1;
  }
}
$bulanTransaksi = "" . $bulanTransaksi;
if (strlen($bulanTransaksi) == 1) {
  $bulanTransaksi = "0" . $bulanTransaksi;
} else {
  $bulanTransaksi = $bulanTransaksi;
}
$tanggal_jatuh_tempo = $tahunTransaksi . "-" . $bulanTransaksi . "-" . $hariTransaksi;

?>

<form action="aksi/pinjaman.php" method='post'>
  <input type="hidden" name="aksi" value="pinjaman-input-bayar">
  <input type="hidden" class="form-control" name="id_pinjaman_detail" value="<?= $id_pinjaman_detail; ?>">
  <input type="hidden" name="id_pinjaman" value="<?= $id_pinjaman; ?>">

  <label for="urut">Pembayaran Ke </label>
  <input type="number" name="urut" id="urut" class="form-control" value="<?= $urut; ?>" required readonly>

  <label for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</label>
  <input type="date" name="tanggal_jatuh_tempo" id="tanggal_jatuh_tempo" class="form-control" value="<?= $tanggal_jatuh_tempo; ?>" required>

  <label for="tanggal_realisasi_bayar">Tanggal Pembayaran</label>
  <input type="date" name="tanggal_realisasi_bayar" id="tanggal_realisasi_bayar" class="form-control" value="<?= date('Y-m-d'); ?>" required>

  <label for="cicilan_pokok">Pokok</label>
  <input type="text" name="cicilan_pokok" id="cicilan_pokok" value="<?= $cicilan_nominal; ?>" class="form-control number-separator text-right" required readonly>

  <label for="bunga">Bunga</label>
  <input type="text" name="bunga" id="bunga" value="<?= $bunga_nominal; ?>" class="form-control number-separator text-right" required readonly>

  <label for="jumlah">Total Angsuran</label>
  <input type="text" name="jumlah" id="jumlah" value="<?= $cicilan_nominal + $bunga_nominal; ?>" class="form-control number-separator text-right" required>

  <?php if ($data_umum['saldo_terakhir'] > 0) { ?>
    <button type="submit" class="btn btn-info mt-2 btn-block"><i class="fas fa-save"></i> Bayar</button>
  <?php } ?>
</form>

<!-- numberformatter -->
<script src="../dist/js/easy-number-separator.js"></script>

<script>
  easyNumberSeparator({
    selector: '.number-separator',
    separator: ',',
    resultInput: '#result_input',
  });

  function hitung_porsi_angsuran(evt) {
    var jumlah = document.getElementById("jumlah").value;
    jumlah = jumlah.replace(/,/gi, '');
    var bunga = document.getElementById("bunga").value;
    bunga = bunga.replace(/,/gi, '');
    var cicilan_pokok = document.getElementById("cicilan_pokok").value;
    cicilan_pokok = cicilan_pokok.replace(/,/gi, '');
    cicilan_pokok = jumlah - bunga;
    cicilan_pokok = cicilan_pokok.toLocaleString('en-US');
    // document.getElementById("cicilan_pokok").innerHTML="Rp. "+kembali;
    document.getElementById("cicilan_pokok").value = cicilan_pokok;
  }

  document.getElementById('jumlah').addEventListener("mouseup", function(evt) {
    hitung_porsi_angsuran();
  }, false);
  document.getElementById('jumlah').addEventListener("keyup", function(evt) {
    hitung_porsi_angsuran();
  }, false);
</script>