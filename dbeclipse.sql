-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Bulan Mei 2023 pada 02.53
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbeclipse`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(10) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `akun` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL DEFAULT '-',
  `saldo` decimal(17,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `kode`, `akun`, `tipe`, `keterangan`, `saldo`) VALUES
(1, '1.0.0', 'Aktiva', 'Asset', '-', '0.00'),
(2, '1.1.0', 'Aktiva Lancar', 'Asset', '-', '0.00'),
(3, '1.1.1', 'Kas Toko', 'Asset', '-', '0.00'),
(4, '1.1.2', 'Kas Besar', 'Asset', '-', '0.00'),
(5, '1.1.3', 'Bank BCA', 'Asset', 'Pembayaran Non Tunai', '0.00'),
(6, '1.1.4', 'Bank Mandiri', 'Asset', 'Pembayaran Non Tunai', '0.00'),
(7, '1.1.1', 'Asuransi Dibayar Dimuka', 'Asset', '-', '0.00'),
(8, '1.1.1', 'Peralatan', 'Asset', '-', '0.00'),
(9, '1.2.0', 'Persediaan', 'Asset', '-', '0.00'),
(10, '1.2.1', 'Persediaan Bahan Baku', 'Asset', '-', '0.00'),
(11, '1.2.2', 'Persediaan Barang Jadi', 'Asset', '-', '0.00'),
(12, '1.3.0', 'Aktiva Tetap', 'Asset', '-', '0.00'),
(13, '1.3.1', 'Peralatan', 'Asset', '-', '0.00'),
(14, '1.3.2', 'Akumulasi Penyusutan Peralatan', 'Asset', '-', '0.00'),
(15, '1.3.3', 'Kendaraan', 'Asset', '-', '0.00'),
(16, '1.3.4', 'Akumulasi Penyusutan Kendaraan', 'Asset', '-', '0.00'),
(17, '1.3.5', 'Gedung', 'Asset', '-', '0.00'),
(18, '1.3.6', 'Akumulasi Penyusutan Gedung', 'Asset', '-', '0.00'),
(19, '1.3.7', 'Tanah', 'Asset', '-', '0.00'),
(20, '1.4.0', 'Aktiva Lain - Lain', 'Asset', '-', '0.00'),
(21, '1.4.1', 'Beban Yang Ditangguhkan', 'Asset', '-', '0.00'),
(22, '1.4.2', 'Beban Emisi Saham', 'Asset', '-', '0.00'),
(23, '2.0.0', 'Kewajiban', 'Hutang', '-', '0.00'),
(24, '2.1.0', 'Kewajiban Jangka Pendek', 'Hutang', '-', '0.00'),
(25, '2.1.1', 'Utang Usaha', 'Hutang', '-', '0.00'),
(26, '2.1.2', 'Utang Wesel', 'Hutang', '-', '0.00'),
(27, '2.1.3', 'Utang Gaji', 'Hutang', '-', '0.00'),
(28, '2.1.4', 'Utang Sewa Gedung', 'Hutang', '-', '0.00'),
(29, '2.1.5', 'Beban Yang Masih Harus Dibayar', 'Hutang', '-', '0.00'),
(30, '2.1.6', 'Utang Pajak', 'Hutang', '-', '0.00'),
(31, '2.2.0', 'Kewajiban Jangka Panjang', 'Hutang', '-', '0.00'),
(32, '2.2.1', 'Utang Hipotek', 'Hutang', '-', '0.00'),
(33, '2.2.3', 'Utang Obligasi', 'Hutang', '-', '0.00'),
(34, '3.0.0', 'Modal', 'Modal', '-', '0.00'),
(35, '3.1.0', 'Modal Pemilik', 'Modal', '-', '0.00'),
(36, '3.2.0', 'Prive', 'Modal', '-', '0.00'),
(37, '3.3.0', 'Laba Ditahan', 'Modal', '-', '0.00'),
(38, '4.0.0', 'Pendapatan', 'Pendapatan', '-', '0.00'),
(39, '4.1.0', 'Pendapatan Usaha', 'Pendapatan', '-', '0.00'),
(40, '4.1.1', 'Pendapatan Penjualan', 'Pendapatan', '-', '0.00'),
(41, '4.1.2', 'Pendapatan Lain Lain', 'Pendapatan', '-', '0.00'),
(42, '4.2.0', 'Pendapatan Diluar Usaha', 'Pendapatan', '-', '0.00'),
(43, '4.2.1', 'Jasa Giro', 'Pendapatan', '-', '0.00'),
(44, '5.0.0', 'Biaya', 'Biaya', '-', '0.00'),
(45, '5.1.0', 'Biaya Variabel (Tidak Tetap)', 'Biaya', '-', '0.00'),
(46, '5.1.1', 'Biaya Bahan Baku', 'Biaya', '-', '0.00'),
(47, '5.1.2', 'Beban Tenaga Kerja Langsung', 'Biaya', '-', '0.00'),
(48, '5.1.3', 'Biaya Overhead', 'Biaya', '-', '0.00'),
(49, '5.2.0', 'Biaya Tetap', 'Biaya', '-', '0.00'),
(50, '5.2.1', 'Biaya Gaji Karyawan', 'Biaya', '-', '0.00'),
(51, '5.2.2', 'Biaya Lembur & Bonus', 'Biaya', '-', '0.00'),
(52, '5.2.3', 'Biaya Komisi & Insentif', 'Biaya', '-', '0.00'),
(53, '5.2.4', 'Biaya THR', 'Biaya', '-', '0.00'),
(54, '5.2.5', 'Biaya Makan / Minum Ditempat Kerja', 'Biaya', '-', '0.00'),
(55, '5.2.6', 'Biaya BPJS Kesehatan', 'Biaya', '-', '0.00'),
(56, '5.2.7', 'Biaya Kesejahteraan Lainnya', 'Biaya', '-', '0.00'),
(57, '5.2.8', 'Biaya Recruitment', 'Biaya', '-', '0.00'),
(58, '5.2.9', 'Biaya Konsumsi Rapat dan Pelatihan', 'Biaya', '-', '0.00'),
(59, '5.2.10', 'Biaya Perjalanan Dinas DL', 'Biaya', '-', '0.00'),
(60, '5.2.11', 'Biaya Perjalanan Dinas LN', 'Biaya', '-', '0.00'),
(61, '5.2.12', 'Biaya Entertainment', 'Biaya', '-', '0.00'),
(62, '5.2.13', 'Biaya Kendaraan', 'Biaya', '-', '0.00'),
(63, '5.2.14', 'Biaya BBM, Toll & Parkir', 'Biaya', '-', '0.00'),
(64, '5.2.15', 'Biaya STNK, KIR dan Kendaraan Lainnya', 'Biaya', '-', '0.00'),
(65, '5.2.16', 'Biaya Promosi', 'Biaya', '-', '0.00'),
(66, '5.2.17', 'Biaya Stationary (ATK)', 'Biaya', '-', '0.00'),
(67, '5.2.18', 'Biaya Supplies Komputer', 'Biaya', '-', '0.00'),
(68, '5.2.19', 'Biaya Sewa Gedung', 'Biaya', '-', '0.00'),
(69, '5.2.20', 'Biaya Perbaikan Gedung', 'Biaya', '-', '0.00'),
(70, '5.2.21', 'Biaya Peralatan Kantor', 'Biaya', '-', '0.00'),
(71, '5.2.22', 'Biaya Air', 'Biaya', '-', '0.00'),
(72, '5.2.23', 'Biaya Listrik', 'Biaya', '-', '0.00'),
(73, '5.2.24', 'Biaya Telepon & Internet', 'Biaya', '-', '0.00'),
(74, '5.2.25', 'Biaya Kirim Barang', 'Biaya', '-', '0.00'),
(75, '5.2.26', 'Biaya Sumbangan', 'Biaya', '-', '0.00'),
(76, '5.2.27', 'Biaya BPJS JHT dan JPN', 'Biaya', '-', '0.00'),
(77, '5.2.28', 'Biaya Penyusutan Peralatan', 'Biaya', '-', '0.00'),
(78, '5.2.29', 'Biaya Penyusutan Kendaraan', 'Biaya', '-', '0.00'),
(79, '5.2.30', 'Biaya Penyusutan Gedung', 'Biaya', '-', '0.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_jurnal`
--

CREATE TABLE `akun_jurnal` (
  `id_akun_jurnal` int(10) NOT NULL,
  `nomor_jurnal` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL DEFAULT '-- KOSONG --',
  `tanggal_transaksi` date NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_jurnal`
--

INSERT INTO `akun_jurnal` (`id_akun_jurnal`, `nomor_jurnal`, `deskripsi`, `tanggal_transaksi`, `dibuat_pada`, `diubah_pada`) VALUES
(1, '', '-- KOSONG --', '2023-05-31', '2023-05-25 22:18:10', '2023-05-25 22:18:10'),
(2, '', '-- KOSONG --', '2023-05-25', '2023-05-25 22:19:32', '2023-05-25 22:19:32'),
(3, '', '123', '2023-05-25', '2023-05-25 22:24:32', '2023-05-25 22:24:32'),
(4, '', 'Bayar Gaji Karyawan Melalui Bank Mandiri', '2023-05-25', '2023-05-25 22:24:44', '2023-05-25 22:24:44'),
(5, '', '', '2023-05-25', '2023-05-25 22:54:02', '2023-05-25 22:54:02'),
(6, '', 'TRANSAKSI PENJUALAN #4', '2023-05-25', '2023-05-25 22:56:57', '2023-05-25 22:56:57'),
(7, '', 'TRANSAKSI PENJUALAN #5', '2023-05-25', '2023-05-25 22:58:33', '2023-05-25 22:58:33'),
(8, '', 'TRANSAKSI PENJUALAN #6', '2023-05-25', '2023-05-25 22:59:20', '2023-05-25 22:59:20'),
(9, '', 'Transaksi Penjualan #7', '2023-05-25', '2023-05-25 23:01:39', '2023-05-25 23:01:39'),
(10, '', 'Transaksi Penjualan #8', '2023-05-25', '2023-05-25 23:10:27', '2023-05-25 23:10:27'),
(11, '', 'Pendapatan Kaget', '2023-05-25', '2023-05-25 23:32:15', '2023-05-25 23:32:15'),
(12, '', 'Sewa Toko May 2023', '2023-05-25', '2023-05-25 23:50:23', '2023-05-25 23:50:23'),
(13, '', 'Transaksi Penjualan #9', '2023-05-25', '2023-05-25 23:51:13', '2023-05-25 23:51:13'),
(14, '', 'Bayar Air Via Kas Besar', '2023-05-25', '2023-05-25 23:55:16', '2023-05-25 23:55:16'),
(15, '', 'Bayar Listrik Via Kas Besar', '2023-05-25', '2023-05-25 23:55:46', '2023-05-25 23:55:46'),
(16, '', 'Transaksi Penjualan #10', '2023-05-26', '2023-05-26 14:00:06', '2023-05-26 14:00:06'),
(17, '', 'Transaksi Penjualan #11', '2023-05-26', '2023-05-26 14:00:27', '2023-05-26 14:00:27'),
(18, '', 'Transaksi Penjualan #12', '2023-05-26', '2023-05-26 14:04:57', '2023-05-26 14:04:57'),
(19, '', 'Transaksi Penjualan #13', '2023-05-26', '2023-05-26 14:07:55', '2023-05-26 14:07:55'),
(20, '', 'Transaksi Penjualan #14', '2023-05-26', '2023-05-26 14:08:56', '2023-05-26 14:08:56'),
(21, '', 'Transaksi Penjualan #15', '2023-05-26', '2023-05-26 14:09:19', '2023-05-26 14:09:19'),
(22, '', 'Transaksi Penjualan #16', '2023-05-26', '2023-05-26 14:09:53', '2023-05-26 14:09:53'),
(23, '', 'Transaksi Penjualan #17', '2023-05-26', '2023-05-26 14:10:10', '2023-05-26 14:10:10'),
(24, '', 'Transaksi Penjualan #18', '2023-05-26', '2023-05-26 14:16:24', '2023-05-26 14:16:24'),
(25, '', 'Setor Kas Toko Ke Bank BCA', '2023-05-26', '2023-05-26 14:20:08', '2023-05-26 14:20:08'),
(26, '', 'Transaksi Pembelian #6', '2023-05-26', '2023-05-26 14:29:58', '2023-05-26 14:29:58'),
(27, '', 'Transaksi Pembelian #7', '2023-05-26', '2023-05-26 14:31:27', '2023-05-26 14:31:27'),
(28, '', 'Transaksi Pembelian #8', '2023-05-26', '2023-05-26 14:40:54', '2023-05-26 14:40:54'),
(29, '', 'Transaksi Penjualan #19', '2023-05-26', '2023-05-26 22:16:56', '2023-05-26 22:16:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_jurnal_template`
--

CREATE TABLE `akun_jurnal_template` (
  `id_akun_jurnal_template` int(10) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `id_akun_debet` int(10) NOT NULL,
  `id_akun_kredit` int(10) NOT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_jurnal_template`
--

INSERT INTO `akun_jurnal_template` (`id_akun_jurnal_template`, `deskripsi`, `id_akun_debet`, `id_akun_kredit`, `dibuat_pada`, `diubah_pada`) VALUES
(1, 'Bayar Gaji Karyawan Melalui Bank Mandiri', 50, 6, '2023-05-25 03:25:57', '2023-05-25 06:10:04'),
(2, 'Bayar Gaji Karyawan Melalui Kas Besar', 50, 4, '2023-05-25 06:12:16', '2023-05-25 06:12:16'),
(4, 'Bayar Gaji Karyawan Melalui Bank BCA', 50, 5, '2023-05-25 06:28:09', '2023-05-25 06:29:40'),
(5, 'Bayar Listrik Via Kas Besar', 72, 4, '2023-05-25 15:54:22', '2023-05-25 15:54:22'),
(6, 'Bayar Air Via Kas Besar', 71, 4, '2023-05-25 15:54:46', '2023-05-25 15:54:46'),
(7, 'Setor Kas Toko Ke Bank BCA', 5, 3, '2023-05-26 06:19:26', '2023-05-26 06:19:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_mutasi`
--

CREATE TABLE `akun_mutasi` (
  `id_akun_mutasi` int(10) NOT NULL,
  `id_akun_jurnal` int(10) NOT NULL,
  `id_akun` int(10) NOT NULL,
  `debet` decimal(17,2) NOT NULL,
  `kredit` decimal(17,2) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_mutasi`
--

INSERT INTO `akun_mutasi` (`id_akun_mutasi`, `id_akun_jurnal`, `id_akun`, `debet`, `kredit`, `dibuat_pada`, `diubah_pada`) VALUES
(1, 22, 3, '150000.00', '0.00', '2023-05-26 14:09:53', '2023-05-26 14:09:53'),
(2, 22, 40, '0.00', '150000.00', '2023-05-26 14:09:53', '2023-05-26 14:09:53'),
(3, 23, 3, '150000.00', '0.00', '2023-05-26 14:10:10', '2023-05-26 14:10:10'),
(4, 23, 40, '0.00', '150000.00', '2023-05-26 14:10:10', '2023-05-26 14:10:10'),
(5, 24, 3, '2000000.00', '0.00', '2023-05-26 14:16:24', '2023-05-26 14:16:24'),
(6, 24, 40, '0.00', '2000000.00', '2023-05-26 14:16:24', '2023-05-26 14:16:24'),
(7, 25, 5, '2300000.00', '0.00', '2023-05-26 14:20:08', '2023-05-26 14:20:08'),
(8, 25, 3, '0.00', '2300000.00', '2023-05-26 14:20:08', '2023-05-26 14:20:08'),
(9, 26, 4, '1400000.00', '0.00', '2023-05-26 14:29:58', '2023-05-26 14:29:58'),
(10, 26, 10, '0.00', '1400000.00', '2023-05-26 14:29:58', '2023-05-26 14:29:58'),
(11, 27, 10, '700000.00', '0.00', '2023-05-26 14:31:27', '2023-05-26 14:31:27'),
(12, 27, 4, '0.00', '700000.00', '2023-05-26 14:31:27', '2023-05-26 14:31:27'),
(13, 28, 10, '7000.00', '0.00', '2023-05-26 14:40:54', '2023-05-26 14:40:54'),
(14, 28, 4, '0.00', '7000.00', '2023-05-26 14:40:54', '2023-05-26 14:40:54'),
(15, 29, 3, '150000000.00', '0.00', '2023-05-26 22:16:56', '2023-05-26 22:16:56'),
(16, 29, 40, '0.00', '150000000.00', '2023-05-26 22:16:56', '2023-05-26 22:16:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(10) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `tanggal_bergabung` date NOT NULL DEFAULT current_timestamp(),
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `no_identitas`, `tanggal_bergabung`, `nama`, `alamat`, `telepon`, `email`, `dibuat_pada`, `diubah_pada`) VALUES
(1, '-', '2023-05-01', 'Publik', '-', '', '', '2023-05-23 08:58:59', '2023-05-23 09:00:00'),
(2, '-', '2023-05-24', 'Agus Ariyanto', 'Gianyar', '087860265451', 'agus.arianto21@gmail.com', '2023-05-24 16:24:05', '2023-05-24 16:26:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli`
--

CREATE TABLE `beli` (
  `id_beli` int(10) NOT NULL,
  `jenis_transaksi` varchar(100) NOT NULL DEFAULT 'beli',
  `id_pemasok` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_akun_jurnal` int(10) DEFAULT NULL,
  `metode_bayar` varchar(150) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total` decimal(17,2) NOT NULL,
  `diskon` decimal(17,2) NOT NULL DEFAULT 0.00,
  `pajak` decimal(17,2) NOT NULL DEFAULT 0.00,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `beli`
--

INSERT INTO `beli` (`id_beli`, `jenis_transaksi`, `id_pemasok`, `id_user`, `id_akun_jurnal`, `metode_bayar`, `tanggal_transaksi`, `total`, `diskon`, `pajak`, `dibuat_pada`, `diubah_pada`) VALUES
(1, 'PRODUKSI', 1, 1, NULL, 'PRODUKSI', '2023-05-24', '0.00', '0.00', '0.00', '2023-05-24 15:04:58', '2023-05-24 15:04:58'),
(2, 'BELI', 1, 1, NULL, 'KAS', '2023-05-24', '1400000.00', '0.00', '0.00', '2023-05-24 15:06:23', '2023-05-24 15:06:23'),
(3, 'BELI', 1, 1, NULL, 'KAS', '2023-05-24', '1500000.00', '0.00', '0.00', '2023-05-24 15:08:44', '2023-05-24 15:08:44'),
(4, 'BELI', 1, 1, NULL, 'KAS', '2023-05-26', '1400000.00', '0.00', '0.00', '2023-05-26 14:28:51', '2023-05-26 14:28:51'),
(5, 'BELI', 1, 1, NULL, 'KAS', '2023-05-26', '1400000.00', '0.00', '0.00', '2023-05-26 14:29:39', '2023-05-26 14:29:39'),
(6, 'BELI', 1, 1, 26, 'KAS', '2023-05-26', '1400000.00', '0.00', '0.00', '2023-05-26 14:29:58', '2023-05-26 14:29:58'),
(7, 'BELI', 1, 1, 27, 'KAS', '2023-05-26', '700000.00', '0.00', '0.00', '2023-05-26 14:31:27', '2023-05-26 14:31:27'),
(8, 'BELI', 1, 1, 28, 'KAS', '2023-05-26', '7000.00', '0.00', '0.00', '2023-05-26 14:40:54', '2023-05-26 14:40:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli_detail`
--

CREATE TABLE `beli_detail` (
  `id_beli_detail` int(10) NOT NULL,
  `id_beli` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `hpp` decimal(17,2) NOT NULL,
  `harga_beli` decimal(17,2) NOT NULL,
  `jumlah` decimal(17,2) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `beli_detail`
--

INSERT INTO `beli_detail` (`id_beli_detail`, `id_beli`, `id_produk`, `hpp`, `harga_beli`, `jumlah`, `dibuat_pada`, `diubah_pada`) VALUES
(1, 1, 14, '909.09', '0.00', '2.00', '2023-05-24 15:04:58', '2023-05-24 15:04:58'),
(2, 2, 15, '0.00', '7000.00', '200.00', '2023-05-24 15:06:23', '2023-05-24 15:06:23'),
(3, 3, 15, '7000.00', '7500.00', '200.00', '2023-05-24 15:08:44', '2023-05-24 15:08:44'),
(4, 4, 15, '7250.00', '7000.00', '200.00', '2023-05-26 14:28:51', '2023-05-26 14:28:51'),
(5, 5, 15, '7250.00', '7000.00', '200.00', '2023-05-26 14:29:39', '2023-05-26 14:29:39'),
(6, 6, 15, '7250.00', '7000.00', '200.00', '2023-05-26 14:29:58', '2023-05-26 14:29:58'),
(7, 7, 15, '7200.00', '7000.00', '100.00', '2023-05-26 14:31:27', '2023-05-26 14:31:27'),
(8, 8, 15, '7181.82', '7000.00', '1.00', '2023-05-26 14:40:54', '2023-05-26 14:40:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual`
--

CREATE TABLE `jual` (
  `id_jual` int(10) NOT NULL,
  `id_anggota` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_akun` int(10) NOT NULL,
  `id_akun_jurnal` int(10) DEFAULT NULL,
  `keterangan_non_tunai` varchar(200) NOT NULL DEFAULT '-',
  `tanggal_transaksi` date NOT NULL,
  `total` decimal(17,2) NOT NULL,
  `diskon` decimal(17,2) NOT NULL DEFAULT 0.00,
  `pajak` decimal(17,2) NOT NULL DEFAULT 0.00,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jual`
--

INSERT INTO `jual` (`id_jual`, `id_anggota`, `id_user`, `id_akun`, `id_akun_jurnal`, `keterangan_non_tunai`, `tanggal_transaksi`, `total`, `diskon`, `pajak`, `dibuat_pada`, `diubah_pada`) VALUES
(3, 2, 1, 3, NULL, '-', '2023-05-25', '2000000.00', '0.00', '0.00', '2023-05-25 22:54:02', '2023-05-25 22:54:02'),
(4, 1, 1, 5, NULL, '-', '2023-05-25', '100000.00', '0.00', '0.00', '2023-05-25 22:56:57', '2023-05-25 22:56:57'),
(5, 2, 1, 5, NULL, '1', '2023-05-25', '100000.00', '0.00', '0.00', '2023-05-25 22:58:33', '2023-05-25 22:58:33'),
(6, 2, 1, 5, NULL, '1', '2023-05-25', '100000.00', '0.00', '0.00', '2023-05-25 22:59:20', '2023-05-25 22:59:20'),
(7, 2, 1, 5, NULL, '-', '2023-05-25', '150000.00', '0.00', '0.00', '2023-05-25 23:01:39', '2023-05-25 23:01:39'),
(8, 1, 1, 5, 10, '-', '2023-05-25', '175000.00', '0.00', '0.00', '2023-05-25 23:10:27', '2023-05-25 23:10:27'),
(9, 1, 1, 5, 13, '-', '2023-05-25', '75000000.00', '0.00', '0.00', '2023-05-25 23:51:13', '2023-05-25 23:51:13'),
(10, 1, 1, 3, 16, '-', '2023-05-26', '325000.00', '0.00', '0.00', '2023-05-26 14:00:06', '2023-05-26 14:00:06'),
(11, 1, 1, 3, 17, '-', '2023-05-26', '50000.00', '0.00', '0.00', '2023-05-26 14:00:27', '2023-05-26 14:00:27'),
(12, 2, 1, 5, 18, '-', '2023-05-26', '75000.00', '0.00', '0.00', '2023-05-26 14:04:57', '2023-05-26 14:04:57'),
(13, 2, 1, 3, 19, '-', '2023-05-26', '2000000.00', '0.00', '0.00', '2023-05-26 14:07:55', '2023-05-26 14:07:55'),
(14, 2, 1, 3, 20, '-', '2023-05-26', '2000000.00', '0.00', '0.00', '2023-05-26 14:08:56', '2023-05-26 14:08:56'),
(15, 2, 1, 3, 21, '-', '2023-05-26', '150000.00', '0.00', '0.00', '2023-05-26 14:09:19', '2023-05-26 14:09:19'),
(16, 2, 1, 3, 22, '-', '2023-05-26', '150000.00', '0.00', '0.00', '2023-05-26 14:09:53', '2023-05-26 14:09:53'),
(17, 2, 1, 3, 23, '-', '2023-05-26', '150000.00', '0.00', '0.00', '2023-05-26 14:10:10', '2023-05-26 14:10:10'),
(18, 1, 1, 3, 24, '-', '2023-05-26', '2000000.00', '0.00', '0.00', '2023-05-26 14:16:24', '2023-05-26 14:16:24'),
(19, 1, 1, 3, 29, '-', '2023-05-26', '150000000.00', '0.00', '0.00', '2023-05-26 22:16:56', '2023-05-26 22:16:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual_detail`
--

CREATE TABLE `jual_detail` (
  `id_jual_detail` int(10) NOT NULL,
  `id_jual` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `hpp` decimal(17,2) NOT NULL,
  `harga_jual` decimal(17,2) NOT NULL,
  `jumlah` decimal(17,2) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jual_detail`
--

INSERT INTO `jual_detail` (`id_jual_detail`, `id_jual`, `id_produk`, `hpp`, `harga_jual`, `jumlah`, `dibuat_pada`, `diubah_pada`) VALUES
(4, 3, 14, '769.23', '2000000.00', '1.00', '2023-05-25 22:54:02', '2023-05-25 22:54:02'),
(5, 4, 2, '0.00', '100000.00', '1.00', '2023-05-25 22:56:57', '2023-05-25 22:56:57'),
(6, 5, 2, '0.00', '100000.00', '1.00', '2023-05-25 22:58:33', '2023-05-25 22:58:33'),
(7, 7, 10, '0.00', '150000.00', '1.00', '2023-05-25 23:01:39', '2023-05-25 23:01:39'),
(8, 8, 11, '0.00', '175000.00', '1.00', '2023-05-25 23:10:27', '2023-05-25 23:10:27'),
(9, 9, 7, '0.00', '1500000.00', '50.00', '2023-05-25 23:51:13', '2023-05-25 23:51:13'),
(10, 10, 11, '0.00', '175000.00', '1.00', '2023-05-26 14:00:06', '2023-05-26 14:00:06'),
(11, 10, 10, '0.00', '150000.00', '1.00', '2023-05-26 14:00:06', '2023-05-26 14:00:06'),
(12, 11, 1, '0.00', '50000.00', '1.00', '2023-05-26 14:00:27', '2023-05-26 14:00:27'),
(13, 12, 8, '0.00', '75000.00', '1.00', '2023-05-26 14:04:57', '2023-05-26 14:04:57'),
(14, 13, 14, '769.23', '2000000.00', '1.00', '2023-05-26 14:07:55', '2023-05-26 14:07:55'),
(15, 15, 10, '0.00', '150000.00', '1.00', '2023-05-26 14:09:19', '2023-05-26 14:09:19'),
(16, 17, 10, '0.00', '150000.00', '1.00', '2023-05-26 14:10:10', '2023-05-26 14:10:10'),
(17, 18, 14, '769.23', '2000000.00', '1.00', '2023-05-26 14:16:24', '2023-05-26 14:16:24'),
(18, 19, 14, '769.23', '2000000.00', '75.00', '2023-05-26 22:16:56', '2023-05-26 22:16:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `hpp` decimal(17,2) NOT NULL,
  `harga` decimal(17,2) NOT NULL,
  `jumlah` decimal(17,0) NOT NULL,
  `dibuat_pada` datetime DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_beli`
--

CREATE TABLE `keranjang_beli` (
  `id_keranjang_beli` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `hpp` decimal(17,2) NOT NULL,
  `harga` decimal(17,2) NOT NULL,
  `jumlah` decimal(17,0) NOT NULL,
  `dibuat_pada` datetime DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` int(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `nama`, `alamat`, `telepon`, `email`, `dibuat_pada`, `diubah_pada`) VALUES
(1, 'Eclipse Pottery', '-', '', '', '2023-05-23 09:00:25', '2023-05-23 09:00:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(20) NOT NULL,
  `barcode` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `id_produk_kategori` int(10) DEFAULT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `satuan` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT 'PCS',
  `keterangan` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `hpp` decimal(17,2) DEFAULT 0.00,
  `hpp_awal` decimal(17,2) DEFAULT 0.00,
  `qty` decimal(10,0) DEFAULT 0,
  `qty_awal` decimal(10,0) DEFAULT 0,
  `harga_jual` decimal(17,2) NOT NULL,
  `stok_min` decimal(10,2) DEFAULT 0.00,
  `servis` int(1) NOT NULL,
  `konsinyasi` int(1) NOT NULL DEFAULT 0,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `barcode`, `id_produk_kategori`, `nama`, `satuan`, `keterangan`, `gambar`, `hpp`, `hpp_awal`, `qty`, `qty_awal`, `harga_jual`, `stok_min`, `servis`, `konsinyasi`, `dibuat_pada`, `diubah_pada`) VALUES
(1, '-', 1, 'MUG/GELAS & CUP', 'PCS', '-', '', '0.00', '0.00', '9', '0', '50000.00', '1.00', 0, 0, '2019-01-22 11:51:00', '2023-05-24 15:16:29'),
(2, '', 1, 'BOWL/MANGKUK', 'PCS', '-', '', '0.00', '0.00', '8', '0', '100000.00', '1.00', 0, 0, '2019-01-22 11:51:00', '2023-05-24 15:16:27'),
(3, '-', 1, 'PLATE/PIRING', 'PCS', '-', '', '0.00', '0.00', '10', '0', '200000.00', '1.00', 0, 0, '2019-01-22 11:51:00', '2023-05-24 15:16:26'),
(4, '', 1, 'PITCHERS', 'PCS', '-', '', '0.00', '0.00', '10', '0', '150000.00', '1.00', 0, 0, '2019-01-22 11:51:00', '2023-05-24 15:16:24'),
(5, '-', 1, 'VAS', 'PCS', '-', '', '0.00', '0.00', '10', '0', '350000.00', '1.00', 0, 0, '2019-01-22 11:51:00', '2023-05-24 15:16:22'),
(6, '-', 1, 'TATARA', 'PCS', '-', '', '0.00', '0.00', '10', '0', '100000.00', '1.00', 0, 0, '2019-01-22 11:51:00', '2016-08-22 19:22:00'),
(7, '-', 1, 'PAINT GUCCI/GUCCI LUKIS', 'PCS', '-', '', '0.00', '0.00', '-40', '0', '1500000.00', '1.00', 0, 0, '2019-01-22 11:51:00', '2016-08-22 19:22:00'),
(8, '', 1, 'POT', 'PCS', '-', '', '0.00', '0.00', '8', '0', '75000.00', '1.00', 0, 0, '2019-01-22 11:51:00', '2016-08-22 19:22:00'),
(9, '-', 1, 'SAUCER/LEPEKAN', 'PCS', '-', '', '0.00', '0.00', '10', '0', '50000.00', '1.00', 0, 0, '2019-01-22 11:51:00', '2016-08-22 19:22:00'),
(10, '-', 1, 'DECORATION FROG/DEKORASI KODOK', 'PCS', '-', '', '0.00', '0.00', '6', '0', '150000.00', '1.00', 0, 0, '2019-01-22 11:51:00', '2023-05-24 15:15:28'),
(11, '-', 1, 'FILTER COFFEE', 'PCS', '-', '', '0.00', '0.00', '8', '0', '175000.00', '1.00', 0, 0, '2019-01-22 11:51:00', '2004-04-22 10:57:00'),
(12, '-', 1, 'GLASS/KACA', 'PCS', '-', '', '0.00', '0.00', '10', '0', '115000.00', '1.00', 0, 0, '2019-01-22 11:51:00', '2016-08-22 16:59:00'),
(13, '-', 1, 'TABLE WARE(BOWL)', 'PCS', '-', '', '0.00', '0.00', '10', '0', '1000000.00', '1.00', 0, 0, '2019-01-22 11:51:00', '2008-02-22 11:01:00'),
(14, '-', 1, 'BIG GUCCI', 'PCS', '-', '', '769.23', '0.00', '-76', '0', '2000000.00', '1.00', 0, 0, '2019-01-22 11:51:00', '2023-05-25 11:13:22'),
(15, '-', 2, 'TANAH LIAT', 'PCS', '-', '', '7181.65', '7000.00', '1101', '0', '0.00', '0.00', 0, 0, '2023-05-24 15:05:51', '2023-05-24 15:05:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `id_produk_kategori` int(10) NOT NULL,
  `produk_kategori` varchar(200) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_kategori`
--

INSERT INTO `produk_kategori` (`id_produk_kategori`, `produk_kategori`, `dibuat_pada`, `diubah_pada`) VALUES
(1, 'Pottery', '2023-04-03 13:15:54', '2023-04-03 13:15:54'),
(2, 'Bahan Baku', '2023-05-23 08:35:35', '2023-05-23 08:35:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `terakhir_login` datetime NOT NULL DEFAULT current_timestamp(),
  `akses` enum('Administrator','Toko','Simpan Pinjam','') NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'OFFLINE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `dibuat_pada`, `diubah_pada`, `terakhir_login`, `akses`, `status`) VALUES
(1, 'TAMIN', 'admin', 'admin', '2021-11-11 07:49:25', '2023-04-03 08:51:26', '2023-05-27 08:53:38', 'Administrator', 'OFFLINE');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `akun_jurnal`
--
ALTER TABLE `akun_jurnal`
  ADD PRIMARY KEY (`id_akun_jurnal`);

--
-- Indeks untuk tabel `akun_jurnal_template`
--
ALTER TABLE `akun_jurnal_template`
  ADD PRIMARY KEY (`id_akun_jurnal_template`);

--
-- Indeks untuk tabel `akun_mutasi`
--
ALTER TABLE `akun_mutasi`
  ADD PRIMARY KEY (`id_akun_mutasi`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indeks untuk tabel `beli_detail`
--
ALTER TABLE `beli_detail`
  ADD PRIMARY KEY (`id_beli_detail`);

--
-- Indeks untuk tabel `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`id_jual`);

--
-- Indeks untuk tabel `jual_detail`
--
ALTER TABLE `jual_detail`
  ADD PRIMARY KEY (`id_jual_detail`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `keranjang_beli`
--
ALTER TABLE `keranjang_beli`
  ADD PRIMARY KEY (`id_keranjang_beli`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD PRIMARY KEY (`id_produk_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `akun_jurnal`
--
ALTER TABLE `akun_jurnal`
  MODIFY `id_akun_jurnal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `akun_jurnal_template`
--
ALTER TABLE `akun_jurnal_template`
  MODIFY `id_akun_jurnal_template` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `akun_mutasi`
--
ALTER TABLE `akun_mutasi`
  MODIFY `id_akun_mutasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `beli`
--
ALTER TABLE `beli`
  MODIFY `id_beli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `beli_detail`
--
ALTER TABLE `beli_detail`
  MODIFY `id_beli_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jual`
--
ALTER TABLE `jual`
  MODIFY `id_jual` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `jual_detail`
--
ALTER TABLE `jual_detail`
  MODIFY `id_jual_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7008;

--
-- AUTO_INCREMENT untuk tabel `keranjang_beli`
--
ALTER TABLE `keranjang_beli`
  MODIFY `id_keranjang_beli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=992;

--
-- AUTO_INCREMENT untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id_pemasok` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `produk_kategori`
--
ALTER TABLE `produk_kategori`
  MODIFY `id_produk_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
