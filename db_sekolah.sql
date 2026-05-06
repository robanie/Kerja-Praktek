-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2026 at 03:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi`, `gambar`, `tanggal`) VALUES
(16, 'Kegiatan Peringatan Hari Pendidikan Nasional Berlangsung Meriah', 'Kegiatan Hari Pendidikan Nasional di sekolah berlangsung dengan meriah. Seluruh siswa dan guru mengikuti upacara dengan penuh khidmat. Setelah upacara, dilaksanakan berbagai lomba seperti cerdas cermat dan lomba pidato yang bertujuan meningkatkan semangat belajar siswa.', 'ee7c7cb7945e282a15cf46d74279657c.jpeg', '2026-05-06'),
(17, 'Sekolah Gelar Program Literasi untuk Tingkatkan Minat Baca Siswa', 'Sekolah melaksanakan program literasi yang rutin dilakukan setiap pagi sebelum pembelajaran dimulai. Program ini bertujuan untuk meningkatkan minat baca siswa serta membiasakan budaya membaca di lingkungan sekolah.', 'Program-Membaca-Berimbang-5-Membaca-Interaktif-Sudut-Baca.jpg', '2026-05-06'),
(18, 'Siswa Raih Juara Lomba Olimpiade Sains Tingkat Kabupaten', 'Salah satu siswa berhasil meraih juara dalam Olimpiade Sains tingkat kabupaten. Prestasi ini menjadi kebanggaan bagi sekolah dan diharapkan dapat memotivasi siswa lain untuk terus berprestasi di bidang akademik.', 'IMG-20230902-WA0009.jpg', '2026-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file_berkas` varchar(255) NOT NULL,
  `tanggal_upload` date DEFAULT curdate(),
  `kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `judul`, `deskripsi`, `file_berkas`, `tanggal_upload`, `kategori`) VALUES
(4, 'RPP Pemrograman Dasar Kelas X', 'Dokumen Rencana Pelaksanaan Pembelajaran untuk materi Pemrograman Dasar kelas X yang mencakup tujuan pembelajaran, langkah kegiatan belajar, serta penilaian hasil belajar siswa.', 'Template Laporan Akhir KP.docx', '2026-05-06', 'RPP'),
(5, 'Modul Belajar Jaringan Komputer', 'Modul ini membahas konsep dasar jaringan komputer, jenis jaringan, perangkat jaringan, serta contoh implementasi dalam kehidupan sehari-hari.', 'Template Laporan Akhir KP.docx', '2026-05-06', 'Modul Pembelajaran'),
(6, 'Surat Keterangan Kelakuan Baik', 'Surat ini menyatakan bahwa siswa memiliki perilaku baik selama menempuh pendidikan di sekolah. Biasanya digunakan untuk keperluan melanjutkan sekolah atau melamar pekerjaan.', 'Template Laporan Akhir KP.docx', '2026-05-06', 'SKKB');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `judul`, `gambar`) VALUES
(22, '', 'IMG-20230902-WA0009.jpg'),
(23, '', 'Program-Membaca-Berimbang-5-Membaca-Interaktif-Sudut-Baca.jpg'),
(24, '', 'ee7c7cb7945e282a15cf46d74279657c.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file_materi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `judul`, `mapel`, `deskripsi`, `file_materi`) VALUES
(3, 'Pengenalan Dasar Pemrograman', 'Materi ini membahas konsep dasar pemrograman seperti algoritma, flowchart, variabel, dan struktur ko', 'Template Laporan Akhir KP.docx', '2026-05-06'),
(4, 'Jaringan Komputer Dasar', 'Materi ini menjelaskan tentang konsep jaringan komputer, jenis-jenis jaringan (LAN, MAN, WAN), serta', 'Template Laporan Akhir KP.docx', '2026-05-06'),
(5, 'Basis Data (Database)', 'Materi ini membahas pengenalan database, tabel, relasi antar tabel, serta penggunaan SQL dasar seper', 'Template Laporan Akhir KP.docx', '2026-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `nama_prestasi` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `tingkat` varchar(50) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `nama_prestasi`, `deskripsi`, `tahun`, `tingkat`, `gambar`) VALUES
(10, 'Juara 1 Lomba Olimpiade Sains', 'Salah satu siswa sekolah berhasil meraih Juara 1 dalam Olimpiade Sains tingkat kabupaten. Prestasi ini diraih setelah melalui seleksi ketat dan persaingan dengan peserta dari berbagai sekolah. Keberhasilan ini menjadi kebanggaan bagi sekolah serta motivasi bagi siswa lain untuk terus berprestasi.', '2026', 'Kabupaten', 'IMG-20230902-WA0009.jpg'),
(11, 'Siswi Sekolah Juara Lomba Pidato Bahasa Indonesia', 'Seorang siswi berhasil meraih juara dalam lomba pidato Bahasa Indonesia tingkat daerah. Dengan kemampuan berbicara yang baik dan penguasaan materi yang kuat, ia berhasil memukau dewan juri dan mengharumkan nama sekolah.', '2026', 'Kecamatan', 'Program-Membaca-Berimbang-5-Membaca-Interaktif-Sudut-Baca.jpg'),
(12, 'Tim Futsal Sekolah Juara Turnamen', 'Tim futsal sekolah berhasil meraih juara dalam turnamen antar pelajar tingkat kecamatan. Dengan kerja sama tim yang solid dan latihan rutin, mereka mampu mengalahkan lawan-lawannya hingga babak final dan membawa pulang piala kemenangan.', '2025', 'Sekolah', 'ee7c7cb7945e282a15cf46d74279657c.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('admin') DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
(5, 'admin', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
