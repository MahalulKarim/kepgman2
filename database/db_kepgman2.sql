-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Jun 2026 pada 19.03
-- Versi server: 8.0.30
-- Versi PHP: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kepgman2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_jabatan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_jabatan` enum('kepala sekolah','wakil kepala sekolah','guru','staff TU') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji_pokok` double NOT NULL DEFAULT '0',
  `tunjangan` double NOT NULL DEFAULT '0',
  `jobdesk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status_jabatan` enum('aktif','non-aktif') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatans`
--

INSERT INTO `jabatans` (`id`, `kode_jabatan`, `nama_jabatan`, `departemen`, `level_jabatan`, `gaji_pokok`, `tunjangan`, `jobdesk`, `status_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'KS-01', 'Kepala Sekolah', 'Pimpinan', 'kepala sekolah', 5000000, 2500000, 'Memimpin seluruh kegiatan operasional dan akademis di MAN 2 Wonosobo.', 'aktif', '2026-06-06 03:04:10', '2026-06-06 16:38:59'),
(2, 'WAKUR-02', 'Waka Kurikulum', 'Kurikulum', 'guru', 4000000, 1200000, 'Mengatur administrasi pembelajaran, jadwal mengajar, dan kalender akademik.', 'aktif', '2026-06-06 03:04:10', '2026-06-06 16:30:25'),
(4, 'TU-04', 'Staf Administrasi Kepegawaian', 'Tata Usaha', 'guru', 2500000, 300000, 'Mengelola arsip, data guru/pegawai, dan persuratan madrasah.', 'aktif', '2026-06-06 03:04:10', '2026-06-06 16:30:38'),
(6, 'GR01', 'Guru', 'Pengajar', 'guru', 1000000, 500000, 'Mengajar Kelas', 'aktif', '2026-06-06 16:31:21', '2026-06-06 16:31:21'),
(7, 'WKEP1', 'Wakil Kepala Sekolah', 'Pimpinan 2', 'wakil kepala sekolah', 3000000, 1499999, 'Mawakilkan Kepala Sekolah', 'aktif', '2026-06-06 16:33:14', '2026-06-06 16:43:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporans`
--

CREATE TABLE `laporans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pegawai` bigint UNSIGNED DEFAULT NULL,
  `id_jabatan` bigint UNSIGNED DEFAULT NULL,
  `id_pendidikan` bigint UNSIGNED DEFAULT NULL,
  `id_pensiun` bigint UNSIGNED DEFAULT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tgl_laporan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporans`
--

INSERT INTO `laporans` (`id`, `id_pegawai`, `id_jabatan`, `id_pendidikan`, `id_pensiun`, `catatan`, `tgl_laporan`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:46:36', '2026-06-06 17:46:36'),
(2, 3, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:46:36', '2026-06-06 17:46:36'),
(3, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:46:36', '2026-06-06 17:46:36'),
(4, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:46:36', '2026-06-06 17:46:36'),
(5, NULL, NULL, NULL, 1, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:47:22', '2026-06-06 17:47:22'),
(6, NULL, NULL, NULL, 2, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:47:22', '2026-06-06 17:47:22'),
(7, 2, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:53:13', '2026-06-06 17:53:13'),
(8, 3, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:53:13', '2026-06-06 17:53:13'),
(9, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:53:13', '2026-06-06 17:53:13'),
(10, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:53:13', '2026-06-06 17:53:13'),
(11, 2, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:03', '2026-06-06 17:59:03'),
(12, 3, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:03', '2026-06-06 17:59:03'),
(13, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:03', '2026-06-06 17:59:03'),
(14, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:03', '2026-06-06 17:59:03'),
(15, 2, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:21', '2026-06-06 17:59:21'),
(16, 3, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:21', '2026-06-06 17:59:21'),
(17, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:21', '2026-06-06 17:59:21'),
(18, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:21', '2026-06-06 17:59:21'),
(19, 2, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:03:23', '2026-06-06 18:03:23'),
(20, 3, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:03:23', '2026-06-06 18:03:23'),
(21, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:03:23', '2026-06-06 18:03:23'),
(22, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:03:23', '2026-06-06 18:03:23'),
(23, 2, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:04:23', '2026-06-06 18:04:23'),
(24, 3, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:04:23', '2026-06-06 18:04:23'),
(25, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:04:23', '2026-06-06 18:04:23'),
(26, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:04:23', '2026-06-06 18:04:23'),
(27, 2, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:06:11', '2026-06-06 18:06:11'),
(28, 3, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:06:11', '2026-06-06 18:06:11'),
(29, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:06:11', '2026-06-06 18:06:11'),
(30, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:06:11', '2026-06-06 18:06:11'),
(31, NULL, 1, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:06:31', '2026-06-06 18:06:31'),
(32, NULL, 2, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:06:31', '2026-06-06 18:06:31'),
(33, NULL, 4, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:06:31', '2026-06-06 18:06:31'),
(34, NULL, 6, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:06:31', '2026-06-06 18:06:31'),
(35, NULL, 7, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:06:31', '2026-06-06 18:06:31'),
(36, NULL, NULL, 2, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:06:46', '2026-06-06 18:06:46'),
(37, NULL, NULL, 4, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:06:46', '2026-06-06 18:06:46'),
(38, NULL, NULL, NULL, 1, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:06:56', '2026-06-06 18:06:56'),
(39, NULL, NULL, NULL, 2, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:06:56', '2026-06-06 18:06:56'),
(40, NULL, NULL, NULL, 1, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:07:09', '2026-06-06 18:07:09'),
(41, 2, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:07:14', '2026-06-06 18:07:14'),
(42, 2, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:08:28', '2026-06-06 18:08:28'),
(43, 3, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:08:28', '2026-06-06 18:08:28'),
(44, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:08:28', '2026-06-06 18:08:28'),
(45, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:08:28', '2026-06-06 18:08:28'),
(46, 2, NULL, NULL, NULL, 'oke', '2026-06-07', '2026-06-06 18:13:36', '2026-06-06 18:13:36'),
(47, 3, NULL, NULL, NULL, 'oke', '2026-06-07', '2026-06-06 18:13:36', '2026-06-06 18:13:36'),
(48, NULL, NULL, NULL, NULL, 'oke', '2026-06-07', '2026-06-06 18:13:36', '2026-06-06 18:13:36'),
(49, NULL, NULL, NULL, NULL, 'oke', '2026-06-07', '2026-06-06 18:13:36', '2026-06-06 18:13:36'),
(50, 2, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:14:54', '2026-06-06 18:14:54'),
(51, 3, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:14:54', '2026-06-06 18:14:54'),
(52, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:14:54', '2026-06-06 18:14:54'),
(53, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:14:54', '2026-06-06 18:14:54'),
(54, NULL, NULL, NULL, 1, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 19:05:31', '2026-06-06 19:05:31'),
(55, NULL, 1, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 19:06:17', '2026-06-06 19:06:17'),
(56, NULL, 2, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 19:06:17', '2026-06-06 19:06:17'),
(57, NULL, 4, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 19:06:17', '2026-06-06 19:06:17'),
(58, NULL, 6, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 19:06:17', '2026-06-06 19:06:17'),
(59, NULL, 7, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 19:06:17', '2026-06-06 19:06:17'),
(60, NULL, 1, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 19:07:16', '2026-06-06 19:07:16'),
(61, NULL, 2, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 19:07:16', '2026-06-06 19:07:16'),
(62, NULL, 4, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 19:07:16', '2026-06-06 19:07:16'),
(63, NULL, 6, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 19:07:16', '2026-06-06 19:07:16'),
(64, NULL, 7, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 19:07:16', '2026-06-06 19:07:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_06_011111_create_jabatans_table', 1),
(5, '2026_06_06_094012_create_pegawais_table', 1),
(6, '2026_06_06_222938_create_riwayat_pendidikans_table', 2),
(7, '2026_06_06_235041_create_pensiuns_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `jabatan_id` bigint UNSIGNED DEFAULT NULL,
  `nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Khonghucu') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `no_telp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pegawai` enum('PNS','NON-PNS') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawais`
--

INSERT INTO `pegawais` (`id`, `user_id`, `jabatan_id`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `alamat`, `foto`, `no_telp`, `status_pegawai`, `created_at`, `updated_at`) VALUES
(2, 5, 1, '3423424', 'Handoyo', 'wonosobo', '2026-06-06', 'L', 'Islam', 'fsdfsdf', '1780740902_goku-perfected-3840x2160-25454.jpg', '324234', 'PNS', '2026-06-06 03:15:02', '2026-06-06 18:44:17'),
(3, 6, 6, '23423434', 'Tuti Lestari', 'WONOSOBO', '2026-06-01', 'P', 'Hindu', 'Wonosobo Jawa Tengah', '1781364848_100917-2560x1440-desktop-hd-cristiano-ronaldo-wallpaper-image.jpg', '352352535', 'PNS', '2026-06-06 16:20:48', '2026-06-13 15:34:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pensiuns`
--

CREATE TABLE `pensiuns` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `tmt_cpns` date DEFAULT NULL,
  `tmt_pangkat` date DEFAULT NULL,
  `tanggal_pensiun` date NOT NULL,
  `masa_kerja` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_tunjangan` double NOT NULL DEFAULT '0',
  `status_pembayaran` enum('pending','proses','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pensiuns`
--

INSERT INTO `pensiuns` (`id`, `id_user`, `tmt_cpns`, `tmt_pangkat`, `tanggal_pensiun`, `masa_kerja`, `total_tunjangan`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 5, '2026-06-07', '2026-06-09', '2026-06-12', '12', 100000, 'proses', '2026-06-06 17:10:52', '2026-06-06 17:21:48'),
(3, 6, '2026-06-07', '2026-06-08', '2026-06-10', '21', 10000, 'pending', NULL, '2026-06-13 15:43:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pendidikans`
--

CREATE TABLE `riwayat_pendidikans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `jenjang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_institusi` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pelatihan` bigint UNSIGNED DEFAULT NULL,
  `nama_pelatihan` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lulus` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayat_pendidikans`
--

INSERT INTO `riwayat_pendidikans` (`id`, `id_user`, `jenjang`, `nama_institusi`, `gelar`, `id_pelatihan`, `nama_pelatihan`, `tahun_lulus`, `created_at`, `updated_at`) VALUES
(2, 5, 'S3', 'UNSIQ', 'M.Kom', NULL, NULL, NULL, '2026-06-06 16:02:35', '2026-06-06 16:47:22'),
(4, 6, 'S1', 'LPK SATU', 'INSTRUKTUR BAHASA JEPANG', NULL, NULL, NULL, '2026-06-06 16:44:25', '2026-06-06 16:44:25'),
(6, 6, '-', 'LPK ASIK', 'TERSERTIFIKASI', NULL, 'BAHASA INGGRIS', NULL, '2026-06-13 15:53:20', '2026-06-13 15:53:20'),
(7, 6, 'SERTIFIKASI', 'UNIVERSITAS SAINS AL-QURAN', 'S.Sos', NULL, NULL, 2018, '2026-06-13 17:14:16', '2026-06-13 17:14:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6k8xJXg3XPdfs8oCvMf1knqbUpdDsTa6tilTGOu5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJLYVl4aDBZNktXc3NhREowalJJMDNZY2tKR3p6NmdacFpGV0hicGVKIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvcGVnYXdhaSIsInJvdXRlIjoiYWRtaW4ucGVnYXdhaS5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxLCJhdXRoIjp7InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI6MTc4MTM3MDQ0NX19', 1781377349),
('zi3s2WHsT1Uq2LJBKxWB4YLEXNUkQsVjuP47E8pX', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJrNDRadHE5dDZoemJpbGFYV3c1T2lzc1hJcHk2ak1tYm9MaDZSakN3IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2tlcHNla1wvbGFwb3JhbiIsInJvdXRlIjoia2Vwc2VrLmxhcG9yYW4uaW5kZXgifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjUsImF1dGgiOnsicGFzc3dvcmRfY29uZmlybWVkX2F0IjoxNzgxMzc1NzM5fX0=', 1781377305);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint NOT NULL DEFAULT '3' COMMENT '1: Admin, 2: Kepsek, 3: Pegawai',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin MAN 2', 'admin@man.com', NULL, '$2y$12$gnuf7U5uKNUnhVDbKxEldObIWllxYw8MDKw8C0zcpYDX.8vntwsxC', 1, NULL, '2026-06-06 03:04:09', '2026-06-06 03:04:09'),
(2, 'Kepala Sekolah MAN 2', 'kepsek@man.com', NULL, '$2y$12$k9.iXKMKgg8sBOSbuusxheHlO9WdnpZWwyfUmqjqDrKCnP05Xrkuq', 2, NULL, '2026-06-06 03:04:09', '2026-06-06 03:04:09'),
(3, 'Pegawai MAN 2', 'pegawai@man.com', NULL, '$2y$12$F18dVT1otIrfRYAeFqUYReXpJlKZOIX9g5Zqfk6tx3Ti88tH.sS/2', 3, NULL, '2026-06-06 03:04:10', '2026-06-06 03:04:10'),
(5, 'Handoyo', 'handoyo@gmail.com', NULL, '$2y$12$zDczRrP4Bl3.2ZB5JgQu2u/jQ8lIj6qLROaHPYT5ZMF1BKPX.lFkW', 2, NULL, '2026-06-06 03:15:02', '2026-06-13 18:35:20'),
(6, 'Tuti Lestari', 'tuti@gmail.com', NULL, '$2y$12$bKEAmEfNN7U36fY6.WIbd.LHbxK7a5MRrknJxULqali1Ty7tj3sP2', 3, NULL, '2026-06-06 16:20:47', '2026-06-13 16:57:16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indeks untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jabatans_kode_jabatan_unique` (`kode_jabatan`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporans_id_pegawai_foreign` (`id_pegawai`),
  ADD KEY `laporans_id_jabatan_foreign` (`id_jabatan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawais_nip_unique` (`nip`),
  ADD KEY `pegawais_user_id_foreign` (`user_id`),
  ADD KEY `pegawais_jabatan_id_foreign` (`jabatan_id`);

--
-- Indeks untuk tabel `pensiuns`
--
ALTER TABLE `pensiuns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pensiuns_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `riwayat_pendidikans`
--
ALTER TABLE `riwayat_pendidikans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pensiuns`
--
ALTER TABLE `pensiuns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pendidikans`
--
ALTER TABLE `riwayat_pendidikans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporans`
--
ALTER TABLE `laporans`
  ADD CONSTRAINT `laporans_id_jabatan_foreign` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatans` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `laporans_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawais` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD CONSTRAINT `pegawais_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pegawais_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pensiuns`
--
ALTER TABLE `pensiuns`
  ADD CONSTRAINT `pensiuns_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
