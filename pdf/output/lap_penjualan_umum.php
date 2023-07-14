<?php
session_start();
include '../../koneksi.php';
include '../../function.php';

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
$pdf->SetTitle('Laporan Penjualan - Umum');
$pdf->SetSubject('Laporan Penjualan');
$pdf->SetKeywords('Laporan Penjualan');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();
$tanggal_awal = $_GET['tanggal_awal'];
$tanggal_akhir = $_GET['tanggal_akhir'];
// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '<p style="text-align: center;"><strong>Laporan Transaksi Penjualan</strong></p>
<table style="width:100%;">    
    <tr>
        <td style="width:10%;">Periode</td>
        <td style="width:50%;">: ' . $tanggal_awal . ' S/D ' . $tanggal_akhir . ' </td>
        <td style="width:15%;">Metode Bayar</td>
        <td style="width:25%;">: Semua Metode Bayar</td>
    </tr>
</table>
<br><br>
<table style=" border-collapse: collapse;" border="1">
    <tr>      
      <th align="center" style="width:5%;">#</th>
      <th align="center" style="width:35%;">Anggota</th>
      <th align="center" style="width:15%;">Tanggal Transaksi</th>
      <th align="center" style="width:30%;">Metode Bayar</th>
      <th align="center" style="width:15%;">Total</th>
    </tr>

<tbody>';

$sql1 = "select jual.*,nama from jual,anggota where jual.id_anggota=anggota.id_anggota and (tanggal_transaksi BETWEEN '$tanggal_awal' and '$tanggal_akhir')";
$query1 = mysqli_query($koneksi, $sql1);

$no = 0;
$grandtotal = 0;
while ($kolom1 = mysqli_fetch_array($query1)) {
    $no++;
    $grandtotal = $grandtotal + $kolom1['total'];
    $html .= '
        <tr>
            <td>' . $no . '</td>
            <td>' . $kolom1['nama'] . '</td>
            <td>' . $kolom1['tanggal_transaksi'] . '</td>
            <td>' . get_nama_akun($koneksi,$kolom1['id_akun']) . '</td>
            <td align="right">' . number_format($kolom1['total']) . '</td>
        </tr>
        ';
}

$html .= '<tr><td align="center" colspan="4">GRANDTOTAL</td>
        <td align="right">' . number_format($grandtotal) . '</td></tr>
</tbody>
</table>
<br><br>
<i>-- Dicetak Pada : ' . date('Y-m-d H:i:s') . ' --</i>
<p>&nbsp;</p>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$nama_file="laporan_penjualan_umum_".date('Y_m_d_H_i_s').".pdf";
$pdf->Output($nama_file, 'I');

//============================================================+
// END OF FILE
//============================================================+
