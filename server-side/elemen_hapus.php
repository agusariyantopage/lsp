<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];
$data_terkait=0;
$kolom_elemen = get_single_data($koneksi, "skema_elemen", "id_skema_elemen",$id);
$kolom_skema = get_single_data($koneksi, "skema_unit", "id_skema_unit",$kolom_elemen['id_skema_unit']);
$data_terkait_kuk=get_jumlah_data($koneksi, "skema_kuk", "id_skema_elemen",$id);
$data_terkait=$data_terkait_kuk;
?>

<form action="aksi/skema_elemen.php" method='post'>
    <input type="hidden" name="aksi" value="hapus">
    <input type="hidden" name="id_skema" value="<?= $kolom_skema['id_skema']; ?>">
    <input type="hidden" name="id_skema_elemen" value="<?= $kolom_elemen['id_skema_elemen']; ?>">
    <label for="">Hasil Pengecekan Data Terkait <br>Elemen Kompetensi : (<?= $kolom_elemen['kode_elemen']; ?>) <?= $kolom_elemen['judul_elemen']; ?></label>
    <table class="table" style="width:100%;">
        <tr>
            <td>Data Kriteria Unjuk Kerja (KUK)</td>
            <td><?= number_format($data_terkait); ?> Data</td>
        </tr>
        
    </table>
    <?php if ($data_terkait > 0) { ?>
        <div class="alert alert-danger"><i>Keterangan : Tidak Dapat Menghapus Data Yang Memiliki Transaksi Terkait</i></div>
    <?php } else { ?>
        <button onclick="return confirm('Data yang dapat dihapus adalah data yang tidak tercatat pada transaksi terkait lainnya,Apakah anda yakin data ini dihapus??')" type="submit" class="btn btn-danger mt-2 btn-block"><i class="fas fa-trash"></i> Hapus Data</button>
    <?php } ?>
</form>