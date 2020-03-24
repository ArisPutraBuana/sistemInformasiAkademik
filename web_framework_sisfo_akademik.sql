-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Mar 2020 pada 18.07
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_framework_sisfo_akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `nama_dosen` varchar(40) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `photo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn`, `nama_dosen`, `alamat`, `jenis_kelamin`, `email`, `telp`, `photo`) VALUES
(3, '203555', 'Suryani', 'Tangerang', 'Perempuan', 'suryani@gmail.com', '081380755676', 'laptop4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi`
--

CREATE TABLE `hubungi` (
  `id_hubungi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `pesan`) VALUES
(3, 'Meyka Setyawati', 'meyku@gmail.com', 'Mohon informasi pendaftaran Mahasiswa baru pada tahun 2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `judul_website` varchar(30) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `judul_website`, `alamat`, `email`, `telp`) VALUES
(1, 'STMIK Insan Pembangunan', 'Jl.Raya Serang Km 10 Pos Bitung ,Kadu Jaya, Curug, Kadu Jaya', 'info@ipem.ac.id', '021-5949 2836');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `icon` varchar(35) NOT NULL,
  `judul_informasi` varchar(45) NOT NULL,
  `isi_informasi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `icon`, `judul_informasi`, `isi_informasi`) VALUES
(1, 'fas fa-university', 'Penerimaan Mahasiswa Baru', 'Penerimaan Mahasiswa baru gelombang Pertama di buka mulai tanggal 31 Juni s/d 30 Agustus'),
(2, 'fas fa-wallet', 'Pembayaran Uang Kuliah', 'Pembayaran Uang Kuliah mulai tanggal 01 Maret 2020 s/d 13 Mei 2020'),
(3, 'fas fa-user-graduate', 'Jadwal Wisuda', 'Jadwal Pelaksanaan Wisuda  di laksanakan tanggal 31 Oktober 2020 di Hotel Amaris, Kota Tangerang'),
(4, 'fas fa-file-invoice', 'Bimbingan Skripsi', 'Jadwal Bimbingan Skripsi/Tugas Akhir mulai di laksanakan pada tanggal 20 Juni 2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `kode_jurusan` varchar(3) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `kode_jurusan`, `nama_jurusan`) VALUES
(3, 'EB', 'EKONOMI BISNIS'),
(4, 'KB', 'KOMUNIKASI DAN BAHASA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `id_thn_akademik` int(10) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `kode_matakuliah` varchar(10) NOT NULL,
  `nilai` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id_krs`, `id_thn_akademik`, `nim`, `kode_matakuliah`, `nilai`) VALUES
(1, 1, '2016804090', 'MKK02', ''),
(2, 1, '2016804090', 'MKK02', ''),
(3, 1, '2016804090', 'MKK02', ''),
(4, 1, '2016804090', 'MKK02', ''),
(5, 1, '2016804090', 'MKK02', ''),
(6, 1, '2016804090', 'MKK02', ''),
(7, 8, '2016804091', 'MKK02', ''),
(8, 6, '2016804091', 'MKK03', ''),
(9, 8, '2016804090', 'MKK03', ''),
(18, 6, '2016804090', 'MKK01', ''),
(19, 6, '2016804090', 'MKK02', ''),
(20, 6, '2016804090', 'MKK03', ''),
(21, 6, '2016804090', 'MKK04', ''),
(22, 6, '2016804090', 'MKK01', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nama_lengkap` varchar(60) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telepon` varchar(18) NOT NULL,
  `tempat_lahir` varchar(60) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama_lengkap`, `alamat`, `email`, `telepon`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `nama_prodi`, `photo`) VALUES
(10, '2016804090', 'Aris Sanjaya', 'Jatiuwung', 'arispb99@gmail.com', '082280755676', 'PALI', '2020-02-13', 'Laki-laki', 'TEKNIK INFORMATIKA', 'sepatu1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_matakuliah` varchar(10) NOT NULL,
  `nama_matakuliah` varchar(35) NOT NULL,
  `sks` int(5) NOT NULL,
  `semester` int(10) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`kode_matakuliah`, `nama_matakuliah`, `sks`, `semester`, `nama_prodi`) VALUES
('MKK01', 'Sistem Basis Data', 3, 1, 'MANAJEMEN INFORMATIKA'),
('MKK02', 'C++', 3, 1, 'MANAJEMEN INFORMATIKA'),
('MKK03', 'PHP & MySQL', 3, 1, 'MANAJEMEN INFORMATIKA'),
('MKK04', 'JAVA', 3, 3, 'MANAJEMEN INFORMATIKA'),
('MKK07', 'Sistem Basis Duit', 4, 1, 'TEKNIK INFORMATIKA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `kode_prodi` varchar(15) NOT NULL,
  `nama_prodi` varchar(25) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `kode_prodi`, `nama_prodi`, `nama_jurusan`) VALUES
(2, 'TI', 'TEKNIK INFORMATIKA', 'EKONOMI BISNIS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_thn_akademik` int(11) NOT NULL,
  `tahun_akademik` varchar(15) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_thn_akademik`, `tahun_akademik`, `semester`, `status`) VALUES
(6, '2020/2021', 'Ganjil', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_kampus`
--

CREATE TABLE `tentang_kampus` (
  `id_tentang_kampus` int(11) NOT NULL,
  `sejarah` varchar(1000) NOT NULL,
  `visi` varchar(250) NOT NULL,
  `misi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tentang_kampus`
--

INSERT INTO `tentang_kampus` (`id_tentang_kampus`, `sejarah`, `visi`, `misi`) VALUES
(1, 'Sekolah Tinggi INSAN PEMBANGUNAN didirikan oleh yayasan Insan Pembangunan (YIP) dengan Akta Notaris Sri Lestari Roespinoedji, SH Nomor 146 tanggal 30 Agustus 2001 yang bertujuan untuk meningkatkan pendidikan, kesehatan, kesejateraan sosial dan kebudayaan.Awal berdirinya di mulai pada tahun 1990 dengan dimulai kegiatan Lembaga Pendidikan dengan nama New Genaration College (NGC), yaitu salah satu sarana membangun Sumber Daya Manusia dengan membuka Pendidikan Kursus, kemudian berkembang menjadi Program Profesi 1 & 3 tahun dengan nama Balai Pendidikan Insan Pembangunan yang selanjutnya pada tahun 2000 terbentuklah Yayasan Balai Pendidikan Insan Pembangunan (BPIP).   Segalah daya dan upaya telah dikerahkan sebagai pemantapan lebih lanjut untuk meningkatkan status pendidikan, maka pada tanggal 30 Agustus 2001 dikukuhkan berdirinya Sekolah Tinggi Ilmu Ekonomi BPIP (STIE BPIP) dengan Surat Keputusan Menteri Pendidikan Nasional Nomor 146/D/O/2001.', 'Pada tahun 2025 menjadi Perguruan Tinggi unggul di bidang teknologi informasi dan Sistem Informasi Akuntansi yang memiliki daya saing global', 'Menyelenggarakan pendidikan tinggi di bidang teknologi informasi berwawasan global, Menyelenggarakan penelitian-penelitian di bidang teknologi informasi yang berkualitas dan berdaya saing global,  Menyelenggarakan pengabdian kepada masyarakat secara profesional terutama di bidang teknologi informasi dan komputer,  Menyelenggarakan kerjasama dalam dan luar negeri dalam bidang IT.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transkrip_nilai`
--

CREATE TABLE `transkrip_nilai` (
  `id_transkrip` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `kode_matakuliah` varchar(15) NOT NULL,
  `nilai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transkrip_nilai`
--

INSERT INTO `transkrip_nilai` (`id_transkrip`, `nim`, `kode_matakuliah`, `nilai`) VALUES
(1, '2016804090', 'MKK02', ''),
(2, '2016804090', 'MKK03', ''),
(3, '2016804091', 'MKK02', ''),
(4, '2016804091', 'MKK03', ''),
(5, '2016804090', 'MKK01', ''),
(6, '2016804090', 'MKK04', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `id_session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `level`, `blokir`, `id_session`) VALUES
(2, 'admin', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', 'admin', 'N', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indeks untuk tabel `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_thn_akademik`);

--
-- Indeks untuk tabel `tentang_kampus`
--
ALTER TABLE `tentang_kampus`
  ADD PRIMARY KEY (`id_tentang_kampus`);

--
-- Indeks untuk tabel `transkrip_nilai`
--
ALTER TABLE `transkrip_nilai`
  ADD PRIMARY KEY (`id_transkrip`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `id_hubungi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_thn_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tentang_kampus`
--
ALTER TABLE `tentang_kampus`
  MODIFY `id_tentang_kampus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transkrip_nilai`
--
ALTER TABLE `transkrip_nilai`
  MODIFY `id_transkrip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
