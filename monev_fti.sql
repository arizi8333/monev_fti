-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Okt 2022 pada 21.01
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monev_fti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkasdokumens`
--

CREATE TABLE `berkasdokumens` (
  `id_kelas_perkuliahan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori_berkas` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_berkas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_upload` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `keterangan` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berkasdokumens`
--

INSERT INTO `berkasdokumens` (`id_kelas_perkuliahan`, `id_kategori_berkas`, `file_berkas`, `tanggal_upload`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
('K0001', 'B01', 'public/dokumen/1WSj4UtZxolke7CiPEDYe21a1Rnb4WXpDZvY82ha.pdf', '2022-09-21', 2, NULL, NULL, NULL),
('K0001', 'B02', 'public/dokumen/fM0IzxCJX7WGkfTJqWh3y2fgnMM8QC4I0wo4qyhQ.pdf', '2022-09-21', 2, NULL, NULL, NULL),
('K0001', 'B03', 'public/dokumen/CHicqXXWjRT9TKpcH2H7d7PRou3dhdl8nEZDsV8g.pdf', '2022-09-21', 2, NULL, NULL, NULL),
('K0001', 'B04', 'public/dokumen/mY4UjSWo7rbUfPdRIt94C0Bk85KWyLgeZRDU8JUh.pdf', '2022-09-21', 2, NULL, NULL, NULL),
('K0001', 'B05', 'public/dokumen/WlH3dqepoqNm7pruYHEW1ofUFHz96ef3XlA58ic3.pdf', '2022-10-07', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailhasilverifikators`
--

CREATE TABLE `detailhasilverifikators` (
  `id_hasil_verifikasi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_kelengkapan_dokumen` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penilaian` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detailhasilverifikators`
--

INSERT INTO `detailhasilverifikators` (`id_hasil_verifikasi`, `id_jenis_kelengkapan_dokumen`, `penilaian`, `keterangan`, `created_at`, `updated_at`) VALUES
('V000000001', 'P01', 'Baik', NULL, NULL, NULL),
('V000000001', 'P02', 'Baik', NULL, NULL, NULL),
('V000000001', 'P03', 'Baik', NULL, NULL, NULL),
('V000000001', 'P04', 'Baik', NULL, NULL, NULL),
('V000000001', 'P05', 'Cukup', NULL, NULL, NULL),
('V000000001', 'P06', 'Sangat Baik', NULL, NULL, NULL),
('V000000001', 'P07', 'Baik', NULL, NULL, NULL),
('V000000001', 'P08', 'Cukup', NULL, NULL, NULL),
('V000000001', 'P09', 'Sangat Baik', NULL, NULL, NULL),
('V000000001', 'P10', 'Sangat Baik', NULL, NULL, NULL),
('V000000002', 'P11', 'Ada', NULL, NULL, NULL),
('V000000002', 'P12', 'Ada', NULL, NULL, NULL),
('V000000002', 'P13', 'Ada', NULL, NULL, NULL),
('V000000002', 'P14', 'Ada', NULL, NULL, NULL),
('V000000002', 'P15', 'Ada', NULL, NULL, NULL),
('V000000002', 'P16', 'Ada', NULL, NULL, NULL),
('V000000002', 'P17', 'Ada', NULL, NULL, NULL),
('V000000002', 'P18', 'Ada', NULL, NULL, NULL),
('V000000002', 'P19', 'Ada', NULL, NULL, NULL),
('V000000002', 'P20', 'Ada', NULL, NULL, NULL),
('V000000002', 'P21', 'Ada', NULL, NULL, NULL),
('V000000002', 'P22', 'Ada', NULL, NULL, NULL),
('V000000002', 'P23', 'Ada', NULL, NULL, NULL),
('V000000002', 'P24', 'Ada', NULL, NULL, NULL),
('V000000002', 'P25', 'Ada', NULL, NULL, NULL),
('V000000002', 'P26', 'Ada', NULL, NULL, NULL),
('V000000002', 'P27', 'Ada', NULL, NULL, NULL),
('V000000002', 'P28', 'Ada', NULL, NULL, NULL),
('V000000002', 'P29', 'Ada', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasilverifikasis`
--

CREATE TABLE `hasilverifikasis` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dosen_verifikator` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas_perkuliahan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeline_perkuliahan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `tanggal_verifikasi` date DEFAULT NULL,
  `tanda_tangan_verifikator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanda_tangan_gkm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasilverifikasis`
--

INSERT INTO `hasilverifikasis` (`id`, `id_dosen_verifikator`, `id_kelas_perkuliahan`, `timeline_perkuliahan`, `status`, `tanggal_verifikasi`, `tanda_tangan_verifikator`, `tanda_tangan_gkm`, `catatan`, `created_at`, `updated_at`) VALUES
('V000000001', '196211221989009', 'K0001', '1', 2, '2022-09-25', 'public/ttd/whWkRxCkZOmukU4uP9WKUyLj6I6qgn9okiCnyZ2d.jpg', 'public/ttd/DRv4m5alR5RcL2yCrsf4j1oDBGJQrxfmEmaIQfzx.jpg', NULL, NULL, NULL),
('V000000002', '196211221989009', 'K0001', '2', 2, '2022-10-07', 'public/ttd/PD4E5NKfPcRawCJIIuw4jKFkmGcz3Pm4T4ngnAGu.png', 'public/ttd/iVwnUk0tisVU0awWRh7kd9fKW36uEIzYYERyy36i.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jeniskelengkapandokumens`
--

CREATE TABLE `jeniskelengkapandokumens` (
  `id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelengkapan_dokumen` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_penilaian` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jeniskelengkapandokumens`
--

INSERT INTO `jeniskelengkapandokumens` (`id`, `kelengkapan_dokumen`, `tipe_penilaian`, `created_at`, `updated_at`) VALUES
('P01', 'Capaian Pembelajaran mata kuliah memuat aspek sikap, pengetahuan, dan keterampilan', 'Kelengkapan Dokumen RPS', NULL, NULL),
('P02', 'Kemampuan akhir yang direncankan pada tiap tahap pembelajaran untuk memenuhi capaian pembelajaran lulusan', 'Kelengkapan Dokumen RPS', NULL, NULL),
('P03', 'Perumusan tujuan/indicator mendukung capaian pembelajaran', 'Kelengkapan Dokumen RPS', NULL, NULL),
('P04', 'Bahan kajian terkait dengan kemampuan yang akan dicapai', 'Kelengkapan Dokumen RPS', NULL, NULL),
('P05', 'Kesesuaian pemilihan strategi pembelajaran dengan indikator', 'Kelengkapan Dokumen RPS', NULL, NULL),
('P06', 'Kesesuaian sumber belajar/media dengan  indikator', 'Kelengkapan Dokumen RPS', NULL, NULL),
('P07', 'Kesesuaian perencanaan waktu dengan  materi pembelajaran', 'Kelengkapan Dokumen RPS', NULL, NULL),
('P08', 'Kesesuaian pengalaman belajar dengan  indicator', 'Kelengkapan Dokumen RPS', NULL, NULL),
('P09', 'Butir-butir penilaian sesuai dengan  indicator', 'Kelengkapan Dokumen RPS', NULL, NULL),
('P10', 'Keterkinian referensi', 'Kelengkapan Dokumen RPS', NULL, NULL),
('P11', 'Nama mata kuliah', 'Format Penulisan Soal', NULL, NULL),
('P12', 'SMS/Semester', 'Format Penulisan Soal', NULL, NULL),
('P13', 'Prodi', 'Format Penulisan Soal', NULL, NULL),
('P14', 'Waktu pelaksanaan ujian', 'Format Penulisan Soal', NULL, NULL),
('P15', 'Nama dosen pengampu', 'Format Penulisan Soal', NULL, NULL),
('P16', 'Kertas soal menggunakan kop Universitas / Fakultas /  Jurusan', 'Format Penulisan Soal', NULL, NULL),
('P17', 'Bentuk ujian (terbuka / tertutup)', 'Format Penulisan Soal', NULL, NULL),
('P18', 'Cara mengerjakan soal (boleh tidak berurut nomor atau tidak)', 'Format Penulisan Soal', NULL, NULL),
('P19', 'Sanksi', 'Format Penulisan Soal', NULL, NULL),
('P20', 'Penggunaan telepon cellular, serta alat lain pada saat ujian (boleh atau tidak)', 'Format Penulisan Soal', NULL, NULL),
('P21', 'Pada penutup, terdapat himbauan moral, seperti:  memberikan semangat untuk berlaku jujur dll', 'Format Penulisan Soal', NULL, NULL),
('P22', 'Kesuaian materi soal dengan RPS', 'Materi Soal', NULL, NULL),
('P23', 'Nomor urut soal berdasarkan tingkat kesulitas', 'Materi Soal', NULL, NULL),
('P24', 'Soal ujian mencakup kompetensi/learning outcome yang tercantum di dalam RPS', 'Materi Soal', NULL, NULL),
('P25', 'Materi soal yang diujikan sesuai dengan periode ujian  (UTS/UAS)', 'Materi Soal', NULL, NULL),
('P26', 'Setiap soal mencantumkan bobot nilai', 'Materi Soal', NULL, NULL),
('P27', 'Bobot nilai sesuai dengan tingkat kesulitas soal', 'Materi Soal', NULL, NULL),
('P28', 'Kesesuaian soal dengan CPMK', 'Materi Soal', NULL, NULL),
('P29', 'Memiliki Grading  Checklist', 'Materi Soal', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoriberkas`
--

CREATE TABLE `kategoriberkas` (
  `id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_berkas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoriberkas`
--

INSERT INTO `kategoriberkas` (`id`, `nama_berkas`, `kategori`, `created_at`, `updated_at`) VALUES
('B01', 'RPS', 1, NULL, NULL),
('B02', 'RTM', 1, NULL, NULL),
('B03', 'Kontrak Perkuliahan', 1, NULL, NULL),
('B04', 'BAP', 1, NULL, NULL),
('B05', 'Form Naskah Soal UTS', 2, NULL, NULL),
('B06', 'Form Naskah Soal UAS', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelasperkuliahans`
--

CREATE TABLE `kelasperkuliahans` (
  `id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dosen_pengampu` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_matakuliah` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_akademik` int(11) NOT NULL,
  `kurikulum` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelasperkuliahans`
--

INSERT INTO `kelasperkuliahans` (`id`, `id_dosen_pengampu`, `id_matakuliah`, `keterangan`, `tahun_akademik`, `kurikulum`, `status`, `created_at`, `updated_at`) VALUES
('K0001', '196211221989864', 'M0001', NULL, 2022, 2017, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliahs`
--

CREATE TABLE `matakuliahs` (
  `id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_matakuliah` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_matakuliah` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota` int(11) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `matakuliahs`
--

INSERT INTO `matakuliahs` (`id`, `id_prodi`, `nama_matakuliah`, `kategori_matakuliah`, `kuota`, `sks`, `semester`, `created_at`, `updated_at`) VALUES
('M0001', 'P01', 'Dasar Pemrograman', 'Teori', 45, 3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2012_09_12_164420_create_prodis_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_09_12_164446_create_kategoriberkas_table', 1),
(7, '2022_09_12_164523_create_jeniskelengkapandokumens_table', 1),
(8, '2022_09_12_164550_create_matakuliahs_table', 1),
(9, '2022_09_12_164609_create_kelasperkuliahans_table', 1),
(10, '2022_09_12_164650_create_hasilverifikasis_table', 1),
(11, '2022_09_12_164710_create_detailhasilverifikators_table', 1),
(12, '2022_09_12_164726_create_berkasdokumens_table', 1),
(13, '2022_09_12_164741_create_monitorings_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitorings`
--

CREATE TABLE `monitorings` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil_verifikasi_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_mahasiswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `materi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertemuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `monitorings`
--

INSERT INTO `monitorings` (`id`, `hasil_verifikasi_id`, `jumlah_mahasiswa`, `tanggal`, `materi`, `pertemuan`, `jam_mulai`, `jam_selesai`, `bukti`, `created_at`, `updated_at`) VALUES
('M000000001', 'V000000001', 45, '2022-09-27', 'Pembahasan A', 'Minggu 1', '08:00:00', '09:45:00', 'public/bukti/Q3LvLvMMWLXds324Hih6RuaIHP6rs2olNURi2k9B.pdf', NULL, NULL),
('M000000002', 'V000000001', 39, '2022-10-05', 'Materi B', 'Pertemuan 1', '11:00:39', '14:00:39', '-', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodis`
--

CREATE TABLE `prodis` (
  `id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_prodi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_fakultas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang_pendidikan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prodis`
--

INSERT INTO `prodis` (`id`, `nama_prodi`, `nama_fakultas`, `jenjang_pendidikan`, `created_at`, `updated_at`) VALUES
('P01', 'Sistem Informasi', 'Teknologi Informasi', 'S1', NULL, NULL),
('P02', 'Sistem Komputer', 'Teknologi Informasi', 'S1', NULL, NULL),
('P03', 'Teknik Informatika', 'Teknologi Informasi', 'S1', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `nip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`nip`, `id_prodi`, `nama`, `jabatan`, `foto`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
('196211221989009', 'P01', 'Agung Prasetya', '-', NULL, 'agung@gmail.com', '2022-04-29 13:58:33', '$2y$10$fpPdxW8nTivc1TuAa2nHX.LbNWCn6x90PhvgTgumBgjAKoCCKxUHq', 3, NULL, NULL, NULL),
('196211221989031', 'P01', 'Admin', 'Administrasi', NULL, 'admin@gmail.com', '2022-09-14 14:45:22', '$2y$10$MlcnSkxSxQnQEexV99N8kuWX1FydOJjaJ/sQsFnw5d5/NEwhncj4C', 1, NULL, NULL, NULL),
('196211221989111', 'P01', 'Dr.dr. Yusirwan, Sp.BA (K), MA', '-', NULL, 'yusirwan@gmail.com', '2022-09-28 15:33:04', '$2y$10$MlcnSkxSxQnQEexV99N8kuWX1FydOJjaJ/sQsFnw5d5/NEwhncj4C', 2, NULL, NULL, NULL),
('196211221989864', 'P01', 'Haris Suryamen', '-', NULL, 'haris@gmail.com', '2022-09-16 13:38:54', '$2y$10$fpPdxW8nTivc1TuAa2nHX.LbNWCn6x90PhvgTgumBgjAKoCCKxUHq', 3, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkasdokumens`
--
ALTER TABLE `berkasdokumens`
  ADD KEY `berkasdokumens_id_kelas_perkuliahan_foreign` (`id_kelas_perkuliahan`),
  ADD KEY `berkasdokumens_id_kategori_berkas_foreign` (`id_kategori_berkas`);

--
-- Indeks untuk tabel `detailhasilverifikators`
--
ALTER TABLE `detailhasilverifikators`
  ADD KEY `detailhasilverifikators_id_hasil_verifikasi_foreign` (`id_hasil_verifikasi`),
  ADD KEY `detailhasilverifikators_id_jenis_kelengkapan_dokumen_foreign` (`id_jenis_kelengkapan_dokumen`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hasilverifikasis`
--
ALTER TABLE `hasilverifikasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasilverifikasis_id_dosen_verifikator_foreign` (`id_dosen_verifikator`),
  ADD KEY `hasilverifikasis_id_kelas_perkuliahan_foreign` (`id_kelas_perkuliahan`);

--
-- Indeks untuk tabel `jeniskelengkapandokumens`
--
ALTER TABLE `jeniskelengkapandokumens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoriberkas`
--
ALTER TABLE `kategoriberkas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelasperkuliahans`
--
ALTER TABLE `kelasperkuliahans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelasperkuliahans_id_dosen_pengampu_foreign` (`id_dosen_pengampu`),
  ADD KEY `kelasperkuliahans_id_matakuliah_foreign` (`id_matakuliah`);

--
-- Indeks untuk tabel `matakuliahs`
--
ALTER TABLE `matakuliahs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matakuliahs_id_prodi_foreign` (`id_prodi`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `monitorings`
--
ALTER TABLE `monitorings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monitorings_id_hasil_verifikasi_foreign` (`hasil_verifikasi_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_prodi_foreign` (`id_prodi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berkasdokumens`
--
ALTER TABLE `berkasdokumens`
  ADD CONSTRAINT `berkasdokumens_id_kategori_berkas_foreign` FOREIGN KEY (`id_kategori_berkas`) REFERENCES `kategoriberkas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berkasdokumens_id_kelas_perkuliahan_foreign` FOREIGN KEY (`id_kelas_perkuliahan`) REFERENCES `kelasperkuliahans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detailhasilverifikators`
--
ALTER TABLE `detailhasilverifikators`
  ADD CONSTRAINT `detailhasilverifikators_id_hasil_verifikasi_foreign` FOREIGN KEY (`id_hasil_verifikasi`) REFERENCES `hasilverifikasis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailhasilverifikators_id_jenis_kelengkapan_dokumen_foreign` FOREIGN KEY (`id_jenis_kelengkapan_dokumen`) REFERENCES `jeniskelengkapandokumens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasilverifikasis`
--
ALTER TABLE `hasilverifikasis`
  ADD CONSTRAINT `hasilverifikasis_id_dosen_verifikator_foreign` FOREIGN KEY (`id_dosen_verifikator`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasilverifikasis_id_kelas_perkuliahan_foreign` FOREIGN KEY (`id_kelas_perkuliahan`) REFERENCES `kelasperkuliahans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelasperkuliahans`
--
ALTER TABLE `kelasperkuliahans`
  ADD CONSTRAINT `kelasperkuliahans_id_dosen_pengampu_foreign` FOREIGN KEY (`id_dosen_pengampu`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelasperkuliahans_id_matakuliah_foreign` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliahs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `matakuliahs`
--
ALTER TABLE `matakuliahs`
  ADD CONSTRAINT `matakuliahs_id_prodi_foreign` FOREIGN KEY (`id_prodi`) REFERENCES `prodis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `monitorings`
--
ALTER TABLE `monitorings`
  ADD CONSTRAINT `monitorings_id_hasil_verifikasi_foreign` FOREIGN KEY (`hasil_verifikasi_id`) REFERENCES `hasilverifikasis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_prodi_foreign` FOREIGN KEY (`id_prodi`) REFERENCES `prodis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
