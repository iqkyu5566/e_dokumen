-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Agu 2022 pada 01.59
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_doc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_skhakim`
--

CREATE TABLE `id_skhakim` (
  `id_skhakim` int(11) NOT NULL,
  `nomor_surat` varchar(40) NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` text NOT NULL,
  `jenis_sk` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_skhakim`
--

INSERT INTO `id_skhakim` (`id_skhakim`, `nomor_surat`, `tgl_surat`, `perihal`, `jenis_sk`, `keterangan`) VALUES
(1, 'w23/u2.23./sdfsd/sdf/2134', '2022-07-27', 'tes', '', 'PHI'),
(2, 'w23/u2.23./sdfsd/sdf/21345', '2022-07-27', 'tes', '', 'Perikanan'),
(3, 'w23/u2.23./sdfsd/sdf/2', '2022-07-27', 'tes', '', 'Perikanan'),
(4, 'w23/u2.23./sdfsd/sdf/2132', '2022-07-27', 'tes', 'PHI', 'pindah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_zikualitaspelayanan`
--

CREATE TABLE `id_zikualitaspelayanan` (
  `id_kualitaspelayanan` int(11) NOT NULL,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_zikualitaspelayanan`
--

INSERT INTO `id_zikualitaspelayanan` (`id_kualitaspelayanan`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
(1, 'B2A', 'A. Nilai Persepsi Kualitas Pelayanan (Survei Eksternal)', '2022-07-26', 1, 'ZIHASIL2A.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akreditasi`
--

CREATE TABLE `tbl_akreditasi` (
  `id_akreditasi` int(11) NOT NULL,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_akreditasi`
--

INSERT INTO `tbl_akreditasi` (`id_akreditasi`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
(1, 'IA', 'Akreditasi1', '2022-07-26', 1, 'akreditasi1.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_baperjakat`
--

CREATE TABLE `tbl_baperjakat` (
  `id_baperjakat` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nomor_surat` varchar(40) NOT NULL,
  `tgl_surat` date NOT NULL,
  `satker` text NOT NULL,
  `jab_lama` text NOT NULL,
  `jab_baru` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `id_cuti` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nomor_surat` varchar(40) NOT NULL,
  `tgl_surat` date NOT NULL,
  `jenis_cuti` text NOT NULL,
  `lama_cuti` text NOT NULL,
  `tgl_cuti` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_cuti`
--

INSERT INTO `tbl_cuti` (`id_cuti`, `nama`, `nomor_surat`, `tgl_surat`, `jenis_cuti`, `lama_cuti`, `tgl_cuti`, `keterangan`) VALUES
(1, 'wa ode tika', 'w23/u2.23./sdfsd/sdf/213', '2022-07-27', 'Izin', '3 Hari', '2022-07-30', 'Izin'),
(2, 'wa ode nanda', 'w23/u2.23./sdfsd/sdf/21346', '2022-07-27', 'tahunan', '5 hari', '2022-07-27', 'tahunan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(15, 1, 1),
(19, 1, 3),
(21, 2, 1),
(24, 1, 9),
(28, 2, 3),
(29, 2, 2),
(30, 1, 2),
(31, 2, 10),
(32, 2, 25),
(33, 2, 28),
(34, 2, 29),
(36, 4, 25),
(37, 4, 11),
(38, 4, 12),
(39, 4, 28),
(40, 4, 29),
(41, 4, 10),
(42, 2, 11),
(43, 2, 12),
(44, 1, 10),
(45, 1, 25),
(46, 1, 28),
(47, 1, 29),
(48, 5, 30),
(49, 2, 31),
(50, 2, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hukdis`
--

CREATE TABLE `tbl_hukdis` (
  `id_hukdis` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nomor_sk` varchar(40) NOT NULL,
  `tgl_sk` date NOT NULL,
  `jenis_huk` text NOT NULL,
  `sanksi` text NOT NULL,
  `tmt_mulai` text NOT NULL,
  `tmt_akhir` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori_pemenuhan`
--

CREATE TABLE `tbl_kategori_pemenuhan` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori_pemenuhan`
--

INSERT INTO `tbl_kategori_pemenuhan` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pemenuhan 1'),
(2, 'Pemenuhan 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori_reform`
--

CREATE TABLE `tbl_kategori_reform` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori_reform`
--

INSERT INTO `tbl_kategori_reform` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Reform 1'),
(2, 'Reform 2'),
(3, 'Reform 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kepskhakim`
--

CREATE TABLE `tbl_kepskhakim` (
  `id_skketua` int(11) NOT NULL,
  `nomor_sk` varchar(40) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `perihal` text NOT NULL,
  `keterangan` text NOT NULL,
  `nama_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kepskhakim`
--

INSERT INTO `tbl_kepskhakim` (`id_skketua`, `nomor_sk`, `tanggal_sk`, `perihal`, `keterangan`, `nama_file`) VALUES
(1, 'w23.213/231/fsg/2022', '2022-07-26', 'tes', 'tes', ''),
(2, 'rtes', '2022-08-25', '123121232', '123123', 'kantor.jpg'),
(3, '123', '2022-08-25', '12312', '1231232', 'Permintaan Perpanjangan penahanan an. ANDRI Alias LA DABI_0001.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kepsurattugas`
--

CREATE TABLE `tbl_kepsurattugas` (
  `id_surattugas` int(11) NOT NULL,
  `nomor_st` varchar(40) NOT NULL,
  `tanggal_st` date NOT NULL,
  `perihal` text NOT NULL,
  `nama` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kepsurattugas`
--

INSERT INTO `tbl_kepsurattugas` (`id_surattugas`, `nomor_st`, `tanggal_st`, `perihal`, `nama`, `keterangan`) VALUES
(1, 'w23.1234/213432/2022', '2022-07-26', 'tes', 'tes', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lapkegiatan`
--

CREATE TABLE `tbl_lapkegiatan` (
  `id_lapkegiatan` int(11) NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `tgl_pelaksanaan` date NOT NULL,
  `keterangan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 'y'),
(2, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 0, 'y'),
(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 'y'),
(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 'y'),
(10, 'ZONA INTEGRITAS <br>(PROSES)', 'Pemenuhan', 'fa fa-id-card', 0, 'y'),
(11, 'AREA PEMENUHAN', 'Pemenuhan', 'fa fa-id-card', 10, 'y'),
(14, 'AREA REFORM', 'Reformdua', 'fa fa-id-card', 10, 'y'),
(25, 'ZONA INTEGRITAS <br>(HASIL)', '#', 'fa fa-id-card', 0, 'y'),
(26, 'BIROKRASI YANG BERSIH <BR>DAN AKUNTABEL', 'Zibirokrasi', 'fa fa-id-card', 25, 'y'),
(27, 'KUALITAS PELAYANAN <br>PUBLIK', 'Zikualitaspelayanan', 'fa fa-id-card', 25, 'y'),
(28, 'AKREDITASI', 'Akreditasi', 'fa fa-id-card', 0, 'y'),
(29, 'PEMBINAAN dan <br>PENGAWASAN', 'Pengawasan', 'fa fa-id-card', 0, 'y'),
(30, 'KEPEGAWAIAN', '#', 'fa fa-id-card', 0, 'y'),
(31, 'SK KETUA', 'Kepskhakim', 'fa fa-id-card', 30, 'y'),
(32, 'Surat Tugas', 'Kepsurattugaskep', 'fa fa-id-card', 30, 'y'),
(33, 'Cuti/Izin', 'Cuti', 'fa fa-id-card', 30, 'y'),
(34, 'SK Hakim khusus', 'Skhakim', 'fa fa-id-card', 30, 'y'),
(35, 'laporan kegiatan', 'Lapkegiatan', 'fa fa-id-card', 30, 'y'),
(36, 'baperjakat', 'Baperjakat', 'fa fa-id-card', 30, 'y'),
(37, 'hukuman disiplin', 'Hukdis', 'fa fa-id-card', 30, 'y'),
(38, 'Perencanaan <br>Kesekretariatan', 'Naikpangkat', 'fa fa-id-card', 30, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_naikpangkat`
--

CREATE TABLE `tbl_naikpangkat` (
  `id_naikpangkat` int(11) NOT NULL,
  `periode` text NOT NULL,
  `tahun` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemenuhan`
--

CREATE TABLE `tbl_pemenuhan` (
  `id_pemenuhan` int(11) NOT NULL,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pemenuhan`
--

INSERT INTO `tbl_pemenuhan` (`id_pemenuhan`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
(1, 'I1a', 'Unit kerja telah membentuk tim untuk melakukan pembangunan Zona Integritas', '2022-07-17', 1, 'zi1.pdf'),
(2, 'I1b', 'Penentuan anggota Tim dipilih melalui prosedur/mekanisme yang jelas', '2022-07-17', 1, 'zi2t.pdf'),
(4, 'IAk', 'Tes 1', '2022-08-20', 2, 'hhsjjs.jpg'),
(5, 'sfs', 'trr', '2022-08-20', 3, 'sfds.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengawasan`
--

CREATE TABLE `tbl_pengawasan` (
  `id_pengawasan` int(11) NOT NULL,
  `no_dokumen` varchar(50) NOT NULL,
  `satker` text NOT NULL,
  `tim` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `nama_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengawasan`
--

INSERT INTO `tbl_pengawasan` (`id_pengawasan`, `no_dokumen`, `satker`, `tim`, `tgl_upload`, `nama_file`) VALUES
(1, 'IA', 'Pengadilan Negeri Kendari', 'A<br>\r\nB<br>\r\nC', '2022-07-26', 'Pengawasan1.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reformdua`
--

CREATE TABLE `tbl_reformdua` (
  `id_reformdua` int(11) NOT NULL,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_reformdua`
--

INSERT INTO `tbl_reformdua` (`id_reformdua`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
(1, '2I', 'Telah disusun peta proses bisnis dengan adanya penyederhanaan jabatan', '2022-07-19', 2, 'reformdua.pdf'),
(2, '2IA', 'Peta Proses Bisnis Mempengaruhi Penyederhanaan Jabatan	 	 	 	 	\r\n\r\n-Telah disusun peta proses bisnis dengan adanya penyederhanaan jabatan', '2022-07-25', 2, 'reform1.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `area` enum('Area 1','Area 2','Area 3','Area 4','Area 5','Area 6') NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `area`, `images`, `id_user_level`, `is_aktif`) VALUES
(7, 'hendra', 'hendra@gmail.com', '$2y$04$lxELAsNrn5OJnZhORCfjbeAxqiCEomMB1jf8Q8K90WiWwt83Ag9Qa', 'Area 1', 'bumi-bulat.png', 2, 'y'),
(8, 'Nanda', 'nanda@gmail.com', '$2y$04$gsGbZ1pfAqh9iG.7poxSvevQQ3Tk6.3N6vr3zvvJuONuNRSpp0Kia', 'Area 1', '', 4, 'y'),
(9, 'sulaiman', 'sulai@gmail.com', '$2y$04$S9juzwOdhuO9EwmmF1ej3enz35F.9NI0hoOPkqjvl4LZnak8ffWx6', 'Area 1', '', 5, 'y'),
(11, 'rista', 'rista@gmail.com', '$2y$04$j3zfn3uCj0eo0LgmxIIqS.WU2BbvqT8YI43fegWsYv1JyrYdBr9ce', 'Area 1', 'logo_hakim.png', 4, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Pimpinan'),
(4, 'Pegawai'),
(5, 'Kepegawaian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_zibirokrasi`
--

CREATE TABLE `tbl_zibirokrasi` (
  `id_zibirokrasi` int(11) NOT NULL,
  `no_dokumen` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_zibirokrasi`
--

INSERT INTO `tbl_zibirokrasi` (`id_zibirokrasi`, `no_dokumen`, `judul`, `tgl_upload`, `id_kategori`, `nama_file`) VALUES
(1, 'B1A', 'a.Nilai Survey Persepsi Korupsi (Survei Eksternal)', '2022-07-26', 1, 'ZIHasilA.pdf'),
(2, 'B1B', 'b.Capaian Kinerja Lebih Baik dari pada Capaian Kinerja Sebelumnya', '2022-07-26', 1, 'ZIhasilB.pdf');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `id_skhakim`
--
ALTER TABLE `id_skhakim`
  ADD PRIMARY KEY (`id_skhakim`);

--
-- Indeks untuk tabel `id_zikualitaspelayanan`
--
ALTER TABLE `id_zikualitaspelayanan`
  ADD PRIMARY KEY (`id_kualitaspelayanan`);

--
-- Indeks untuk tabel `tbl_akreditasi`
--
ALTER TABLE `tbl_akreditasi`
  ADD PRIMARY KEY (`id_akreditasi`);

--
-- Indeks untuk tabel `tbl_baperjakat`
--
ALTER TABLE `tbl_baperjakat`
  ADD PRIMARY KEY (`id_baperjakat`);

--
-- Indeks untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indeks untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_hukdis`
--
ALTER TABLE `tbl_hukdis`
  ADD PRIMARY KEY (`id_hukdis`);

--
-- Indeks untuk tabel `tbl_kategori_pemenuhan`
--
ALTER TABLE `tbl_kategori_pemenuhan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_kategori_reform`
--
ALTER TABLE `tbl_kategori_reform`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_kepskhakim`
--
ALTER TABLE `tbl_kepskhakim`
  ADD PRIMARY KEY (`id_skketua`);

--
-- Indeks untuk tabel `tbl_kepsurattugas`
--
ALTER TABLE `tbl_kepsurattugas`
  ADD PRIMARY KEY (`id_surattugas`);

--
-- Indeks untuk tabel `tbl_lapkegiatan`
--
ALTER TABLE `tbl_lapkegiatan`
  ADD PRIMARY KEY (`id_lapkegiatan`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_naikpangkat`
--
ALTER TABLE `tbl_naikpangkat`
  ADD PRIMARY KEY (`id_naikpangkat`);

--
-- Indeks untuk tabel `tbl_pemenuhan`
--
ALTER TABLE `tbl_pemenuhan`
  ADD PRIMARY KEY (`id_pemenuhan`);

--
-- Indeks untuk tabel `tbl_pengawasan`
--
ALTER TABLE `tbl_pengawasan`
  ADD PRIMARY KEY (`id_pengawasan`);

--
-- Indeks untuk tabel `tbl_reformdua`
--
ALTER TABLE `tbl_reformdua`
  ADD PRIMARY KEY (`id_reformdua`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- Indeks untuk tabel `tbl_zibirokrasi`
--
ALTER TABLE `tbl_zibirokrasi`
  ADD PRIMARY KEY (`id_zibirokrasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `id_skhakim`
--
ALTER TABLE `id_skhakim`
  MODIFY `id_skhakim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `id_zikualitaspelayanan`
--
ALTER TABLE `id_zikualitaspelayanan`
  MODIFY `id_kualitaspelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_akreditasi`
--
ALTER TABLE `tbl_akreditasi`
  MODIFY `id_akreditasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_baperjakat`
--
ALTER TABLE `tbl_baperjakat`
  MODIFY `id_baperjakat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tbl_hukdis`
--
ALTER TABLE `tbl_hukdis`
  MODIFY `id_hukdis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori_pemenuhan`
--
ALTER TABLE `tbl_kategori_pemenuhan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori_reform`
--
ALTER TABLE `tbl_kategori_reform`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_kepskhakim`
--
ALTER TABLE `tbl_kepskhakim`
  MODIFY `id_skketua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_kepsurattugas`
--
ALTER TABLE `tbl_kepsurattugas`
  MODIFY `id_surattugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_lapkegiatan`
--
ALTER TABLE `tbl_lapkegiatan`
  MODIFY `id_lapkegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tbl_naikpangkat`
--
ALTER TABLE `tbl_naikpangkat`
  MODIFY `id_naikpangkat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pemenuhan`
--
ALTER TABLE `tbl_pemenuhan`
  MODIFY `id_pemenuhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengawasan`
--
ALTER TABLE `tbl_pengawasan`
  MODIFY `id_pengawasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_reformdua`
--
ALTER TABLE `tbl_reformdua`
  MODIFY `id_reformdua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_zibirokrasi`
--
ALTER TABLE `tbl_zibirokrasi`
  MODIFY `id_zibirokrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
