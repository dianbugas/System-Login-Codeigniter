-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Nov 2019 pada 04.56
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beastudi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beastudi`
--

CREATE TABLE `beastudi` (
  `id` int(11) NOT NULL,
  `nama_mh` varchar(45) DEFAULT NULL,
  `jk` varchar(45) DEFAULT NULL,
  `semester` varchar(45) DEFAULT NULL,
  `angkatan` char(4) DEFAULT NULL,
  `programstudi` varchar(45) DEFAULT NULL,
  `kontribusi` varchar(45) DEFAULT NULL,
  `pic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beastudi`
--

INSERT INTO `beastudi` (`id`, `nama_mh`, `jk`, `semester`, `angkatan`, `programstudi`, `kontribusi`, `pic_id`) VALUES
(71, 'Muhammad Ardiansyah', 'Laki-Laki', 'Tiga', '2018', 'Teknik Informatika', 'Content', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana`
--

CREATE TABLE `dana` (
  `id` int(11) NOT NULL,
  `nama_donatur` varchar(45) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `dana` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dana`
--

INSERT INTO `dana` (`id`, `nama_donatur`, `perusahaan`, `alamat`, `dana`) VALUES
(7, 'Aswar S.Kom', 'PLN', 'Jakarta Pusat', ' 23.123.423'),
(8, 'Zulkifli Jufri', 'Pertamina', 'Jakarta Pusat', ' 2.312.332'),
(11, 'Muhammad Ardiansyah', 'PLN', 'Jakarta Pusat', ''),
(12, 'DIAN', 'Pertamina', 'Jakarta Pusat', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Mahasiswa`
--

CREATE TABLE `Mahasiswa` (
  `id` int(11) NOT NULL,
  `Nama` varchar(45) NOT NULL,
  `Gender` varchar(45) NOT NULL,
  `Semester` varchar(45) NOT NULL,
  `Angkatan` varchar(45) NOT NULL,
  `Program_studi` varchar(45) NOT NULL,
  `Peminatan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `Mahasiswa`
--

INSERT INTO `Mahasiswa` (`id`, `Nama`, `Gender`, `Semester`, `Angkatan`, `Program_studi`, `Peminatan`) VALUES
(1, 'dsad', 'sad', 'asdsa', 'asdas', 'asdas', 'sadsa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pic`
--

CREATE TABLE `pic` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `divisi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pic`
--

INSERT INTO `pic` (`id`, `nama`, `divisi`) VALUES
(13, 'Muhammad Teguh', 'waket3'),
(16, 'Kerisna Panji', 'waket3'),
(18, 'Muhammad Ardiansyah', 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(49, 'admin2', 'dianbugas@gmail.com', 'postman.png', '$2y$10$QWomy7..tQcVybft13OhrOEafIjvo4xXjo4.qfAs0K5yKwDlc/9qS', 1, 1, 1562234937),
(50, 'dianynf20@gmail.com', 'dianynf20@gmail.com', 'default.jpg', '$2y$10$nruVeUAhhV.3EHuUp8JdteHfWZjHcnA5ae7lfjq4c.w6qNE5q9wDO', 2, 1, 1570108049),
(55, 'PIC', 'muhammadardiyansyah889@gmail.com', 'default.jpg', '$2y$10$jY4pcgIX6YVC9qlIN4OY4eTNnvpwJLO80030zEvjLM9m.vDsvUzSa', 3, 1, 1570977183),
(56, 'Muhammad Ardiansyah', 'ardiansyahbugas@gmail.com', 'default.jpg', '$2y$10$qCPwYStF0994cLLzZMJeSezLFyFtiXoZhBNpvsHoLqW8wTiLN4tHi', 1, 1, 1574241946);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(12, 2, 12),
(16, 1, 13),
(17, 1, 3),
(22, 1, 5),
(23, 1, 6),
(29, 1, 7),
(30, 1, 4),
(31, 2, 4),
(32, 1, 8),
(33, 2, 2),
(35, 2, 8),
(38, 3, 2),
(39, 3, 6),
(40, 3, 7),
(41, 3, 8),
(43, 1, 2),
(45, 1, 9),
(46, 1, 15),
(47, 1, 16),
(48, 1, 17),
(49, 1, 18),
(50, 1, 19),
(51, 1, 20),
(52, 3, 15),
(53, 3, 16),
(54, 3, 19),
(55, 3, 17),
(56, 3, 20),
(57, 2, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'menu'),
(15, 'beastudi'),
(16, 'dana'),
(17, 'report'),
(19, 'pic'),
(20, 'dashboard');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Pic');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(12, 1, 'Users', 'admin/users', 'fas fa-fw fa-users', 1),
(27, 15, 'Beastudi', 'beastudi', 'fas fa-fw fa-users', 1),
(28, 17, 'Report', 'report', 'fas fa-fw fa-clipboard-list', 1),
(29, 16, 'Dana Beasiswa', 'dana', 'fas fa-fw fa fa-dollar-sign', 1),
(31, 19, 'Pic', 'pic ', 'fas fa-fw fa-comments', 1),
(32, 20, 'Informasi', 'dashboard', 'fas fa-fw fa-tachometer-alt', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'aku@aku.aku', 's+q8JCFHahCbG+yuZkMYDAvP74cWddlH5GLAgtpI8f0=', 1562320292),
(2, 'dianbugas@gmail.das', 'NATPjcrQs1rbcOSl6iUQaAgCE1nu29dvv9Vore3NFMI=', 1562321218),
(3, 'dianynf20@gmail.com', 'pD6yddAH1wItZ0nmkxyijCnrQwA5c+PR2qOpxGywPII=', 1570108049),
(4, 'pic@gmail.com', 'hUYsUUhq/23Ja5Q4Pd+ZroI1SLCkbGlx5ms7H0vOCx8=', 1570976320),
(5, 'muhammadardiyansyah889@gmail.com', 'CeqUriDiQSn0qs+G8C8XS+TnAkLVGDFTIoNHdcrg9kQ=', 1570976373),
(6, 'muhammadardiyansyah889@gmail.com', 'Kj3jaxKcO6p4XMLdUwjXUqmN4NjKEqXkF+sn/fTvuoE=', 1570977122),
(7, 'muhammadardiyansyah889@gmail.com', '+UXOf+S0YnMwzx66i3zvzBBXaa11WEtYTpnOrmEysjw=', 1570977148),
(8, 'muhammadardiyansyah889@gmail.com', '405CdtrGgYAYvjVfoXM85l0/Sqmc6FfY216p8TXXcyc=', 1570977183);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beastudi`
--
ALTER TABLE `beastudi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dana`
--
ALTER TABLE `dana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `Mahasiswa`
--
ALTER TABLE `Mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pic`
--
ALTER TABLE `pic`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beastudi`
--
ALTER TABLE `beastudi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `dana`
--
ALTER TABLE `dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `Mahasiswa`
--
ALTER TABLE `Mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pic`
--
ALTER TABLE `pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
