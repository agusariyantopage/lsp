<?php
include "../koneksi.php";
$id_beli= $_POST['idbeli'];
$sql1="select beli.*,pemasok.nama as nama_pemasok from beli,pemasok where beli.id_pemasok=pemasok.id_pemasok and id_beli='$id_beli'";

$query1=mysqli_query($koneksi,$sql1);
$kolom1=mysqli_fetch_array($query1);

echo '
<div class="row">
    <div class="col-md-3">No Transaksi</div>
    <div class="col-md-3">: #'.$kolom1['id_beli'].' </div>
    <div class="col-md-3">Tanggal Transaksi</div>
    <div class="col-md-3">: '.$kolom1['tanggal_transaksi'].'</div>
</div>
<div class="row">
    <div class="col-md-3">Anggota</div>
    <div class="col-md-3">: '.$kolom1['nama_pemasok'].' </div>
    <div class="col-md-3">Metode Pembayaran</div>
    <div class="col-md-3">: '.$kolom1['metode_bayar'].'</div>
</div>                            
<br>
';
?>

<table class="table table-bordered table-striped" style="width:100%;">
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

$sql2="select beli_detail.*,produk.nama from beli_detail,produk where beli_detail.id_produk=produk.id_produk and id_beli=$id_beli";
$query2=mysqli_query($koneksi,$sql2);                  
$no=0;
$grandtotal=0;
while($kolom2=mysqli_fetch_array($query2)){
$no++;
$harga=number_format($kolom2['harga_beli']);
$jumlah=number_format($kolom2['jumlah']);
$subtotal=number_format($kolom2['jumlah']*$kolom2['harga_beli']);
$grandtotal=$grandtotal+($kolom2['jumlah']*$kolom2['harga_beli']);
$token=md5($kolom2['id_beli']);
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
<td align='center' colspan="5">GRANDTOTAL</td>
<td align='right'><p><?= number_format($grandtotal); ?></p></td>
</tfoot>
</table>   