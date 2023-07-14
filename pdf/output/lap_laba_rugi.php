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
$pdf->SetTitle('Laporan Laba Rugi');
$pdf->SetSubject('Laporan Laba Rugi');
$pdf->SetKeywords('Laporan Laba Rugi');

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
$html = '<p style="text-align: center;"><strong>Laporan Laba Rugi Toko</strong></p>
<table style="width:100%;">    
    <tr>
        <td style="width:10%;">Periode</td>
        <td style="width:90%;">: ' . $tanggal_awal . ' S/D ' . $tanggal_akhir . ' </td>
        
    </tr>
</table>
<br><br>
';

$html .= '
<table>
    <tr>
        <td colspan="3">PENDAPATAN</td>
    </tr>
    ';
$total_pemasukan = 0;
$sql_pendapatan = "SELECT akun,sum(kredit-debet) as total_pendapatan from akun_mutasi,akun_jurnal,akun where akun_mutasi.id_akun_jurnal=akun_jurnal.id_akun_jurnal and akun_mutasi.id_akun=akun.id_akun and akun.tipe='pendapatan' GROUP BY akun_mutasi.id_akun";
$query_pendapatan = mysqli_query($koneksi, $sql_pendapatan);
while ($kolom_pendapatan = mysqli_fetch_array($query_pendapatan)) {
    $total_pemasukan = $total_pemasukan + $kolom_pendapatan['total_pendapatan'];
    $html .= ' 
    <tr>
        <td></td>
        <td>' . $kolom_pendapatan['akun'] . '</td>
        <td align="right"> Rp. ' . number_format($kolom_pendapatan['total_pendapatan']) . '</td>
    </tr>
    ';
}

$html .= '  
    <tr>
        <td></td>
        <td style="border-top: 1px solid #000;">Total</td>
        <td style="border-top: 1px solid #000;" align="right"> Rp. ' . number_format($total_pemasukan) . '</td>
    </tr>

    <tr>
        <td colspan="3">BEBAN / BIAYA</td>
    </tr>';
$total_biaya = 0;
$sql_biaya = "SELECT akun,sum(debet-kredit) as total_biaya from akun_mutasi,akun_jurnal,akun where akun_mutasi.id_akun_jurnal=akun_jurnal.id_akun_jurnal and akun_mutasi.id_akun=akun.id_akun and akun.tipe='biaya' GROUP BY akun_mutasi.id_akun";
$query_biaya = mysqli_query($koneksi, $sql_biaya);
while ($kolom_biaya = mysqli_fetch_array($query_biaya)) {
    $total_biaya = $total_biaya + $kolom_biaya['total_biaya'];
    $html .= ' 
    <tr>
        <td></td>
        <td>' . $kolom_biaya['akun'] . '</td>
        <td align="right"> Rp. ' . number_format($kolom_biaya['total_biaya']) . '</td>
    </tr>
    ';
}

$html .= '
    <tr>
    <td></td>
    <td style="border-top: 1px solid #000;">Total</td>
    <td style="border-top: 1px solid #000;" align="right"> Rp. ' . number_format($total_biaya) . '</td>
    </tr>
    <tr>
    <td></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000;"  colspan="2"><b>LABA / RUGI</b></td>
        <td style="border-top: 1px solid #000;" align="right"> Rp. ' . number_format($total_pemasukan - $total_biaya) . '</td>
    </tr>
</table>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$nama_file = "laporan_laba_rugi_" . date('Y_m_d_H_i_s') . ".pdf";
$pdf->Output($nama_file, 'I');

//============================================================+
// END OF FILE
//============================================================+
