-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 24. Maret 2014 jam 10:38
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siamuhi`
--
CREATE DATABASE `siamuhi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `siamuhi`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
  `IdAbsensi` int(10) NOT NULL AUTO_INCREMENT,
  `NIS` varchar(15) NOT NULL,
  `IdKelas` varchar(15) NOT NULL,
  `IdSmtr` varchar(10) NOT NULL,
  `Bulan` int(2) NOT NULL,
  `ta` varchar(10) NOT NULL,
  `Pertemuan` int(6) NOT NULL,
  `Kehadiran` int(6) NOT NULL,
  `s` int(5) DEFAULT NULL,
  `i` int(5) DEFAULT NULL,
  `a` int(5) DEFAULT NULL,
  PRIMARY KEY (`IdAbsensi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`IdAbsensi`, `NIS`, `IdKelas`, `IdSmtr`, `Bulan`, `ta`, `Pertemuan`, `Kehadiran`, `s`, `i`, `a`) VALUES
(3, '10030011', '10RPL', 'GJL', 8, '2014/2015', 10, 8, 1, 0, 1),
(4, '10030012', '10RPL', 'GJL', 8, '2014/2015', 10, 9, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ad_login`
--

CREATE TABLE IF NOT EXISTS `ad_login` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak` int(3) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `ad_login`
--

INSERT INTO `ad_login` (`id`, `username`, `password`, `hak`, `nik`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, '', 1),
(7, 'staff', '1253208465b1efa876f982d8a9e73eef', 1, '1234567', 1),
(8, 'guru', '77e69c137812518e359196bb2f5e9bb9', 2, '23424234', 1),
(9, 'loket', 'a9c8dcf6a784cb0d0672f8bcd3190b9c', 3, '32324244', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `asalsekolah`
--

CREATE TABLE IF NOT EXISTS `asalsekolah` (
  `IdAsSekolah` int(6) NOT NULL AUTO_INCREMENT,
  `Sekolah` varchar(35) DEFAULT NULL,
  `Kec` varchar(30) DEFAULT NULL,
  `Kab` varchar(30) DEFAULT NULL,
  `AlamatSekolah` text,
  `NIS` varchar(15) NOT NULL,
  PRIMARY KEY (`IdAsSekolah`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `asalsekolah`
--

INSERT INTO `asalsekolah` (`IdAsSekolah`, `Sekolah`, `Kec`, `Kab`, `AlamatSekolah`, `NIS`) VALUES
(13, 'SMP N 2 Weleri', NULL, NULL, 'Rowosari', '10030011'),
(14, 'SMP N 1 WELERI', NULL, NULL, 'Weleri', '10030012'),
(20, '', NULL, NULL, '', '1003005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `judul` varchar(50) NOT NULL,
  `konten` text NOT NULL,
  `nik` varchar(15) NOT NULL,
  `akses` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `tgl`, `judul`, `konten`, `nik`, `akses`, `status`) VALUES
(4, '2014-01-09', 'Coba Input Gambaran', '<p style="text-align: center;"><strong>&nbsp;</strong></p>\r\n<p style="text-align: center;"><img src="super/foto/behind.jpg" alt="" width="100" height="182" /></p>\r\n<p style="text-align: center;"><span style="text-decoration: underline;"><strong>Ini Gambar</strong></span> D<em><strong>i tengah</strong> </em></p>', '9677445', 'siswa', 0),
(6, '2013-12-17', 'test-test', 'client telah mengamati sejauh ini. Hal ini meskipun klien dapat berkomunikasi dengan\r\nberbeda manajer replika pada waktu yang berbeda , dan karena itu bisa pada prinsipnya\r\nberkomunikasi dengan manajer replika yang '' kurang maju '' daripada yang mereka gunakan\r\nsebelumnya.\r\nKonsistensi santai antara replika : Semua manajer replika akhirnya menerima semua\r\nupdate dan mereka menerapkan pembaruan dengan memesan jaminan yang membuat replika\r\ncukup mirip untuk memenuhi kebutuhan aplikasi . Adalah penting untuk menyadari bahwa\r\nsedangkan arsitektur gosip dapat digunakan untuk mencapai konsistensi sekuensial , itu adalah\r\nterutama ditujukan untuk memberikan jaminan konsistensi lemah. Dua klien mungkin\r\nmengamati replika yang berbeda meskipun replika termasuk set yang sama update ,\r\ndan klien dapat mengamati data yang basi \r\n', '23424234', 'staff', 1),
(7, '2014-01-13', 'okes', '<p>Untuk mendukung konsistensi santai , arsitektur gosip mendukung pembaruan pemesanan kausal ,<br /> seperti yang kita mendefinisikannya dalam Bagian 15.2.1 . Ini juga mendukung jaminan memesan kuat dalam<br /> bentuk paksa ( total dan kausal ) dan langsung memesan . Segera update - memerintahkan<br /> diterapkan dalam urutan yang konsisten relatif terhadap setiap update lain pada semua manajer replika ,</p>', '23424234', 'staff', 1),
(8, '2014-01-08', 'Kegiatan Sekolah', '<p style="text-align: justify;">apakah pembaruan pemesanan lainnya ditetapkan sebagai kausal , paksa atau langsung . segera<br /> pemesanan disediakan di samping terpaksa memesan , karena update dipaksa -order dan<br /> Update kausal -order yang tidak berhubungan dengan hubungan yang terjadi - sebelum dapat diterapkan<br /> dalam urutan yang berbeda pada manajer replika yang berbeda .<br /> Pilihan yang memesan untuk menggunakan diserahkan kepada desainer aplikasi dan mencerminkan<br /> trade- off antara konsistensi dan biaya operasional . Update kausal yang jauh<br /> lebih murah dari</p>', '1234567', 'semua', 1),
(9, '2013-12-23', 'coba', '<p>fdsfafdsfafaf</p>', '9677445', 'staff', 1),
(10, '2014-01-08', 'Pelaksanaan Try Out', '<p>Diinformasikan Kepada murid kelas 12 sehubungan akan mendekati ujian nasional maka akan segera dilakasanakan try out pada tanggal 14 Februari 2014</p>', '1234567', 'siswa', 1),
(11, '2014-01-08', 'Pelaksanaan Remidi', '<h1 style="text-align: center; color: #ff0000;"><strong>Diberitahukan</strong></h1>\r\n<p style="text-align: center;">Kepada Murid Kelas 10 RPL Akan</p>\r\n<p style="text-align: center;">diadakan remidi mata pelajaran Matematika</p>\r\n<p style="text-align: center;">&nbsp;</p>\r\n<p style="text-align: center;">Tertanda Bp. Muaris</p>', '23424234', 'siswa', 1),
(12, '2014-01-13', 'Pelajaran Tambahan', '<p>Ada Pelajaran tambahan untuk siswa kelas 3 RPL</p>', '23424234', 'siswa', 1),
(13, '2014-01-18', 'Info Pembayaran', '<p>Diberitahukan kepada siswa/siswi SMK Muhammadiyah 1 Weleri Kendal sehubungan dengan adanya perbaikan BMT Muamalat libur dari tanggal 21 s/d 25 Januari 2014. terima kasih</p>', '10040005', 'semua', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

CREATE TABLE IF NOT EXISTS `biodata` (
  `NIS` varchar(15) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `JK` enum('L','P') DEFAULT NULL,
  `Tmplahir` varchar(35) DEFAULT NULL,
  `TglLahir` date DEFAULT NULL,
  `NoIjasah` varchar(15) DEFAULT NULL,
  `NoSKHUN` varchar(15) DEFAULT NULL,
  `Agama` varchar(10) DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL,
  `Alamat` text,
  `Kodepos` varchar(10) DEFAULT NULL,
  `NoTelp` varchar(15) DEFAULT NULL,
  `Cita` varchar(20) DEFAULT NULL,
  `Hobi` varchar(20) DEFAULT NULL,
  `Jarak` varchar(15) DEFAULT NULL,
  `Transportasi` varchar(25) DEFAULT NULL,
  `IdJurusan` varchar(4) DEFAULT NULL,
  `Angkatan` int(5) DEFAULT NULL,
  `IdUser` int(9) DEFAULT NULL,
  `url` text,
  PRIMARY KEY (`NIS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`NIS`, `nama`, `JK`, `Tmplahir`, `TglLahir`, `NoIjasah`, `NoSKHUN`, `Agama`, `Status`, `Alamat`, `Kodepos`, `NoTelp`, `Cita`, `Hobi`, `Jarak`, `Transportasi`, `IdJurusan`, `Angkatan`, `IdUser`, `url`) VALUES
('10030011', 'Almereno Cakrawangsa Hery', 'L', 'Semarang', '1996-01-14', 'JHJK87867', 'HKJH879', 'islam', 'KANDUNG/2', 'Penaruban RT. 02/RW. 04', '51355', '0897987676', 'Wiraswasta', 'Olahraga', '1-3 km', 'Sepeda', 'RPL', 2014, 13, 'foto/CATNAP.JPG'),
('10030012', 'Evelyn Natarina', 'P', 'Semarang', '1995-02-10', 'JK9879', 'KJL90754', 'islam', 'KANDUNG/3', 'JL. Soekarno Hatta No.418', '51888', '90897889', 'PNS', 'Menulis', '3-5 km', 'Motor', 'RPL', 2014, 14, 'foto/AK090.BMP'),
('1003005', '', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 21, 'foto/');

--
-- Trigger `biodata`
--
DROP TRIGGER IF EXISTS `update_nis`;
DELIMITER //
CREATE TRIGGER `update_nis` BEFORE UPDATE ON `biodata`
 FOR EACH ROW BEGIN 
UPDATE userlogin SET Username= new.NIS WHERE Username= old.NIS;
UPDATE transkip SET NIS= new.NIS WHERE NIS= old.NIS;
UPDATE pembayaran SET NIS= new.NIS WHERE NIS= old.NIS;
UPDATE ortu SET NIS= new.NIS WHERE NIS= old.NIS;
UPDATE kelas SET NIS= new.NIS WHERE NIS= old.NIS;
UPDATE asalsekolah SET NIS= new.NIS WHERE NIS= old.NIS;
UPDATE absensi SET NIS= new.NIS WHERE NIS= old.NIS;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `hapus_nis`;
DELIMITER //
CREATE TRIGGER `hapus_nis` AFTER DELETE ON `biodata`
 FOR EACH ROW BEGIN 
DELETE FROM userlogin WHERE Username= old.NIS;
DELETE FROM transkip WHERE NIS= old.NIS;
DELETE FROM pembayaran WHERE NIS= old.NIS;
DELETE FROM ortu WHERE NIS= old.NIS;
DELETE FROM kelas WHERE NIS= old.NIS;
DELETE FROM asalsekolah WHERE NIS= old.NIS;
DELETE FROM absensi WHERE NIS= old.NIS;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dafkelas`
--

CREATE TABLE IF NOT EXISTS `dafkelas` (
  `IdKelas` varchar(15) NOT NULL,
  `kuota` int(4) NOT NULL,
  PRIMARY KEY (`IdKelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dafkelas`
--

INSERT INTO `dafkelas` (`IdKelas`, `kuota`) VALUES
('10AK1', 42),
('10AK2', 42),
('10AK3', 42),
('10AP', 42),
('10RPL', 42),
('11AK1', 42),
('11AK2', 42),
('11AK3', 42),
('11AP', 42),
('11RPL', 42),
('12AK1', 42),
('12AK2', 42),
('12AK3', 42),
('12AP', 42);

--
-- Trigger `dafkelas`
--
DROP TRIGGER IF EXISTS `update_kelas`;
DELIMITER //
CREATE TRIGGER `update_kelas` BEFORE UPDATE ON `dafkelas`
 FOR EACH ROW BEGIN 
UPDATE kelas SET IdKelas= new.IdKelas WHERE IdKelas= old.IdKelas;
UPDATE jadwal SET IdKelas= new.IdKelas WHERE IdKelas= old.IdKelas;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `hapus_kelas`;
DELIMITER //
CREATE TRIGGER `hapus_kelas` AFTER DELETE ON `dafkelas`
 FOR EACH ROW BEGIN 
DELETE FROM kelas WHERE IdKelas= old.IdKelas;
DELETE FROM jadwal WHERE IdKelas= old.IdKelas;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `info_absensi`
--
CREATE TABLE IF NOT EXISTS `info_absensi` (
`idabsensi` int(10)
,`nis` varchar(15)
,`nama` varchar(25)
,`idkelas` varchar(15)
,`smtr` varchar(10)
,`ta` varchar(10)
,`bulan` int(2)
,`pertemuan` int(6)
,`kehadiran` int(6)
,`s` int(5)
,`i` int(5)
,`a` int(5)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `info_bayar`
--
CREATE TABLE IF NOT EXISTS `info_bayar` (
`nis` varchar(15)
,`nama` varchar(25)
,`notrans` int(10)
,`idkelas` varchar(15)
,`smtr` varchar(10)
,`bulan` int(2)
,`tanggal` date
,`batas` int(11)
,`jenis` varchar(10)
,`biaya` int(11)
,`ta` varchar(10)
,`teller` varchar(20)
,`kelas` int(11)
,`status` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `info_biodata`
--
CREATE TABLE IF NOT EXISTS `info_biodata` (
`NIS` varchar(15)
,`nama` varchar(25)
,`JK` enum('L','P')
,`Tmplahir` varchar(35)
,`TglLahir` date
,`NoIjasah` varchar(15)
,`NoSKHUN` varchar(15)
,`Agama` varchar(10)
,`Status` varchar(15)
,`Alamat` text
,`Kodepos` varchar(10)
,`NoTelp` varchar(15)
,`Cita` varchar(20)
,`Hobi` varchar(20)
,`Jarak` varchar(15)
,`Transportasi` varchar(25)
,`Angkatan` int(5)
,`IdJurusan` varchar(4)
,`url` text
,`IdUser` int(9)
,`NmIbu` varchar(20)
,`NmAyah` varchar(20)
,`PkrjAyah` varchar(20)
,`PkrjIbu` varchar(20)
,`PendAyah` varchar(10)
,`PendIbu` varchar(10)
,`GolGaji` varchar(20)
,`NmWali` varchar(20)
,`AlamatWali` varchar(30)
,`NoTelpWali` varchar(15)
,`Sekolah` varchar(35)
,`Kec` varchar(30)
,`Kab` varchar(30)
,`AlamatSekolah` text
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `info_form`
--
CREATE TABLE IF NOT EXISTS `info_form` (
`username` varchar(15)
,`nis` varchar(15)
,`url` text
,`nama` varchar(25)
,`iduser` int(9)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `info_konten`
--
CREATE TABLE IF NOT EXISTS `info_konten` (
`id` int(5)
,`tgl` date
,`judul` varchar(50)
,`konten` text
,`nik` varchar(15)
,`akses` varchar(10)
,`status` int(11)
,`nama` varchar(35)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `info_mapel`
--
CREATE TABLE IF NOT EXISTS `info_mapel` (
`KodeMapel` varchar(10)
,`Mapel` varchar(30)
,`IdKategori` varchar(10)
,`Kelas` int(3)
,`IdJurusan` varchar(4)
,`kkm` int(6)
,`kategori` varchar(25)
,`program` varchar(35)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `info_nilai`
--
CREATE TABLE IF NOT EXISTS `info_nilai` (
`nis` varchar(15)
,`nama` varchar(25)
,`idkelas` varchar(15)
,`Smtr` varchar(10)
,`ta` varchar(10)
,`mapel` varchar(30)
,`uts` int(5)
,`uas` int(5)
,`nilai` int(5)
,`kkm` int(6)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `info_staff`
--
CREATE TABLE IF NOT EXISTS `info_staff` (
`id` int(5)
,`nik` varchar(15)
,`nama` varchar(35)
,`jk` varchar(3)
,`alamat` varchar(40)
,`hp` varchar(15)
,`jabatan` varchar(20)
,`url` text
);
-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `IdKelas` varchar(15) NOT NULL,
  `KodeMapel` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `IdKelas`, `KodeMapel`) VALUES
(2, '10RPL', '10PendAq'),
(3, '11RPL', 'MTKRPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `IdJurusan` varchar(4) NOT NULL,
  `Program` varchar(35) NOT NULL,
  `Bidang` text NOT NULL,
  PRIMARY KEY (`IdJurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`IdJurusan`, `Program`, `Bidang`) VALUES
('AK', 'Akuntansi', 'Manajemen'),
('All', 'Umum', 'Umum'),
('AP', 'Administrasi Perkantoran', 'Manajemen'),
('RPL', 'Rekayasa Perangkat Lunak', 'Informatika');

--
-- Trigger `jurusan`
--
DROP TRIGGER IF EXISTS `update_jurusan`;
DELIMITER //
CREATE TRIGGER `update_jurusan` BEFORE UPDATE ON `jurusan`
 FOR EACH ROW BEGIN 
UPDATE mapel SET IdJurusan= new.IdJurusan WHERE IdJurusan= old.IdJurusan;
UPDATE biodata SET IdJurusan= new.IdJurusan WHERE IdJurusan= old.IdJurusan;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `hapus_jurusan`;
DELIMITER //
CREATE TRIGGER `hapus_jurusan` AFTER DELETE ON `jurusan`
 FOR EACH ROW BEGIN 
DELETE FROM mapel WHERE IdJurusan= old.IdJurusan;
DELETE FROM biodata WHERE IdJurusan= old.IdJurusan;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `IdKategori` varchar(10) NOT NULL,
  `Kategori` varchar(25) NOT NULL,
  PRIMARY KEY (`IdKategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`IdKategori`, `Kategori`) VALUES
('Adp', 'Adaptif'),
('Nor', 'Normatif'),
('Prd', 'Produktif');

--
-- Trigger `kategori`
--
DROP TRIGGER IF EXISTS `update_kategori`;
DELIMITER //
CREATE TRIGGER `update_kategori` BEFORE UPDATE ON `kategori`
 FOR EACH ROW BEGIN 
UPDATE mapel SET IdKategori= new.IdKategori WHERE IdKategori= old.IdKategori;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `hapus_kategori`;
DELIMITER //
CREATE TRIGGER `hapus_kategori` AFTER DELETE ON `kategori`
 FOR EACH ROW BEGIN 
DELETE FROM mapel WHERE IdKategori= old.IdKategori;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `IdK` int(11) NOT NULL AUTO_INCREMENT,
  `IdKelas` varchar(15) NOT NULL,
  `NIS` varchar(15) NOT NULL,
  `TA` varchar(10) NOT NULL,
  PRIMARY KEY (`IdK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`IdK`, `IdKelas`, `NIS`, `TA`) VALUES
(47, '10RPL', '10030011', '2014/2015'),
(51, '10RPL', '10030012', '2014/2015');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE IF NOT EXISTS `keuangan` (
  `IdKeu` int(11) NOT NULL AUTO_INCREMENT,
  `Jenis` varchar(10) NOT NULL,
  `Kelas` int(11) NOT NULL,
  `Biaya` int(11) NOT NULL,
  `TA` varchar(10) NOT NULL,
  `Batas` int(11) NOT NULL,
  PRIMARY KEY (`IdKeu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`IdKeu`, `Jenis`, `Kelas`, `Biaya`, `TA`, `Batas`) VALUES
(4, 'DU', 11, 300000, '2014/2015', 5),
(7, 'SPP', 11, 80000, '2014/2015', 20),
(8, 'SPP', 10, 50000, '2014/2015', 20),
(9, 'DU', 10, 250000, '2014/2015', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kodepos`
--

CREATE TABLE IF NOT EXISTS `kodepos` (
  `kodepos` varchar(10) NOT NULL,
  `kab` varchar(30) NOT NULL,
  `kec` varchar(30) NOT NULL,
  PRIMARY KEY (`kodepos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kodepos`
--

INSERT INTO `kodepos` (`kodepos`, `kab`, `kec`) VALUES
('51354', 'Kendal', 'Rowosari'),
('51355', 'Kendal', 'Weleri'),
('51888', 'Batang', 'Gringsing'),
('67867', 'Batang', 'Plelen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konter`
--

CREATE TABLE IF NOT EXISTS `konter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `hak` varchar(10) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `idlogin` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data untuk tabel `konter`
--

INSERT INTO `konter` (`id`, `ip`, `tanggal`, `hak`, `waktu`, `idlogin`) VALUES
(1, '::1', '2013-12-30', '4', '00:00:00', 0),
(8, '::1', '2013-12-30', '4', '08:35:05', 2),
(9, '::1', '2013-12-30', '4', '11:42:58', 1),
(10, '::1', '2013-12-30', '0', '09:35:41', 3),
(11, '::1', '2013-12-31', '0', '05:57:05', 1),
(12, '::1', '2013-12-31', '0', '01:14:11', 3),
(13, '::1', '2013-12-31', '1', '12:52:30', 2),
(14, '::1', '2013-12-31', '2', '02:27:32', 4),
(15, '::1', '2014-01-01', '2', '04:06:41', 4),
(16, '::1', '2014-01-01', '1', '04:32:49', 2),
(17, '::1', '2014-01-02', '0', '05:40:56', 3),
(18, '::1', '2014-01-05', '0', '04:56:33', 3),
(19, '::1', '2014-01-05', '1', '07:32:58', 2),
(20, '::1', '2014-01-06', '4', '06:29:10', 1),
(21, '::1', '2014-01-06', '1', '04:39:08', 2),
(22, '::1', '2014-01-07', '1', '12:30:28', 1),
(23, '::1', '2014-01-07', '4', '07:01:30', 2),
(24, '::1', '2014-01-07', '0', '12:40:14', 3),
(25, '::1', '2014-01-08', '1', '10:54:52', 2),
(26, '::1', '2014-01-08', '0', '11:12:31', 1),
(27, '::1', '2014-01-08', '0', '09:05:11', 3),
(28, '::1', '2014-01-08', '4', '10:53:19', 13),
(29, '::1', '2014-01-08', '4', '02:26:30', 0),
(30, '::1', '2014-01-08', '2', '08:50:40', 4),
(31, '::1', '2014-01-08', '4', '06:59:50', 14),
(32, '::1', '2014-01-09', '4', '07:53:52', 14),
(33, '::1', '2014-01-09', '4', '06:24:53', 13),
(34, '::1', '2014-01-09', '0', '07:48:23', 3),
(35, '::1', '2014-01-09', '1', '07:44:22', 2),
(36, '::1', '2014-01-09', '4', '07:53:27', 15),
(37, '::1', '2014-01-09', '2', '07:37:27', 4),
(38, '::1', '2014-01-09', '4', '07:53:13', 0),
(39, '::1', '2014-01-10', '1', '02:23:41', 2),
(40, '::1', '2014-01-13', '0', '01:40:17', 3),
(41, '::1', '2014-01-13', '1', '05:54:32', 2),
(42, '::1', '2014-01-13', '3', '05:53:29', 6),
(43, '::1', '2014-01-13', '2', '06:01:04', 4),
(44, '::1', '2014-01-13', '4', '05:49:46', 14),
(45, '::1', '2014-01-13', '4', '05:55:24', 16),
(46, '::1', '2014-01-18', '3', '06:54:07', 6),
(47, '::1', '2014-01-31', '1', '12:53:59', 2),
(48, '::1', '2014-01-31', '4', '04:05:06', 13),
(49, '::1', '2014-02-08', '0', '03:23:17', 1),
(50, '::1', '2014-02-08', '1', '05:23:40', 2),
(51, '::1', '2014-02-08', '4', '05:24:39', 16),
(52, '::1', '2014-03-07', '1', '03:41:06', 2),
(53, '::1', '2014-03-07', '2', '04:07:52', 4),
(54, '::1', '2014-03-08', '1', '08:54:53', 2),
(55, '::1', '2014-03-08', '2', '08:33:26', 4),
(56, '::1', '2014-03-08', '4', '09:32:58', 13),
(57, '::1', '2014-03-11', '1', '02:11:29', 2),
(58, '::1', '2014-03-12', '1', '05:37:45', 2),
(59, '::1', '2014-03-19', '1', '01:13:30', 2),
(60, '::1', '2014-03-21', '1', '05:45:11', 2),
(61, '::1', '2014-03-22', '1', '05:36:49', 2),
(62, '::1', '2014-03-23', '0', '02:37:49', 3),
(63, '::1', '2014-03-23', '1', '04:04:52', 2),
(64, '::1', '2014-03-23', '2', '03:46:42', 4),
(65, '::1', '2014-03-23', '3', '04:00:46', 6),
(66, '::1', '2014-03-23', '4', '07:50:10', 13),
(67, '::1', '2014-03-24', '4', '07:56:40', 13),
(68, '::1', '2014-03-24', '4', '08:00:32', 17),
(69, '::1', '2014-03-24', '1', '09:57:28', 2),
(70, '::1', '2014-03-24', '4', '08:15:30', 18),
(71, '::1', '2014-03-24', '4', '09:10:17', 16),
(72, '::1', '2014-03-24', '4', '09:26:51', 19),
(73, '::1', '2014-03-24', '4', '09:54:16', 20),
(74, '::1', '2014-03-24', '4', '10:16:32', 21),
(75, '::1', '2014-03-24', '0', '10:36:55', 1),
(76, '127.0.0.1', '2014-03-24', '0', '10:36:16', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
  `KodeMapel` varchar(10) NOT NULL,
  `Mapel` varchar(30) NOT NULL,
  `IdKategori` varchar(10) NOT NULL,
  `Kelas` int(3) NOT NULL,
  `IdJurusan` varchar(4) NOT NULL,
  `kkm` int(6) NOT NULL,
  PRIMARY KEY (`KodeMapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`KodeMapel`, `Mapel`, `IdKategori`, `Kelas`, `IdJurusan`, `kkm`) VALUES
('', '', '', 10, '', 0),
('10PendAq', 'Aqidah', 'Nor', 10, 'ALL', 80),
('MTKAP', 'Matematika', 'Nor', 10, 'AP', 75),
('MTKRPL', 'Matematika', 'Nor', 11, 'RPL', 75);

--
-- Trigger `mapel`
--
DROP TRIGGER IF EXISTS `update_mapel`;
DELIMITER //
CREATE TRIGGER `update_mapel` BEFORE UPDATE ON `mapel`
 FOR EACH ROW BEGIN 
UPDATE transkip SET KodeMapel= new.KodeMapel WHERE KodeMapel= old.KodeMapel;
UPDATE pengajar SET KodeMapel= new.KodeMapel WHERE KodeMapel= old.KodeMapel;
UPDATE jadwal SET KodeMapel= new.KodeMapel WHERE KodeMapel= old.KodeMapel;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `hapus_mapel`;
DELIMITER //
CREATE TRIGGER `hapus_mapel` AFTER DELETE ON `mapel`
 FOR EACH ROW BEGIN 
DELETE FROM transkip WHERE KodeMapel= old.KodeMapel;
DELETE FROM pengajar WHERE KodeMapel= old.KodeMapel;
DELETE FROM jadwal WHERE KodeMapel= old.KodeMapel;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ortu`
--

CREATE TABLE IF NOT EXISTS `ortu` (
  `IdOrtu` int(6) NOT NULL AUTO_INCREMENT,
  `NmIbu` varchar(20) DEFAULT NULL,
  `NmAyah` varchar(20) DEFAULT NULL,
  `PkrjAyah` varchar(20) DEFAULT NULL,
  `PkrjIbu` varchar(20) DEFAULT NULL,
  `PendAyah` varchar(10) DEFAULT NULL,
  `PendIbu` varchar(10) DEFAULT NULL,
  `GolGaji` varchar(20) DEFAULT NULL,
  `NmWali` varchar(20) DEFAULT NULL,
  `AlamatWali` varchar(30) DEFAULT NULL,
  `NoTelpWali` varchar(15) DEFAULT NULL,
  `NIS` varchar(15) NOT NULL,
  PRIMARY KEY (`IdOrtu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `ortu`
--

INSERT INTO `ortu` (`IdOrtu`, `NmIbu`, `NmAyah`, `PkrjAyah`, `PkrjIbu`, `PendAyah`, `PendIbu`, `GolGaji`, `NmWali`, `AlamatWali`, `NoTelpWali`, `NIS`) VALUES
(5, 'Dwi Fajar Yani', 'Heru Mahya', 'Pedagang/Wiraswasta', 'Guru/dosen', 'SMA', 'SMA', '1juta-3juta', '', '', '098907786756', '10030011'),
(6, 'Ika Yulianti', 'Cahya Marhendra', '', '', 'S1', 'D3', '1juta-3juta', '', '', '0989789', '10030012'),
(12, '', '', '', '', '', '', '', '', '', '', '1003005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `NoTrans` int(10) NOT NULL AUTO_INCREMENT,
  `NIS` varchar(15) NOT NULL,
  `IdKeu` varchar(6) NOT NULL,
  `IdSmtr` varchar(8) DEFAULT NULL,
  `ta` varchar(10) DEFAULT NULL,
  `Bulan` int(2) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Teller` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`NoTrans`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133 ;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`NoTrans`, `NIS`, `IdKeu`, `IdSmtr`, `ta`, `Bulan`, `Tanggal`, `Teller`, `status`) VALUES
(105, '10030011', '9', 'GJL', '2014/2015', 0, '0000-00-00', '', 0),
(106, '10030011', '9', 'GNP', '2014/2015', 0, '0000-00-00', '', 0),
(107, '10030011', '8', 'GJL', '2014/2015', 1, '0000-00-00', '', 0),
(108, '10030011', '8', 'GNP', '2014/2015', 2, '0000-00-00', '', 0),
(109, '10030011', '8', 'GNP', '2014/2015', 3, '0000-00-00', '', 0),
(110, '10030011', '8', 'GNP', '2014/2015', 4, '0000-00-00', '', 0),
(111, '10030011', '8', 'GNP', '2014/2015', 5, '0000-00-00', '', 0),
(112, '10030011', '8', 'GNP', '2014/2015', 6, '0000-00-00', '', 0),
(113, '10030011', '8', 'GNP', '2014/2015', 7, '0000-00-00', '', 0),
(114, '10030011', '8', 'GJL', '2014/2015', 8, '2014-01-08', '9677445', 1),
(115, '10030011', '8', 'GJL', '2014/2015', 9, '0000-00-00', '', 0),
(116, '10030011', '8', 'GJL', '2014/2015', 10, '0000-00-00', '', 0),
(117, '10030011', '8', 'GJL', '2014/2015', 11, '0000-00-00', '', 0),
(118, '10030011', '8', 'GJL', '2014/2015', 12, '0000-00-00', '', 0),
(119, '10030012', '9', 'GJL', '2014/2015', 0, '0000-00-00', '', 0),
(120, '10030012', '9', 'GNP', '2014/2015', 0, '0000-00-00', '', 0),
(121, '10030012', '8', 'GJL', '2014/2015', 1, '0000-00-00', '', 0),
(122, '10030012', '8', 'GNP', '2014/2015', 2, '0000-00-00', '', 0),
(123, '10030012', '8', 'GNP', '2014/2015', 3, '0000-00-00', '', 0),
(124, '10030012', '8', 'GNP', '2014/2015', 4, '0000-00-00', '', 0),
(125, '10030012', '8', 'GNP', '2014/2015', 5, '0000-00-00', '', 0),
(126, '10030012', '8', 'GNP', '2014/2015', 6, '0000-00-00', '', 0),
(127, '10030012', '8', 'GNP', '2014/2015', 7, '0000-00-00', '', 0),
(128, '10030012', '8', 'GJL', '2014/2015', 8, '2014-01-13', '10040005', 1),
(129, '10030012', '8', 'GJL', '2014/2015', 9, '0000-00-00', '', 0),
(130, '10030012', '8', 'GJL', '2014/2015', 10, '0000-00-00', '', 0),
(131, '10030012', '8', 'GJL', '2014/2015', 11, '2014-01-13', '10040005', 1),
(132, '10030012', '8', 'GJL', '2014/2015', 12, '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembkelas`
--

CREATE TABLE IF NOT EXISTS `pembkelas` (
  `kelas` varchar(6) NOT NULL,
  `IdKeu` varchar(6) NOT NULL,
  `Biaya` int(9) NOT NULL,
  PRIMARY KEY (`kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE IF NOT EXISTS `pengajar` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `NIK` varchar(15) NOT NULL,
  `KodeMapel` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`id`, `NIK`, `KodeMapel`) VALUES
(1, '23424234', '10PendAq'),
(3, '1234567', 'MTKAP'),
(4, '9677445', 'MTKRPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `IdSmtr` varchar(11) NOT NULL,
  `Smtr` varchar(10) NOT NULL,
  `Status` int(2) NOT NULL,
  PRIMARY KEY (`IdSmtr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`IdSmtr`, `Smtr`, `Status`) VALUES
('GJL', 'Ganjil', 1),
('GNP', 'Genap', 0);

--
-- Trigger `semester`
--
DROP TRIGGER IF EXISTS `update_semester`;
DELIMITER //
CREATE TRIGGER `update_semester` BEFORE UPDATE ON `semester`
 FOR EACH ROW BEGIN 
UPDATE pembayaran SET IdSmtr= new.IdSmtr WHERE IdSmtr= old.IdSmtr;
UPDATE absensi SET IdSmtr= new.IdSmtr WHERE IdSmtr= old.IdSmtr;
UPDATE transkip SET IdSmtr= new.IdSmtr WHERE IdSmtr= old.IdSmtr;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `hapus_semester`;
DELIMITER //
CREATE TRIGGER `hapus_semester` AFTER DELETE ON `semester`
 FOR EACH ROW BEGIN 
DELETE FROM pembayaran  WHERE IdSmtr=old.IdSmtr;
DELETE FROM absensi WHERE IdSmtr=old.IdSmtr;
DELETE FROM transkip WHERE IdSmtr=old.IdSmtr;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `nik` varchar(15) NOT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `jk` varchar(3) DEFAULT NULL,
  `alamat` varchar(40) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `url` text,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`nik`, `nama`, `jk`, `alamat`, `hp`, `jabatan`, `url`) VALUES
('10040005', '', '', '', '', '', ''),
('1234567', 'Edy Irwansyah Putra', 'L', 'Kendal', '080990', 'Staff IT', 'foto/editanbru.jpg'),
('23424234', 'Muaris', 'L', 'pemalang', '0897897', 'Sekretaris TU', 'foto/gue.jpg'),
('32324244', '', '', '', '', '', ''),
('9677445', 'Rofianto', 'L', 'Penaruban', '087656798', 'Kepala TU', 'foto/IMG00097-20121011-1338.jpg');

--
-- Trigger `staff`
--
DROP TRIGGER IF EXISTS `update_staff`;
DELIMITER //
CREATE TRIGGER `update_staff` BEFORE UPDATE ON `staff`
 FOR EACH ROW BEGIN 
UPDATE ad_login SET nik= new.nik WHERE nik= old.nik;
UPDATE pengajar  SET nik= new.nik WHERE nik= old.nik;
UPDATE berita SET nik= new.nik WHERE nik= old.nik;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `hapus_staff`;
DELIMITER //
CREATE TRIGGER `hapus_staff` AFTER DELETE ON `staff`
 FOR EACH ROW BEGIN 
DELETE FROM ad_login WHERE nik=old.nik;
DELETE FROM pengajar WHERE nik=old.nik;
DELETE FROM berita WHERE nik=old.nik;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta`
--

CREATE TABLE IF NOT EXISTS `ta` (
  `ta` varchar(10) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`ta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ta`
--

INSERT INTO `ta` (`ta`, `status`) VALUES
('2010/2011', 0),
('2012/2013', 0),
('2013/2014', 0),
('2014/2015', 1);

--
-- Trigger `ta`
--
DROP TRIGGER IF EXISTS `update_ta`;
DELIMITER //
CREATE TRIGGER `update_ta` BEFORE UPDATE ON `ta`
 FOR EACH ROW BEGIN 
UPDATE pembayaran SET ta= new.ta WHERE ta=old.ta;
UPDATE kelas SET ta= new.ta WHERE ta=old.ta;
UPDATE transkip SET ta= new.ta WHERE ta=old.ta;
UPDATE absensi SET ta= new.ta WHERE ta=old.ta;
UPDATE keuangan SET ta= new.ta WHERE ta=old.ta;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `hapus_ta`;
DELIMITER //
CREATE TRIGGER `hapus_ta` AFTER DELETE ON `ta`
 FOR EACH ROW BEGIN 
DELETE FROM kelas WHERE ta=old.ta;
DELETE FROM pembayaran WHERE ta=old.ta;
DELETE FROM transkip WHERE ta=old.ta;
DELETE FROM absensi WHERE ta=old.ta;
DELETE FROM kelas WHERE ta=old.ta;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transkip`
--

CREATE TABLE IF NOT EXISTS `transkip` (
  `IdTranskip` int(9) NOT NULL AUTO_INCREMENT,
  `NIS` varchar(10) NOT NULL,
  `IdKelas` varchar(6) NOT NULL,
  `IdSmtr` varchar(6) NOT NULL,
  `ta` varchar(10) NOT NULL,
  `KodeMapel` varchar(10) NOT NULL,
  `UTS` int(5) DEFAULT NULL,
  `UAS` int(5) DEFAULT NULL,
  `Nilai` int(5) DEFAULT NULL,
  PRIMARY KEY (`IdTranskip`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `transkip`
--

INSERT INTO `transkip` (`IdTranskip`, `NIS`, `IdKelas`, `IdSmtr`, `ta`, `KodeMapel`, `UTS`, `UAS`, `Nilai`) VALUES
(11, '10030011', '10RPL', 'GJL', '2014/2015', 'MTKAP', 0, 0, 0),
(12, '10030011', '10RPL', 'GJL', '2014/2015', '10PendAq', 78, 0, 0),
(13, '10030012', '10RPL', 'GJL', '2014/2015', 'MTKAP', 0, 0, 0),
(14, '10030012', '10RPL', 'GJL', '2014/2015', '10PendAq', 85, 90, 88);

-- --------------------------------------------------------

--
-- Struktur dari tabel `userlogin`
--

CREATE TABLE IF NOT EXISTS `userlogin` (
  `IdUser` int(9) NOT NULL AUTO_INCREMENT,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Hak` int(7) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data untuk tabel `userlogin`
--

INSERT INTO `userlogin` (`IdUser`, `Username`, `Password`, `Hak`, `status`) VALUES
(13, '10030011', 'reno', 1, 1),
(14, '10030012', '10030012', 1, 1),
(21, '1003005', '1003005', 1, 1),
(22, '1003010', '1003010', 1, 1),
(23, '1003006', '1003006', 1, 1),
(24, '1003007', '1003007', 1, 1),
(25, '1003008', '1003008', 1, 1),
(26, '1003009', '1003009', 1, 1);

-- --------------------------------------------------------

--
-- Structure for view `info_absensi`
--
DROP TABLE IF EXISTS `info_absensi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_absensi` AS select `a`.`IdAbsensi` AS `idabsensi`,`b`.`NIS` AS `nis`,`b`.`nama` AS `nama`,`kel`.`IdKelas` AS `idkelas`,`s`.`Smtr` AS `smtr`,`a`.`ta` AS `ta`,`a`.`Bulan` AS `bulan`,`a`.`Pertemuan` AS `pertemuan`,`a`.`Kehadiran` AS `kehadiran`,`a`.`s` AS `s`,`a`.`i` AS `i`,`a`.`a` AS `a` from (((`biodata` `b` join `kelas` `kel`) join `absensi` `a`) join `semester` `s`) where ((`b`.`NIS` = `a`.`NIS`) and (`b`.`NIS` = `kel`.`NIS`) and (`a`.`IdSmtr` = `s`.`IdSmtr`) and (`a`.`ta` = `kel`.`TA`) and (`a`.`IdKelas` = `kel`.`IdKelas`));

-- --------------------------------------------------------

--
-- Structure for view `info_bayar`
--
DROP TABLE IF EXISTS `info_bayar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_bayar` AS select `b`.`NIS` AS `nis`,`b`.`nama` AS `nama`,`p`.`NoTrans` AS `notrans`,`k`.`IdKelas` AS `idkelas`,`s`.`Smtr` AS `smtr`,`p`.`Bulan` AS `bulan`,`p`.`Tanggal` AS `tanggal`,`keu`.`Batas` AS `batas`,`keu`.`Jenis` AS `jenis`,`keu`.`Biaya` AS `biaya`,`keu`.`TA` AS `ta`,`p`.`Teller` AS `teller`,`keu`.`Kelas` AS `kelas`,`p`.`status` AS `status` from ((((`biodata` `b` join `pembayaran` `p`) join `keuangan` `keu`) join `semester` `s`) join `kelas` `k`) where ((`b`.`NIS` = `p`.`NIS`) and (`b`.`NIS` = `k`.`NIS`) and (`p`.`IdSmtr` = `s`.`IdSmtr`) and (`p`.`IdKeu` = `keu`.`IdKeu`) and (`keu`.`Kelas` = substr(`k`.`IdKelas`,1,2)) and (`keu`.`TA` = `k`.`TA`));

-- --------------------------------------------------------

--
-- Structure for view `info_biodata`
--
DROP TABLE IF EXISTS `info_biodata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_biodata` AS select `b`.`NIS` AS `NIS`,`b`.`nama` AS `nama`,`b`.`JK` AS `JK`,`b`.`Tmplahir` AS `Tmplahir`,`b`.`TglLahir` AS `TglLahir`,`b`.`NoIjasah` AS `NoIjasah`,`b`.`NoSKHUN` AS `NoSKHUN`,`b`.`Agama` AS `Agama`,`b`.`Status` AS `Status`,`b`.`Alamat` AS `Alamat`,`b`.`Kodepos` AS `Kodepos`,`b`.`NoTelp` AS `NoTelp`,`b`.`Cita` AS `Cita`,`b`.`Hobi` AS `Hobi`,`b`.`Jarak` AS `Jarak`,`b`.`Transportasi` AS `Transportasi`,`b`.`Angkatan` AS `Angkatan`,`b`.`IdJurusan` AS `IdJurusan`,`b`.`url` AS `url`,`b`.`IdUser` AS `IdUser`,`o`.`NmIbu` AS `NmIbu`,`o`.`NmAyah` AS `NmAyah`,`o`.`PkrjAyah` AS `PkrjAyah`,`o`.`PkrjIbu` AS `PkrjIbu`,`o`.`PendAyah` AS `PendAyah`,`o`.`PendIbu` AS `PendIbu`,`o`.`GolGaji` AS `GolGaji`,`o`.`NmWali` AS `NmWali`,`o`.`AlamatWali` AS `AlamatWali`,`o`.`NoTelpWali` AS `NoTelpWali`,`a`.`Sekolah` AS `Sekolah`,`a`.`Kec` AS `Kec`,`a`.`Kab` AS `Kab`,`a`.`AlamatSekolah` AS `AlamatSekolah` from ((`biodata` `b` join `ortu` `o`) join `asalsekolah` `a`) where ((`b`.`NIS` = `o`.`NIS`) and (`b`.`NIS` = `a`.`NIS`));

-- --------------------------------------------------------

--
-- Structure for view `info_form`
--
DROP TABLE IF EXISTS `info_form`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_form` AS select `u`.`Username` AS `username`,`b`.`NIS` AS `nis`,`b`.`url` AS `url`,`b`.`nama` AS `nama`,`u`.`IdUser` AS `iduser` from (`biodata` `b` join `userlogin` `u`) where (`b`.`NIS` = `u`.`Username`);

-- --------------------------------------------------------

--
-- Structure for view `info_konten`
--
DROP TABLE IF EXISTS `info_konten`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_konten` AS select `b`.`id` AS `id`,`b`.`tgl` AS `tgl`,`b`.`judul` AS `judul`,`b`.`konten` AS `konten`,`b`.`nik` AS `nik`,`b`.`akses` AS `akses`,`b`.`status` AS `status`,`s`.`nama` AS `nama` from (`berita` `b` join `staff` `s`) where (`b`.`nik` = `s`.`nik`);

-- --------------------------------------------------------

--
-- Structure for view `info_mapel`
--
DROP TABLE IF EXISTS `info_mapel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_mapel` AS select `m`.`KodeMapel` AS `KodeMapel`,`m`.`Mapel` AS `Mapel`,`m`.`IdKategori` AS `IdKategori`,`m`.`Kelas` AS `Kelas`,`m`.`IdJurusan` AS `IdJurusan`,`m`.`kkm` AS `kkm`,`k`.`Kategori` AS `kategori`,`j`.`Program` AS `program` from ((`mapel` `m` join `jurusan` `j`) join `kategori` `k`) where ((`m`.`IdJurusan` = `j`.`IdJurusan`) and (`k`.`IdKategori` = `m`.`IdKategori`));

-- --------------------------------------------------------

--
-- Structure for view `info_nilai`
--
DROP TABLE IF EXISTS `info_nilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_nilai` AS select `b`.`NIS` AS `nis`,`b`.`nama` AS `nama`,`kel`.`IdKelas` AS `idkelas`,`s`.`Smtr` AS `Smtr`,`kel`.`TA` AS `ta`,`m`.`Mapel` AS `mapel`,`t`.`UTS` AS `uts`,`t`.`UAS` AS `uas`,`t`.`Nilai` AS `nilai`,`m`.`kkm` AS `kkm` from ((((`biodata` `b` join `transkip` `t`) join `semester` `s`) join `mapel` `m`) join `kelas` `kel`) where ((`b`.`NIS` = `t`.`NIS`) and (`b`.`NIS` = `kel`.`NIS`) and (`m`.`KodeMapel` = `t`.`KodeMapel`) and (`t`.`IdSmtr` = `s`.`IdSmtr`) and (`t`.`IdKelas` = `kel`.`IdKelas`) and (`t`.`ta` = `kel`.`TA`));

-- --------------------------------------------------------

--
-- Structure for view `info_staff`
--
DROP TABLE IF EXISTS `info_staff`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_staff` AS select `a`.`id` AS `id`,`s`.`nik` AS `nik`,`s`.`nama` AS `nama`,`s`.`jk` AS `jk`,`s`.`alamat` AS `alamat`,`s`.`hp` AS `hp`,`s`.`jabatan` AS `jabatan`,`s`.`url` AS `url` from (`ad_login` `a` join `staff` `s`) where (`a`.`nik` = `s`.`nik`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
