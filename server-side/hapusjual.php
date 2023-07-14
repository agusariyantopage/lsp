<?php
include "../koneksi.php";
$id_jual = $_POST['idjual'];
$sql1="SELECT jual.*,anggota.nama as napel,akun.akun from jual,anggota,akun where jual.id_akun=akun.id_akun and jual.id_anggota=anggota.id_anggota and id_jual='$id_jual'";

$query1 = mysqli_query($koneksi, $sql1);
$kolom1 = mysqli_fetch_array($query1);

echo '

<div class="row">
		<div class="col-md-3 col-sm-6">No Transaksi</div>
		<div class="col-md-3 col-sm-6">: #' . $kolom1['id_jual'] . ' </div>
		<div class="col-md-3 col-sm-6">Tanggal Transaksi</div>
		<div class="col-md-3 col-sm-6">: ' . $kolom1['tanggal_transaksi'] . '</div>
</div>
<div class="row">
		<div class="col-md-3">Anggota</div>
		<div class="col-md-3">: ' . $kolom1['napel'] . ' </div>
		<div class="col-md-3">Metode Pembayaran</div>
		<div class="col-md-3">: ' . $kolom1['akun'] . '</div>
</div><br><b>DAMPAK PENGHAPUSAN</b>';
?>
<form action="aksi/penjualan.php" method="post">
    <table class="table table-bordered table-striped" style="width:100%;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Data Saat Ini</th>
                <th scope="col">Perubahan</th>
                <th scope="col">Menjadi</th>
            </tr>
        </thead>
        <tbody>

            <input type="hidden" name="aksi" value="hapus-penjualan">
            <input type="hidden" name="id_jual" value="<?= $kolom1['id_jual']; ?>">
            <input type="hidden" name="id_akun_jurnal" value="<?= $kolom1['id_akun_jurnal']; ?>">
            <input type="hidden" name="id_anggota" value="<?= $kolom1['id_anggota']; ?>">
            <?php

            $sql2 = "select jual_detail.*,produk.nama,produk.qty as qty_now,servis from jual_detail,produk where jual_detail.id_produk=produk.id_produk and id_jual='$id_jual'";
            $query2 = mysqli_query($koneksi, $sql2);
            $no = 0;
            $grandtotal = 0;
            $upd_stok="";
            while ($kolom2 = mysqli_fetch_array($query2)) {
                $no++;
                $qty_now = number_format($kolom2['qty_now']);
                if ($kolom2['servis'] == 1) {
                    $jumlah = number_format($kolom2['jumlah']);
                    $qty_after = 0;
                } else {
                    $jumlah = number_format($kolom2['jumlah']);
                    $qty_after = number_format($kolom2['qty_now'] + $kolom2['jumlah']);
                }

                $token = md5($kolom2['id_jual']);
                $res_sql1="update produk set qty=$qty_after where id_produk=$kolom2[id_produk] and servis=0;";
                $upd_stok=$upd_stok.$res_sql1;
                echo "
		<tr>
			<td>$no</td>			
			<td><b>STOK</b> $kolom2[nama]</td>
			<td align=right>$qty_now</td>
			<td align=right style='width:150px;'>$jumlah</td>
			<td align=right>$qty_after</td>
		</tr>
        <input type='hidden' name='id_produk[]' value='$kolom2[id_produk]'>
        <input type='hidden' name='qty[]' value='$qty_after'>
		";
            }
            ?>
            <input type="hidden" name="jumlah_item" value="<?= $no; ?>">
            <input type="hidden" name="perintah_update_stok" value="<?= $upd_stok; ?>">

        </tbody>

    </table>
    
    <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin akan menghapus data transaksi ini?')"><i class="fas fa-trash"></i> Proses Hapus</button>
</form>
