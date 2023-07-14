<?php
session_start();
include '../../koneksi.php';

//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Agus Ariyanto');
$pdf->SetTitle('Laporan Penjualan Per Lembaga');
$pdf->SetSubject('Laporan Penjualan Per Lembaga');
$pdf->SetKeywords('Laporan Penjualan Per Lembaga');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);
$pdf->AddPage();
$tanggal_awal = $_GET['tanggal_awal'];
$tanggal_akhir = $_GET['tanggal_akhir'];

$html = '<p style="text-align: center;"><strong>Rekap Belanja Lembaga / Unit Kerja</strong></p>
<table style="width:100%;">    
    <tr>
        <td style="width:10%;">Periode</td>
        <td style="width:50%;">: '.$tanggal_awal.' S/D '.$tanggal_akhir.' </td>
        <td style="width:15%;">Metode Bayar</td>
        <td style="width:25%;">: Semua Metode Bayar</td>
    </tr>
</table>
<br><br>
<table style=" border-collapse: collapse;" border="1">

    <tr>      
      <th align="center" style="width:5%;">#</th>
      <th align="center" style="width:35%;">Anggota</th>
      <th align="center" style="width:15%;">Alamat</th>
      <th align="center" style="width:30%;">Jenis</th>
      <th align="center" style="width:15%;">Total</th>
    </tr>

<tbody>';

$sql1="select nama,alamat,is_individual,sum(total) as kontribusi from jual,anggota where jual.id_anggota=anggota.id_anggota and is_individual=0 and jual.metode_bayar!='KAS' and (tanggal_transaksi BETWEEN '$tanggal_awal' and '$tanggal_akhir') group by nama";
$query1=mysqli_query($koneksi,$sql1);

$no=0;
$grandtotal=0;
while($kolom1=mysqli_fetch_array($query1)){
$no++;
$grandtotal=$grandtotal+$kolom1['kontribusi'];
if($kolom1['is_individual']==1){
    $tipe="Individu/Perseorangan";
} else {
    $tipe="Kelompok/Lembaga";
}
$html.='
        <tr>
            <td>'.$no.'</td>
            <td>'.$kolom1['nama'].'</td>
            <td>'.$kolom1['alamat'].'</td>
            <td>'.$tipe.'</td>
            <td align="right">'.number_format($kolom1['kontribusi']).'</td>
        </tr>
        ';
}        

$html.='<tr><td align="center" colspan="4">GRANDTOTAL</td>
        <td align="right">'.number_format($grandtotal).'</td></tr>
</tbody>
</table>
<br><br>
<i>-- Dicetak Pada : '.date('Y-m-d H:i:s').' --</i>
<p>&nbsp;</p>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Batas Laporan Detail
$sql0="select anggota.*,id_jual from anggota,jual where anggota.id_anggota=jual.id_anggota and is_individual=0 and jual.metode_bayar!='KAS' and (tanggal_transaksi BETWEEN '$tanggal_awal' and '$tanggal_akhir') GROUP by nama";
$query0=mysqli_query($koneksi,$sql0);
while($kolom0=mysqli_fetch_array($query0)){
    // add a page
    $id_anggota=$kolom0['id_anggota'];
    $pdf->AddPage();

    // writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
    // writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

    // create some HTML content
    $html = '<p style="text-align: center;"><strong>Rekapitulasi Belanja Barang
    <br>'.$kolom0['nama'].'</strong></p>
    <table style="width:100%;">    
        <tr>
            <td style="width:10%;">Periode</td>
            <td style="width:50%;">: '.$tanggal_awal.' S/D '.$tanggal_akhir.' </td>
            <td style="width:15%;">Metode Bayar</td>
            <td style="width:25%;">: Semua Metode Bayar</td>
        </tr>
    </table>
    <br><br>

    <table style=" border-collapse: collapse;" border="1">
    <tr>      
      <th align="center" style="width:5%;">#</th>
      <th align="center" style="width:55%;">Produk</th>
      <th align="center" style="width:15%;">Harga</th>
      <th align="center" style="width:10%;">Jumlah</th>
      <th align="center" style="width:15%;">Subtotal</th>
    </tr>

    <tbody>';

    $sql2="select jual_detail.*,produk.nama,jual.id_anggota,jual.tanggal_transaksi from jual_detail,produk,jual where jual_detail.id_produk=produk.id_produk and jual_detail.id_jual=jual.id_jual and id_anggota='$id_anggota' and jual.metode_bayar!='KAS' and (tanggal_transaksi BETWEEN '$tanggal_awal' and '$tanggal_akhir')";
    $query2=mysqli_query($koneksi,$sql2);
    $no=0;
    $grandtotal=0;
    while($kolom2=mysqli_fetch_array($query2)){
    $no++;
    $harga=number_format($kolom2['harga_jual']);
    $jumlah=number_format($kolom2['jumlah']);
    $subtotal=number_format($kolom2['jumlah']*$kolom2['harga_jual']);
    $grandtotal=$grandtotal+($kolom2['jumlah']*$kolom2['harga_jual']);
    $html.='
            <tr>
                <td>'.$no.'</td>
                <td>'.$kolom2['nama'].'</td>
                <td align="right">'.$harga.'</td>
                <td align="right">'.$jumlah.'</td>
                <td align="right">'.$subtotal.'</td>
            </tr>
            ';
    }        

    $html.='<tr><td align="center" colspan="4">GRANDTOTAL</td>
            <td align="right">'.number_format($grandtotal).'</td></tr>
    </tbody>
    </table>
    <br><br>
    <i>-- Dicetak Pada : '.date('Y-m-d H:i:s').' --</i>
    <p>&nbsp;</p>';

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');
}
//Close and output PDF document
$nama_file="laporan_belanja_lembaga_".date('Y_m_d_H_i_s').".pdf";
$pdf->Output($nama_file, 'I');


//============================================================+
// END OF FILE
//============================================================+
