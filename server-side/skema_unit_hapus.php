<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];
$kolom = get_single_data($koneksi, "skema_unit", "id_skema_unit", $id);
$data_terkait=0;
$data_terkait_elemen=get_jumlah_data($koneksi, "skema_elemen", "id_skema_unit",$id);
$data_terkait=$data_terkait_elemen;
?>

<form action="aksi/skema.php" method='post'>
    <input type="hidden" name="aksi" value="hapus-unit">
    <input type="hidden" name="id_skema_unit" value="<?= $id; ?>">
    <input type="hidden" name="id_skema" value="<?= $kolom['id_skema']; ?>">
    <label for="">Hasil Pengecekan Data Terkait</label>
    <table class="table" style="width:100%;">
        <tr>
            <td>Data Elemen Kompetensi</td>
            <td><?= number_format($data_terkait); ?> Data</td>
        </tr>
        
    </table>
    <?php if ($data_terkait > 0) { ?>
        <div class="alert alert-danger"><i>Keterangan : Tidak Dapat Menghapus Data Yang Memiliki Transaksi Terkait</i></div>
    <?php } else { ?>
        <button onclick="return confirm('Data yang dapat dihapus adalah data yang tidak tercatat pada transaksi terkait lainnya,Apakah anda yakin data ini dihapus??')" type="submit" class="btn btn-danger mt-2 btn-block"><i class="fas fa-trash"></i> Hapus Data</button>
    <?php } ?>
</form>