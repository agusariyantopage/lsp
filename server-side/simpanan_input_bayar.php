<?php
include "../koneksi.php";
$id_simpanan_detail = $_POST['id_simpanan_detail'];
$id_simpanan = $_POST['id_simpanan'];

$sql = "SELECT * FROM simpanan_detail WHERE id_simpanan=$id_simpanan AND realisasi_pembayaran<anggaran_pembayaran ORDER BY urut LIMIT 1";

$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$id_simpanan_detail=$data['id_simpanan_detail'];
?>

<form action="aksi/simpanan.php" method='post'>
    <input type="hidden" name="aksi" value="simpanan-input-bayar">
    <input type="hidden" class="form-control" name="id_simpanan_detail" value="<?= $id_simpanan_detail; ?>">
    <input type="hidden" name="id_simpanan" value="<?= $id_simpanan; ?>">
    <label for="urut">Pembayaran Ke </label>
    <input type="number" name="urut" id="urut" class="form-control" value="<?= $data['urut']; ?>" required readonly>
    <label for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</label>
    <input type="date" name="tanggal_jatuh_tempo" id="tanggal_jatuh_tempo" class="form-control" value="<?= $data['tanggal_jatuh_tempo']; ?>" required readonly>
    <label for="tanggal_realisasi_bayar">Tanggal Pembayaran</label>
    <input type="date" name="tanggal_realisasi_bayar" id="tanggal_realisasi_bayar" class="form-control" required>
    <label for="realisasi_pembayaran">Nominal Pembayaran</label>
    <input type="number" name="realisasi_pembayaran" id="realisasi_pembayaran" class="form-control" value="<?= $data['anggaran_pembayaran']-$data['realisasi_pembayaran']; ?>" max="<?= $data['anggaran_pembayaran']-$data['realisasi_pembayaran']; ?>" required>
    <button type="submit" class="btn btn-info mt-2 btn-block"><i class="fas fa-save"></i> Bayar</button>
</form>