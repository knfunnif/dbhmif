-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2020 pada 18.39
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hmif`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `bulan_lahir` int(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_level` int(4) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`nim`, `nama`, `tgl_lahir`, `bulan_lahir`, `alamat`, `telepon`, `email`, `username`, `password`, `user_level`, `foto`) VALUES
('24010316120005', 'Zulfikar Aulia Firdaus', '1999-01-13', 1, 'Puri Anjasmoro blok D2 no 15, Semarang', '087830327788', 'captnzulfikar@gmail.com', '24010316120005', '67b6ebec5d756e79fb2b63a8f272c3a7', 3, 'nofoto.png'),
('24010316120006', 'Yuli Nurhayati', '1998-07-17', 7, 'Villa Balaraja Blok N5 no 19 Saga Balaraja Kab. Tangerang Banten', '082298286125', 'yulinurhayati7@gmail.com', '24010316120006', '92c3585bc52bfc4055580bba2b15fde3', 3, 'nofoto.png'),
('24010316130063', 'Hermawan Adi P.', '1998-01-01', 1, 'Desa Sarirejo RT 14 RW 02 Kec. Pati Kab Pati 59118', '085640021899', 'adiprasetyohermawan00@gmail.com', '24010316130063', 'e608f106fffa64147308e3f05cdd09bc', 3, 'nofoto.png'),
('24010316140077', 'Nadilla Fauzia P', '1998-07-23', 7, 'Perum Taman Kota Blok E no 2 Bekasi Timur, Bekasi Jaya, Kota Bekasi', '082210057500', 'fauzianadd@gmail.com', '24010316140077', 'c813565cfc53b2de8e1aa7f19dccf2ba', 3, 'nofoto.png'),
('24010316140107', 'Mayang A. Afiyarista', '1998-04-03', 4, ' Jl. Pertamina B no 40 RT 3 RW 6 Jatiraden, Jatisampurna, Bekasi 17434', '08569912118', 'mayyarista@yahoo.co.id', '24010316140107', 'c65d7d94893095f13e40cd62464cef40', 3, 'nofoto.png'),
('24060117120013', 'Lailatis Syarifah', '1999-07-15', 7, 'Ds. Kebalanpelang - Babat - Lamongan', '085730812420', 'lailatissyarifah25@gmail.com', '24060117120013', 'ed2ab2c2952b781fef13e05bf3309a88', 2, 'nofoto.png'),
('24060117130061', 'Chorfia Nije Meliantha', '1999-10-30', 10, 'Jl. Pengayoman Selatan 7 Blok D5 No.41, Buaran Indah, Tangerang', '085946916469', 'chorfiamelianta@gmail.com', '24060117130061', '03412b9de4be6d19180605f6b2a7c010', 2, 'nofoto.png'),
('24060117130062', 'Iffa Zainan Nisa', '1999-10-24', 10, 'Ngroto RT 01 RW 01, Mayong Jepara', '085705623696', 'iffazainannisa@student.undip.ac.id', '24060117130062', '0aac637f43b5ee6a0c57c3a31f566266', 1, 'nofoto.png'),
('24060117130069', 'M. Haikal Rahmadi', '1998-12-09', 12, 'Kepulauan Riau', '081372814632', 'haikalgapolo@gmail.com', '24060117130069', 'a847b53f9999fc735ca2b6f1419c93d0', 2, '256880_-_Haikal_gagapolo.jpg'),
('24060117130077', 'Anggita Muntaz Fathaya', '1998-07-27', 7, 'Banyumanik', '08123456788', 'anggi@gmail.com', '24060117130077', '6629804110ea009e1f438075205c402c', 2, 'nofoto.png'),
('24060117130082', 'M. Anas Alqoyyum', '1999-04-11', 4, 'Jalan Soekarno Hatta KM. 05 Ds. Tahunan Kec. Tahun', '08975073379', 'doublezero13@gmail.com', '24060117130082', '9ec743ccfd10150cc4784caaa50074a4', 2, 'IMG_20190515_003359.jpg'),
('24060117140059', 'Almaas Retiani Amita', '1999-05-13', 5, 'Temanggung', '082213225579', 'retianiamitaa@gmail.com', '24060117140059', '1917f0d8d7ed69df92bb3f14f3cd457d', 2, '1CB87F06-3BAF-494A-9971-E159B55C7B1D_-_ekokeu_2018.jpeg'),
('24060117140077', 'Rayhan Akrom Naufal', '1998-04-03', 4, 'Jl. Prahara No. 65B Jakarta Utara', '081299153845', 'Rayhanakrom@gmail.com', '24060117140077', '7b1ef94a22015fac675a4fdb303cd669', 2, 'nofoto.png'),
('24060118120023', 'Sheila Virginia Aulia', '2000-06-24', 6, 'Jl. Tumpang X/12, Gajahmungkur, Semarang.', '081343479499', 'svirgeenia@student.undip.ac.id', '24060118120023', '068c71beb6024be3f10ca2d9aa0e8e7f', 2, 'nofoto.png'),
('24060118130076', 'Yaniar Dwi Fitriani', '2000-01-28', 1, 'Jalan Bukit Seruni IV no 121 Sendangmulyo Semarang', '083843584049', 'yaniard70@gmail.com', '24060118130076', 'fbb7b079093c001de923aae2d35b9dfc', 2, 'nofoto.png'),
('24060118130118', 'Fauzia Nur Fitria', '2000-05-10', 5, 'dinar mas utara iv no 16', '081391675917', 'fznurfiteia@gmail.com', '24060118130118', '4da486fc9c3dc378340753cf5040da84', 2, 'nofoto.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_proker`
--

CREATE TABLE `data_proker` (
  `id_proker` int(11) NOT NULL,
  `nama_proker` varchar(50) NOT NULL,
  `dokumentasi` varchar(500) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `divisi` int(2) NOT NULL,
  `tahun` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_proker`
--

INSERT INTO `data_proker` (`id_proker`, `nama_proker`, `dokumentasi`, `deskripsi`, `divisi`, `tahun`) VALUES
(0, '-', '', '', 0, 0),
(1, 'Tim Jurnalis', '', 'Reportase, artikel,  dan Live Report', 3, 2018),
(2, 'Buku Link', '', 'Mempermudah pencarian kontak dan email terhadap seseorang dan instansi', 3, 2018),
(3, 'Informatics Ongoing Story (IoS)', '', 'Memberikan informasi seputar informatika dan teknologi', 3, 2018),
(4, 'Pendelegasian', '', 'Pengiriman delegasi dalam suatu agenda dengan memberikan potongan harga', 3, 2018),
(5, 'Roadshow Internal', '', 'Berkujung ke himpunan mahasiswa di Universitas Diponegoro', 3, 2018),
(6, 'Roadshow Eksternal', '', 'Berkujung ke himpunan mahasiswa di luar Universitas Diponegoro', 3, 2018),
(8, 'Tim Jurnalis', '', 'Meliput dan mendokumentasikan segala bentuk kegiatan HMIF Undip', 3, 2019),
(9, 'DBO', '', 'Memberikan informasi seputar informatika dan teknologi', 3, 2019),
(10, 'Buku Link', '', 'Mempermudah pencarian kontak dan email terhadap seseorang dan instansi', 3, 2019),
(11, 'Pendelegasian', '', 'Pengiriman delegasi dalam suatu agenda dengan memberikan potongan harga', 3, 2019),
(13, 'IAIF', '', 'mantap', 3, 2018),
(17, 'PODCAST', 'ppt.pdf', 'Live dan Wawancara Proker', 3, 2020),
(19, 'Database Organisasi (DBO)', 'INACL_tutorial4.pdf', 'Menghimpun data seluruh anggota bermandat HMIF Undip', 3, 2020);

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(2) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL,
  `Nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`, `Nama_lengkap`) VALUES
(0, 'hmif', 'hmif'),
(1, 'PH', 'Pengurus Harian'),
(2, 'LITBANG', 'Staff Ahli Penelitian dan Pengembangan'),
(3, 'KOMINFO', 'Staff Ahli Komunikasi dan Informasi'),
(4, 'DIKLAT', 'Divisi Pendidikan dan Pelatihan'),
(5, 'PSDM', 'Divisi Pengembangan Sumber Daya Manusia'),
(6, 'SOSIAL', 'Divisi Sosial'),
(7, 'EKOKEU', 'Divisi Ekonomi dan Keuangan'),
(8, 'MIKAT', 'Divisi Minat dan Bakat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(4) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `id_divisi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `id_divisi`) VALUES
('101', 'Ketua', 1),
('102', 'Wakil Ketua', 1),
('103', 'Sekretaris 1', 1),
('104', 'Sekretaris 2', 1),
('105', 'Bendahara 1', 1),
('106', 'Bendahara 2', 1),
('201', 'Kastaf Litbang', 2),
('202', 'Sekretaris Litbang', 2),
('203', 'Bendahara Litbang', 2),
('204', 'Anggota Litbang', 2),
('301', 'Kastaf Kominfo', 3),
('302', 'Sekretaris Kominfo', 3),
('303', 'Bendahara Kominfo', 3),
('304', 'Anggota Kominfo', 3),
('401', 'Kadiv Diklat', 4),
('402', 'Sekretaris Diklat', 4),
('403', 'Bendahara Diklat', 4),
('404', 'Anggota Diklat', 4),
('501', 'Kadiv PSDM', 5),
('502', 'Sekretaris PSDM', 5),
('503', 'Bendahara PSDM', 5),
('504', 'Anggota PSDM', 5),
('602', 'Sekretaris Sosial', 6),
('603', 'Bendahara Sosial', 6),
('604', 'Anggota Sosial', 6),
('701', 'Kadiv Ekokeu', 7),
('702', 'Sekretaris Ekokeu', 7),
('703', 'Bendahara Ekokeu', 7),
('704', 'Anggota Ekokeu', 7),
('801', 'Kadiv Mikat', 8),
('802', 'Sekretaris Mikat', 8),
('803', 'Bendahara Mikat', 8),
('804', 'Anggota Mikat', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(10) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `divisi` int(2) NOT NULL,
  `jabatan` varchar(4) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `tahun` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `nim`, `divisi`, `jabatan`, `penanggung_jawab`, `tahun`) VALUES
(1, '24010316120005', 3, '301', 'Buku Link; Roadshow Internal; ', 2018),
(2, '24010316130063', 1, '101', '', 2018),
(3, '24010316120006', 3, '304', '', 2018),
(4, '24010316140077', 1, '103', '', 2018),
(5, '24010316140107', 3, '304', '', 2018),
(6, '24060117120013', 1, '104', '', 2018),
(7, '24060117130061', 3, '304', 'Tim Jurnalis', 2018),
(8, '24060117130062', 3, '303', 'Buku Link; Roadshow Eksternal', 2018),
(9, '24060117130082', 3, '302', '', 2018),
(10, '24060117140077', 8, '804', '', 2018),
(11, '24060118120023', 3, '303', '', 2019),
(15, '24060117130061', 3, '304', 'Tim Jurnalis', 2019),
(18, '24060117140077', 1, '101', '', 2019),
(19, '24060117120013', 1, '103', '', 2019),
(22, '24060118130076', 1, '104', '', 2019),
(26, '24060117130082', 3, '301', '', 2019),
(35, '24060117130062', 3, '304', 'Buku Link; Roadshow Eksternal', 2019),
(36, '24060118120023', 3, '304', 'ios', 2020),
(37, '24060117130077', 2, '203', 'evaluasi', 2018),
(38, '24060117130077', 2, '204', 'evaluasi', 2019),
(39, '24060117130069', 3, '304', 'Informatics Ongoing Story (IoS)', 2018),
(40, '24060117140059', 7, '704', 'Matriks, Infomart', 2018),
(41, '24060117140059', 7, '701', '', 2019);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `data_proker`
--
ALTER TABLE `data_proker`
  ADD PRIMARY KEY (`id_proker`),
  ADD KEY `divisi` (`divisi`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD KEY `nim` (`nim`),
  ADD KEY `divisi` (`divisi`),
  ADD KEY `jabatan` (`jabatan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_proker`
--
ALTER TABLE `data_proker`
  MODIFY `id_proker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_proker`
--
ALTER TABLE `data_proker`
  ADD CONSTRAINT `data_proker_ibfk_1` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`id_divisi`);

--
-- Ketidakleluasaan untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`);

--
-- Ketidakleluasaan untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_ibfk_1` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`id_divisi`),
  ADD CONSTRAINT `pengurus_ibfk_2` FOREIGN KEY (`jabatan`) REFERENCES `jabatan` (`id_jabatan`),
  ADD CONSTRAINT `pengurus_ibfk_3` FOREIGN KEY (`nim`) REFERENCES `anggota` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
