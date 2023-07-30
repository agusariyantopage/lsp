<?php
include "../koneksi.php";
include "../function.php";
$id = $_POST['id'];
$data_terkait=0;
$kolom_kuk = get_single_data($koneksi, "skema_kuk", "id_skema_kuk", $id);
$kolom_elemen = get_single_data($koneksi, "skema_elemen", "id_skema_elemen",$kolom_kuk['id_skema_elemen']);
$kolom_skema = get_single_data($koneksi, "skema_unit", "id_skema_unit",$kolom_elemen['id_skema_unit']);
?>

<form action="aksi/skema_kuk.php" method='post'>
    <input type="hidden" name="aksi" value="hapus">
    <input type="hidden" name="id_skema" value="<?= $kolom_skema['id_skema']; ?>">
    <input type="hidden" name="id_skema_elemen" value="<?= $kolom_elemen['id_skema_elemen']; ?>">
    <input type="hidden" name="id_skema_kuk" value="<?= $kolom_kuk['id_skema_kuk']; ?>">
    <label for="">Hasil Pengecekan Data Terkait <br><?= $kolom_kuk['kode_kuk']; ?> : <?= $kolom_kuk['judul_kuk']; ?></label>
    <table class="table" style="width:100%;">
        <tr>
            <td>Data Perangkat Uji Kompetensi</td>
            <td><?= number_format($data_terkait); ?> Data</td>
        </tr>
        
    </table>
    <?php if ($data_terkait > 0) { ?>
        <div class="alert alert-danger"><i>Keterangan : Tidak Dapat Menghapus Data Yang Memiliki Transaksi Terkait</i></div>
    <?php } else { ?>
        <button onclick="return confirm('Data yang dapat dihapus adalah data yang tidak tercatat pada transaksi terkait lainnya,Apakah anda yakin data ini dihapus??')" type="submit" class="btn btn-danger mt-2 btn-block"><i class="fas fa-trash"></i> Hapus Data</button>
    <?php } ?>
</form>