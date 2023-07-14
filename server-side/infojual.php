<?php
include "../koneksi.php";
$id_jual = $_POST['idjual'];
$sql1 = "SELECT jual.*,anggota.nama as napel,akun.akun from jual,anggota,akun where jual.id_akun=akun.id_akun and jual.id_anggota=anggota.id_anggota and id_jual='$id_jual'";

$query1 = mysqli_query($koneksi, $sql1);
$kolom1 = mysqli_fetch_array($query1);
$diskon=$kolom1['diskon'];

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
</div><br>';
?>
<table class="table table-bordered table-striped table-sm" style="width:100%;">
	<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">ID</th>
			<th scope="col">Produk</th>
			<th scope="col">Harga</th>
			<th scope="col">Jumlah</th>
			<th scope="col">Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php

		$sql2 = "select jual_detail.*,produk.nama from jual_detail,produk where jual_detail.id_produk=produk.id_produk and id_jual	='$id_jual'";
		$query2 = mysqli_query($koneksi, $sql2);
		$no = 0;
		$grandtotal = 0;
		while ($kolom2 = mysqli_fetch_array($query2)) {
			$no++;
			$harga = number_format($kolom2['harga_jual']);
			$jumlah = number_format($kolom2['jumlah'],2);
			$subtotal = number_format($kolom2['jumlah'] * $kolom2['harga_jual']);
			$grandtotal = $grandtotal + ($kolom2['jumlah'] * $kolom2['harga_jual']);
			$token = md5($kolom2['id_jual']);
			echo "
		<tr>
			<td>$no</td>
			<td>$kolom2[id_produk]</td>
			<td>$kolom2[nama]</td>
			<td align=right>$harga</td>
			<td align=right style='width:150px;'>$jumlah</td>
			<td align=right>$subtotal</td>
		</tr>
		";
		}
		?>

	</tbody>
	<tfoot>
		<tr>
			<td align='center' colspan="5">TOTAL</td>
			<td align='right'>
				<p><?= number_format($grandtotal); ?></p>
			</td>
		</tr>
		<tr>
			<td align='center' colspan="5">DISKON</td>
			<td align='right'>
				<p><?= number_format($diskon); ?></p>
			</td>
		</tr>
		<tr>
			<td align='center' colspan="5">GRANDTOTAL</td>
			<td align='right'>
				<p><?= number_format($grandtotal-$diskon); ?></p>
			</td>
		</tr>
	</tfoot>
</table>