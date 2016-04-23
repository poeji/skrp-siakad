-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 13 Feb 2016 pada 14.06
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `dbsiakad`
--
CREATE DATABASE IF NOT EXISTS `dbsiakad` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbsiakad`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(2) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `namaadmin` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `userid`, `password`, `namaadmin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `nip` varchar(30) NOT NULL,
  `nama_guru` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `st_menikah` varchar(20) DEFAULT NULL,
  `tlp_rmh` varchar(20) DEFAULT NULL,
  `hp` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status_guru` int(1) DEFAULT '1' COMMENT 'Status Login Masih Aktif atau Tidak, 1= Aktif, 0=Tidak Aktif',
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `agama`, `st_menikah`, `tlp_rmh`, `hp`, `password`, `status_guru`) VALUES
('12222222222', 'iqbal', 'jjj', '2016-02-16', 'L', 'jjnnnnn test', 'ISLAM', 'KAWIN', '099999', '99999999', '77e69c137812518e359196bb2f5e9bb9', 1),
('201601001', 'Nafsiah', 'Blitar', '1989-08-11', 'P', 'Cilandak, Jakarta Selatan', 'ISLAM', 'KAWIN', '02178912345', '081314538117', '77e69c137812518e359196bb2f5e9bb9', 1),
('201601002', 'BURHAN ALI', 'Bandung', '1977-08-25', 'L', 'Depok, Jawa Barat', '1', 'KAWIN', '02178912345', '081314538117', '77e69c137812518e359196bb2f5e9bb9', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(10) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT NULL,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `kode_pelajaran` varchar(10) DEFAULT NULL,
  `jam` int(1) DEFAULT NULL,
  `hari` int(1) DEFAULT NULL COMMENT '1 = Senin',
  `thn_ajaran` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `kode_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kode_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_kelas`) VALUES
('XIIS1', 'XIIS1'),
('XIIS2', 'XIIS2'),
('XIIS3', 'XIIS3'),
('XIIS4', 'XIIS4'),
('XMIA1', 'XMIA1'),
('XMIA2', 'XMIA2'),
('XMIA3', 'XMIA3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurikulum`
--

CREATE TABLE IF NOT EXISTS `kurikulum` (
  `id_belajar` int(250) NOT NULL AUTO_INCREMENT,
  `tgl_input` datetime DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `thn_ajaran` varchar(10) DEFAULT NULL,
  `kode_pelajaran` varchar(5) DEFAULT NULL,
  `kode_kelas` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_belajar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `kurikulum`
--

INSERT INTO `kurikulum` (`id_belajar`, `tgl_input`, `nip`, `thn_ajaran`, `kode_pelajaran`, `kode_kelas`) VALUES
(1, '2016-02-08 17:07:32', '201601002', '2015-2016', 'P002', 'XIIS1'),
(3, '2016-02-08 17:52:54', '201601001', '2015-2016', 'P002', 'XIIS1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_keterampilan`
--

CREATE TABLE IF NOT EXISTS `nilai_keterampilan` (
  `id_nilaiketerampilan` int(200) NOT NULL AUTO_INCREMENT,
  `tgl_input` datetime DEFAULT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nis` varchar(30) DEFAULT NULL,
  `kode_pelajaran` varchar(10) DEFAULT NULL,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `np1` int(3) DEFAULT NULL,
  `np2` int(3) DEFAULT NULL,
  `np3` int(3) DEFAULT NULL,
  `np4` int(3) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_nilaiketerampilan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `nilai_keterampilan`
--

INSERT INTO `nilai_keterampilan` (`id_nilaiketerampilan`, `tgl_input`, `tahun_ajaran`, `nip`, `nis`, `kode_pelajaran`, `kode_kelas`, `np1`, `np2`, `np3`, `np4`, `semester`) VALUES
(1, '2016-02-08 17:25:29', '2015-2016', '201601001', '2016004', 'P001', 'XIIS2', 10, 10, 10, 60, 1),
(2, '2016-02-08 17:25:29', '2015-2016', '201601001', '2016005', 'P001', 'XIIS2', 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_pengetahuan`
--

CREATE TABLE IF NOT EXISTS `nilai_pengetahuan` (
  `id_nilaipengetahuan` int(200) NOT NULL AUTO_INCREMENT,
  `tgl_input` datetime DEFAULT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nis` varchar(30) DEFAULT NULL,
  `kode_pelajaran` varchar(10) DEFAULT NULL,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `uh1` int(3) DEFAULT NULL,
  `uh2` int(3) DEFAULT NULL,
  `uh3` int(3) DEFAULT NULL,
  `uh4` int(3) DEFAULT NULL,
  `uts` int(3) DEFAULT NULL,
  `uas` int(3) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_nilaipengetahuan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `nilai_pengetahuan`
--

INSERT INTO `nilai_pengetahuan` (`id_nilaipengetahuan`, `tgl_input`, `tahun_ajaran`, `nip`, `nis`, `kode_pelajaran`, `kode_kelas`, `uh1`, `uh2`, `uh3`, `uh4`, `uts`, `uas`, `semester`) VALUES
(1, '2016-02-08 17:19:20', '2015-2016', '201601001', '2016004', 'P001', 'XIIS2', 0, 0, 0, 0, 0, 0, 1),
(2, '2016-02-08 17:19:20', '2015-2016', '201601001', '2016005', 'P001', 'XIIS2', 10, 20, 30, 40, 50, 60, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_remed`
--

CREATE TABLE IF NOT EXISTS `nilai_remed` (
  `id_nilaisikap` int(200) NOT NULL AUTO_INCREMENT,
  `tgl_input` datetime DEFAULT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nis` varchar(30) DEFAULT NULL,
  `kode_pelajaran` varchar(10) DEFAULT NULL,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `nilairemed` varchar(10) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_nilaisikap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `nilai_remed`
--

INSERT INTO `nilai_remed` (`id_nilaisikap`, `tgl_input`, `tahun_ajaran`, `nip`, `nis`, `kode_pelajaran`, `kode_kelas`, `nilairemed`, `semester`) VALUES
(1, '2016-02-08 17:29:16', '2015-2016', '201601001', '2016004', 'P001', 'XIIS2', '70', 1),
(2, '2016-02-08 17:29:16', '2015-2016', '201601001', '2016005', 'P001', 'XIIS2', '90', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelajaran`
--

CREATE TABLE IF NOT EXISTS `pelajaran` (
  `kode_pelajaran` varchar(10) NOT NULL,
  `nama_pelajaran` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_pelajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelajaran`
--

INSERT INTO `pelajaran` (`kode_pelajaran`, `nama_pelajaran`) VALUES
('P001', 'Sejarah Indonesia'),
('P002', 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor`
--

CREATE TABLE IF NOT EXISTS `rapor` (
  `id_rapor` int(10) NOT NULL AUTO_INCREMENT,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `thn_ajaran` varchar(10) DEFAULT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `nilai` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_rapor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(10) NOT NULL,
  `nama_siswa` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `nama_orangtua` varchar(30) DEFAULT NULL,
  `telepon_orangtua` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `kode_kelas` varchar(15) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `status_siswa` int(1) DEFAULT '1' COMMENT 'Status Login Masih Aktif atau Tidak, 1= Aktif, 0=Tidak Aktif',
  PRIMARY KEY (`nis`),
  UNIQUE KEY `nis` (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `agama`, `jenis_kelamin`, `nama_orangtua`, `telepon_orangtua`, `password`, `kode_kelas`, `tahun`, `status_siswa`) VALUES
('11', 'bir', 'jkt', '2016-02-05', 'hjjjjjjjjjjjjj', 'HINDU', 'L', 'dddd', '06777365533', 'bcd724d15cde8c47650fda962968f102', 'XMIA3', '2015-2016', 1),
('1212', 'sobir', 'Jakarta', '2016-02-01', 'pontinak test', 'ISLAM', 'L', 'ajjj', 'aaaaa', 'bcd724d15cde8c47650fda962968f102', 'XIIS1', '2015-2016', 1),
('2', 'aa', 'ahh', '2016-02-10', 'kk', 'BUDHA', 'L', 'sumardi', '06777365533', 'bcd724d15cde8c47650fda962968f102', 'XIIS2', '2015-2016', 1),
('2016001', 'ABDUL MUIZ', 'JAKARTA', '1991-04-14', 'Mampang No. 12, Jakarta Selatan', 'ISLAM', 'P', 'Bambang', '0217891234', 'bcd724d15cde8c47650fda962968f102', 'XIIS1', '2015-2016', 1),
('2016002', 'Aditya Maulana', 'JAKARTA', '1992-02-16', 'Jakarta', 'HINDU', 'L', 'Lukman Hakim', '0217891234', 'bcd724d15cde8c47650fda962968f102', 'XIIS1', '2015-2016', 1),
('2016004', 'Cecep', 'Bandung', '1989-08-11', 'Warung Buncit, Jakarta Selatan', 'ISLAM', 'L', 'BURHAN', '0217891234', 'bcd724d15cde8c47650fda962968f102', 'XIIS2', '2015-2016', 1),
('213456', 'ffggg', 'bbbbb', '2016-02-17', 'bbbbbb', 'ISLAM', 'L', 'bbbbb', 'vvvvv', 'bcd724d15cde8c47650fda962968f102', 'XIIS2', '2015-2016', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
