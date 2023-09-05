-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 06:14 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `no_hp` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `no_hp`, `username`, `password`, `foto`) VALUES
(1, 'admin', '082151355959', 'admin', 'admin', 'footer-bg.png');

-- --------------------------------------------------------

--
-- Table structure for table `adminbidang`
--

CREATE TABLE `adminbidang` (
  `id_adminbidang` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `id_bidang` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `tlp` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminbidang`
--

INSERT INTO `adminbidang` (`id_adminbidang`, `nama`, `username`, `password`, `id_bidang`, `foto`, `tlp`) VALUES
(2, 'mus', 'mus', 'mus', '1', 'bg2.jpg', '1233'),
(3, 'uci', 'admin', 'fsdfsd', '1', 'sikat.gif', '2323'),
(4, 'kpu', 'kpu', 'kpu', '1', 'c3.jpg', '24235455');

-- --------------------------------------------------------

--
-- Table structure for table `alurpengaduan`
--

CREATE TABLE `alurpengaduan` (
  `id_alur` int(11) NOT NULL,
  `file` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alurpengaduan`
--

INSERT INTO `alurpengaduan` (`id_alur`, `file`) VALUES
(1, 'feature.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'KPU'),
(2, 'LMS');

-- --------------------------------------------------------

--
-- Table structure for table `kabid`
--

CREATE TABLE `kabid` (
  `id_kabid` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jabatan` varchar(225) NOT NULL,
  `nip` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `id_bidang` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `no_hp` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabid`
--

INSERT INTO `kabid` (`id_kabid`, `nama`, `jabatan`, `nip`, `username`, `id_bidang`, `password`, `foto`, `no_hp`) VALUES
(2, 'mus', 'KABI', 'mus', 'mus', '1', 'mus', 'flight1.jpg', '081352959448'),
(3, 'kkpu', 'kkpu', '123a', 'kkpu', '1', 'kkpu', 'ab2.jpg', '081352959448');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `maps` text NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `email` varchar(225) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `judul`, `alamat`, `maps`, `whatsapp`, `email`, `telp`) VALUES
(1, 'Sistem Informasi Pengaduan', 'jl.supatman', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3539.812628729253!2d153.014155!3d-27.4750921!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b915a0835840a2f%3A0xdd5e3f5c208dc0e1!2sMelbourne+St%2C+South+Brisbane+QLD+4101%2C+Australia!5e0!3m2!1sen!2sin!4v1492257477691', '821611', 'suherma4556@gmail.com', '1233');

-- --------------------------------------------------------

--
-- Table structure for table `kritikandansaran`
--

CREATE TABLE `kritikandansaran` (
  `id_kritikan` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `kritikan` text NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kritikandansaran`
--

INSERT INTO `kritikandansaran` (`id_kritikan`, `nama`, `email`, `kritikan`, `tgl`, `jam`, `status`) VALUES
(1, 'musmulyadi', 'musa@gmail.com', 'nsdjfds fjsdfjhsdf', '2023-06-15', '01:20:53', 'Terbaca');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_user` varchar(225) NOT NULL,
  `id_bidang` varchar(225) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `file` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `status` varchar(225) NOT NULL,
  `alasan` text NOT NULL,
  `catatan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_user`, `id_bidang`, `judul`, `file`, `keterangan`, `tgl_pengaduan`, `status`, `alasan`, `catatan`) VALUES
(3, '1', '1', 'jbhaha', 'sikat.gif', 'dda', '2023-06-14', 'di Terima', '', 'bg2.jpg'),
(4, '1', '1', 'abc', 'carousel-2.jpg', 'defdd', '2023-07-18', 'di Terima', '', 'about-2.jpg'),
(5, '1', '1', 'abc', 'module_table_bottom.png', 'njdsfjsdf', '2023-07-20', 'di Terima', '', ''),
(6, '1', '1', 'Sistem Informasi Pengaduan', 'a1.jpg', 'SDSADS', '2023-08-21', 'di Tolak', 'ddsdfsdf', '11.jpg'),
(7, '1', '1', 'Sistem Informasi Pengaduan', '20190704_185707.jpg', 'fdfd', '2023-08-21', 'Sedang di Proses Oleh Admin Bidang', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `judul`, `foto`) VALUES
(1, 'Welcome to sistem informasi Pengaduan', 'fotopu.jpeg'),
(5, 'Welcome to sistem informasi Pengaduan', 'fotojembatanmerah.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tentangkami`
--

CREATE TABLE `tentangkami` (
  `id_tentang` int(11) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentangkami`
--

INSERT INTO `tentangkami` (`id_tentang`, `foto`, `keterangan`) VALUES
(1, 'logoPU.png', '<div style="text-align: justify;"><span style="font-size:14px">Pertama dan utama sekali, mari kita panjatkan puji syukur ke hadirat Allah SWT., Tuhan Yang Maha Kuasa, karena berkat cucuran rahmat dan nikmat-Nya, Dinas Pekerjaan Umum Dan Penataan Ruang Provinsi Kalimantan Barat, sebagai salah satu perangkat daerah di Provinsi Kalimantan Barat, masih bisa dan terus berupaya untuk eksis dalam mendukung terwujudnya visi Provinsi Kalimantan Barat, yakni, &ldquo;Terwujudnya Kesejahteraan Masyarakat Kalimantan Barat Melalui Percepatan Pembangunan Infrastruktur Dan Perbaikan Tata Kelola Pemerintahan.&nbsp;</span></div>\r\n\r\n<div style="text-align: justify;">&nbsp;</div>\r\n\r\n<div style="text-align: justify;"><span style="font-size:14px">DASAR HUKUM PEMBENTUKAN DINAS PUPR</span></div>\r\n\r\n<div style="text-align: justify;"><span style="font-size:14px">Dasar hukum pembentukan Dinas Pekerjaan Umum dan Penataan Ruang Provinsi Kalimantan Barat adalah Peraturan Gubernur Nomor 114 Tahun 2021 tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi, Serta Tata Kerja Dinas Pekerjaan Umum dan Penataan Ruang Provinsi Kalimantan Barat (Berita Daerah Provinsi Kalimantan&nbsp; Barat Tahun&nbsp; 2021 Nomor 114)&nbsp;</span></div>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `nik` varchar(225) NOT NULL,
  `no_hp` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `suratrekom` varchar(225) NOT NULL,
  `ktp` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nik`, `no_hp`, `username`, `password`, `suratrekom`, `ktp`, `foto`) VALUES
(1, 'mus', '13144', '334', 'mus', 'mus', 'bg.jpg', 'footer-bg.png', 'logo.png'),
(2, 'anjang', '321', '082112', 'anjang', 'anjang', 'Identifikasi Anak Karyawan 2022.pdf', 'logoPU.png', 'logoPU.png'),
(3, 'dolah', 'dolah', '082151355959', 'dolah', 'dolah', '45WhatsApp Image 2019-09-03 at 12.06.57.jpeg', '45WhatsApp Image 2019-09-03 at 12.06.57.jpeg', '20190704_185707.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `adminbidang`
--
ALTER TABLE `adminbidang`
  ADD PRIMARY KEY (`id_adminbidang`);

--
-- Indexes for table `alurpengaduan`
--
ALTER TABLE `alurpengaduan`
  ADD PRIMARY KEY (`id_alur`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `kabid`
--
ALTER TABLE `kabid`
  ADD PRIMARY KEY (`id_kabid`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `kritikandansaran`
--
ALTER TABLE `kritikandansaran`
  ADD PRIMARY KEY (`id_kritikan`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `tentangkami`
--
ALTER TABLE `tentangkami`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `adminbidang`
--
ALTER TABLE `adminbidang`
  MODIFY `id_adminbidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `alurpengaduan`
--
ALTER TABLE `alurpengaduan`
  MODIFY `id_alur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kabid`
--
ALTER TABLE `kabid`
  MODIFY `id_kabid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kritikandansaran`
--
ALTER TABLE `kritikandansaran`
  MODIFY `id_kritikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tentangkami`
--
ALTER TABLE `tentangkami`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
