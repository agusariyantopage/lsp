
-- Database Backup --
-- Ver. : 1.0.1
-- Host : Server Host
-- Generating Time : Jul 30, 2023 at 16:46:55:PM


CREATE TABLE `asesor` (
  `id_asesor` int(10) NOT NULL AUTO_INCREMENT,
  `nomor_registrasi` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `dihapus_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id_asesor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO asesor VALUES
("1","MET.000.014680 2019","Komang Mahardika","51.08.09.201184.0005","Bondalem","1984-11-20","Laki-Laki","S1","Guru","082144377147","Indonesia","Perum Dewata Permai Blok A2 No.12 Lingk. Puseh","komangmahardika@gmail.com","2023-07-14 22:41:03","2023-07-15 10:21:54",""),
("2","MET.000.007220 2017","NI NYOMAN SUPARTINI, S. PD.","51.02.10.480570.0002","Gianyar","1970-05-08","Perempuan","S1","Guru","081936440715","Indonesia","Br. Pejengaji Tegalalang","manktinie@gmail.com","2023-07-15 09:59:53","2023-07-15 10:20:08","");

CREATE TABLE `muk` (
  `id_muk` int(10) NOT NULL AUTO_INCREMENT,
  `id_muk_master` int(10) NOT NULL,
  `kode_muk` varchar(100) NOT NULL,
  `nama_muk` varchar(200) NOT NULL,
  `jenis_muk` varchar(100) NOT NULL,
  `tanggal_penetapan` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Aktif',
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `dihapus_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id_muk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO muk VALUES
("1","1","SKM-FO","MUK Front Office","SKKNI","2023-07-30","Aktif","2023-07-30 15:16:05","2023-07-30 15:16:05",""),
("3","1","SKM-SV","Waitress","-","2023-07-30","Aktif","2023-07-30 15:19:54","2023-07-30 15:19:54",""),
("4","2","Elit quae quis temp","Inventore illo et do","Impedit aliqua Vol","2010-07-19","Aktif","2023-07-30 15:43:57","2023-07-30 15:43:57",""),
("5","2","At doloribus velit ","Labore et quia sint ","Et voluptas ea at ut","1973-05-08","Non Aktif","2023-07-30 15:44:03","2023-07-30 15:44:03",""),
("6","2","Enim aliquam autem s","Nulla qui necessitat","Vel et nihil reicien","1999-03-27","Aktif","2023-07-30 15:44:09","2023-07-30 15:44:09","");

CREATE TABLE `muk_master` (
  `id_muk_master` int(10) NOT NULL AUTO_INCREMENT,
  `id_skema` int(10) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `tanggal_penetapan` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Aktif',
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `dihapus_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id_muk_master`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO muk_master VALUES
("1","1","Master Materi Uji Kompetensi Kuliner Tahun 2023","2023-07-01","Aktif","2023-07-24 21:28:24","2023-07-30 15:38:54",""),
("2","4","Master Materi Uji Kompetensi Perhotelan Tahun 2023	","2023-07-31","Aktif","2023-07-24 21:46:01","2023-07-24 21:46:01","");

CREATE TABLE `sdm` (
  `id_sdm` int(10) NOT NULL AUTO_INCREMENT,
  `id_sdm_jabatan` int(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `dihapus_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id_sdm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO sdm VALUES
("1","2","I Made Sudarsana","5107030209870001","Karangasem","2015-01-11","Perempuan","S1","Guru","087860265451","Indonesia","Karangasem","qygetihusi@mailinator.com","2023-07-15 10:51:38","2023-07-15 10:55:38",""),
("2","6","Ni Made Indira Sari","-","Denpasar","1990-04-02","Perempuan","S1","Guru","08888888","Indonesia","Sesetan","indira@gmail.com","2023-07-24 22:21:53","2023-07-24 22:21:53","");

CREATE TABLE `sdm_jabatan` (
  `id_sdm_jabatan` int(10) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(100) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `dihapus_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id_sdm_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO sdm_jabatan VALUES
("1","Dewan Pengarah","2023-07-15 10:38:44","2023-07-15 10:38:44",""),
("2","Ketua/Direktur","2023-07-15 10:38:44","2023-07-15 10:38:44",""),
("3","Sekertaris","2023-07-15 10:38:44","2023-07-15 10:38:44",""),
("4","Bendahara","2023-07-15 10:38:44","2023-07-15 10:38:44",""),
("5","Manajer Sertifikasi","2023-07-15 10:38:44","2023-07-15 10:38:44",""),
("6","Manajer Administrasi","2023-07-15 10:38:44","2023-07-15 10:38:44",""),
("7","Manajer Manajemen Mutu","2023-07-15 10:38:44","2023-07-15 10:38:44",""),
("8","Ketua Bidang IT","2023-07-15 10:38:44","2023-07-15 10:38:44","");

CREATE TABLE `skema` (
  `id_skema` int(10) NOT NULL AUTO_INCREMENT,
  `mode_skema` varchar(100) NOT NULL,
  `nama_skema` varchar(200) NOT NULL,
  `kode_skema` varchar(100) NOT NULL,
  `jenis_skema` varchar(100) NOT NULL,
  `tanggal_penetapan` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Aktif',
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `dihapus_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id_skema`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO skema VALUES
("1","Referensi BNSP","SKEMA SERTIFIKASI KKNI LEVEL II PADA KOMPETENSI KEAHLIAN TATA BOGA (2018)","SKM/BNSP/00018/1/2019/376","KKNI","2019-04-18","Aktif","2023-07-05 13:22:27","2023-07-05 13:22:27",""),
("4","Referensi BNSP","SKEMA SERTIFIKASI KKNI LEVEL II PADA KOMPETENSI KEAHLIAN PERHOTELAN","SKM/BNSP/00018/1/2017/131","KKNI","2010-10-10","Aktif","2023-07-05 13:48:29","2023-07-19 02:11:37","");

CREATE TABLE `skema_elemen` (
  `id_skema_elemen` int(10) NOT NULL AUTO_INCREMENT,
  `id_skema_unit` int(10) NOT NULL,
  `kode_elemen` varchar(100) NOT NULL,
  `judul_elemen` varchar(200) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `dihapus_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id_skema_elemen`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO skema_elemen VALUES
("1","1","1","Menguasai elemen air, api, udara, petir dan tanah","2023-07-17 16:35:31","2023-07-19 01:51:41",""),
("2","1","2","Berbahasa dengan baik dan benar","2023-07-17 16:37:04","2023-07-17 16:37:04",""),
("3","1","3","Menggunakan reusable\r\nfungsi/prosedur/modul ","2023-07-17 16:37:56","2023-07-17 16:37:56",""),
("4","2","1","Menggunakan tipe data dan control program","2023-07-17 16:38:25","2023-07-17 16:38:25",""),
("5","3","1","Quia tempor qui expe","2023-07-19 02:30:31","2023-07-19 02:30:40","");

CREATE TABLE `skema_kuk` (
  `id_skema_kuk` int(10) NOT NULL AUTO_INCREMENT,
  `id_skema_elemen` int(10) NOT NULL,
  `kode_kuk` varchar(100) NOT NULL,
  `judul_kuk` varchar(200) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `dihapus_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id_skema_kuk`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO skema_kuk VALUES
("1","1","1.1","Syntax program yang dikuasai digunakan sesuai standar. ","2023-07-17 16:47:52","2023-07-17 16:47:52",""),
("2","1","1.2","Tipe data yang sesuai standar ditentukan.","2023-07-17 16:48:47","2023-07-17 16:48:47",""),
("3","2","2.1","Makan Ayam Goreng1","2023-07-17 16:58:02","2023-07-17 22:37:48",""),
("4","2","2.2","Program baca tulis untuk memasukkan data dari keyboard dan menampilkan ke layar monitor termasuk variasinya sesuai standar masukan/keluaran telah dibuat","2023-07-17 16:59:34","2023-07-17 22:37:57",""),
("5","2","2.3","Melakukan gerakan maju mundur dengan kecepatan maksimal","2023-07-17 22:21:12","2023-07-17 22:38:41",""),
("6","4","1.1","Magna eligendi animi","2023-07-17 22:49:30","2023-07-17 22:49:30",""),
("7","2","2.4","Memahami dan mempraktekkan bahasa pemograman c++","2023-07-17 22:53:02","2023-07-19 01:33:58","");

CREATE TABLE `skema_unit` (
  `id_skema_unit` int(10) NOT NULL AUTO_INCREMENT,
  `id_skema` int(10) NOT NULL,
  `kode_unit` varchar(100) NOT NULL,
  `judul_unit` varchar(200) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `dihapus_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id_skema_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO skema_unit VALUES
("1","4","D1.HFA.CL7.01","Memproses Transaksi Keuangan Penjualan","0000-00-00 00:00:00","2023-07-30 13:01:38",""),
("2","4","D1.HFO.CL2.01","Menerima Dan Memproses Reservasi\r\n","2023-07-13 23:12:56","2023-07-13 23:12:56",""),
("3","4","D1.HFO.CL2.03","Menyediakan Layanan Resepsionis Untuk Akomodasi\r\n","2023-07-13 23:13:52","2023-07-17 11:57:31",""),
("4","1","PMM.MI02.004.01","Menyiapkan dan membuat bumbu kare","2023-07-14 19:01:22","2023-07-14 19:01:22",""),
("5","1","PMM.MI02.007.01	","Menyiapkan dan membuat salad (gado-gado, pecel, urap, rujak dan sejenisnya)\r\n","2023-07-14 19:01:38","2023-07-14 19:01:38",""),
("6","1","PMM.MI02.008.01","Menyiapkan dan membuat kaldu & soup (soto)\r\n","2023-07-19 10:38:39","2023-07-19 10:38:39",""),
("7","1","PMM.MI02.009.01","Menyiapkan dan membuat hidangan daging ayam, seafood & kare sayuran","2023-07-19 10:39:07","2023-07-19 10:39:07",""),
("8","1","PMM.MI02.010.01","Menyiapkan dan membuat hidangan nasi & mie","2023-07-19 10:39:23","2023-07-19 10:39:23","");

CREATE TABLE `tuk` (
  `id_tuk` int(10) NOT NULL AUTO_INCREMENT,
  `kode_tuk` varchar(50) NOT NULL,
  `nama_tuk` varchar(200) NOT NULL,
  `jenis_tuk` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `no_fax` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `dihapus_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tuk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO tuk VALUES
("1","TUK-SMKPDWBDG","SMK Pandawa Bali Global","Sewaktu","Jl. Janger - Abiansemal, Dauh Yeh Cani, Abiansemal, Dauh Yeh Cani, Badung, Kabupaten Badung, Bali 80352","036147900925","087860265451","","smkpandawa@ymail.com","2023-07-14 19:37:06","2023-07-14 20:03:03","");

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `terakhir_login` datetime NOT NULL DEFAULT current_timestamp(),
  `akses` enum('Administrator','Bidang Sertifikasi','Bidang Penjamin Mutu') NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'OFFLINE',
  `dihapus_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO user VALUES
("1","Administrator Utama","admin","admin","2023-07-05 11:38:17","2023-07-05 11:38:17","2023-07-30 11:01:22","Administrator","ONLINE","");