-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2026 at 08:32 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

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
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_jabatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jabatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_jabatan` enum('kepala sekolah','wakil kepala sekolah','guru','staff TU') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji_pokok` double NOT NULL DEFAULT '0',
  `tunjangan` double NOT NULL DEFAULT '0',
  `jobdesk` text COLLATE utf8mb4_unicode_ci,
  `status_jabatan` enum('aktif','non-aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `kode_jabatan`, `nama_jabatan`, `departemen`, `level_jabatan`, `gaji_pokok`, `tunjangan`, `jobdesk`, `status_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'KS-01', 'Kepala Sekolah', 'Pimpinan', 'kepala sekolah', 5000000, 2500000, 'Memimpin seluruh kegiatan operasional dan akademis di MAN 2 Wonosobo.', 'aktif', '2026-06-06 03:04:10', '2026-06-06 16:38:59'),
(2, 'WAKUR-02', 'Waka Kurikulum', 'Kurikulum', 'guru', 4000000, 1200000, 'Mengatur administrasi pembelajaran, jadwal mengajar, dan kalender akademik.', 'aktif', '2026-06-06 03:04:10', '2026-06-06 16:30:25'),
(4, 'TU-04', 'Staf Administrasi Kepegawaian', 'Tata Usaha', 'guru', 2500000, 300000, 'Mengelola arsip, data guru/pegawai, dan persuratan madrasah.', 'aktif', '2026-06-06 03:04:10', '2026-06-06 16:30:38'),
(6, 'GR01', 'Guru', 'Pengajar', 'guru', 1000000, 500000, 'Mengajar Kelas', 'aktif', '2026-06-06 16:31:21', '2026-06-06 16:31:21'),
(7, 'WKEP1', 'Wakil Kepala Sekolah', 'Pimpinan 2', 'wakil kepala sekolah', 3000000, 1499999, 'Mawakilkan Kepala Sekolah', 'aktif', '2026-06-06 16:33:14', '2026-06-06 16:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

CREATE TABLE `laporans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pegawai` bigint UNSIGNED DEFAULT NULL,
  `id_jabatan` bigint UNSIGNED DEFAULT NULL,
  `id_pendidikan` bigint UNSIGNED DEFAULT NULL,
  `id_pensiun` bigint UNSIGNED DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `tgl_laporan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporans`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `jabatan_id` bigint UNSIGNED DEFAULT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Khonghucu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pegawai` enum('PNS','NON-PNS') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `user_id`, `jabatan_id`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `alamat`, `foto`, `no_telp`, `status_pegawai`, `created_at`, `updated_at`) VALUES
(2, 5, 1, '3423424', 'Handoyo', 'wonosobo', '2026-06-06', 'L', 'Islam', 'fsdfsdf', '1780740902_goku-perfected-3840x2160-25454.jpg', '324234', 'PNS', '2026-06-06 03:15:02', '2026-06-06 18:44:17'),
(3, 6, 6, '23423434', 'Tuti Lestari', 'WONOSOBO', '2026-06-01', 'P', 'Hindu', 'Wonosobo Jawa Tengah', '1780762847_goku-perfected-3840x2160-25454.jpg', '352352535', 'PNS', '2026-06-06 16:20:48', '2026-06-06 18:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `pensiuns`
--

CREATE TABLE `pensiuns` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `tmt_cpns` date DEFAULT NULL,
  `tmt_pangkat` date DEFAULT NULL,
  `tanggal_pensiun` date NOT NULL,
  `masa_kerja` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_tunjangan` double NOT NULL DEFAULT '0',
  `status_pembayaran` enum('pending','proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pensiuns`
--

INSERT INTO `pensiuns` (`id`, `id_user`, `tmt_cpns`, `tmt_pangkat`, `tanggal_pensiun`, `masa_kerja`, `total_tunjangan`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 5, '2026-06-07', '2026-06-09', '2026-06-12', '12', 100000, 'proses', '2026-06-06 17:10:52', '2026-06-06 17:21:48'),
(3, 6, '2026-06-07', '2026-06-08', '2026-06-10', '10 Tahun', 10000, 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikans`
--

CREATE TABLE `riwayat_pendidikans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `jenjang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_institusi` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pelatihan` bigint UNSIGNED DEFAULT NULL,
  `nama_pelatihan` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_pendidikans`
--

INSERT INTO `riwayat_pendidikans` (`id`, `id_user`, `jenjang`, `nama_institusi`, `gelar`, `id_pelatihan`, `nama_pelatihan`, `created_at`, `updated_at`) VALUES
(2, 5, 'S3', 'UNSIQ', 'M.Kom', NULL, NULL, '2026-06-06 16:02:35', '2026-06-06 16:47:22'),
(4, 6, 'S1', 'LPK SATU', 'INSTRUKTUR BAHASA JEPANG', NULL, NULL, '2026-06-06 16:44:25', '2026-06-06 16:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3FgNW8hM8Cz8rea0wph20PhzgD5bC5tX4a81GiHu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJvc3VnakhiS1dSa1pJV0dZMUlQcExsbllCNFNxZ2liTGFBaG4xTWlZIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDAiLCJyb3V0ZSI6ImdlbmVyYXRlZDo6czlWVDViRTZnMFh5ZjR0TiJ9fQ==', 1780777887);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint NOT NULL DEFAULT '3' COMMENT '1: Admin, 2: Kepsek, 3: Pegawai',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin MAN 2', 'admin@man.com', NULL, '$2y$12$gnuf7U5uKNUnhVDbKxEldObIWllxYw8MDKw8C0zcpYDX.8vntwsxC', 1, NULL, '2026-06-06 03:04:09', '2026-06-06 03:04:09'),
(2, 'Kepala Sekolah MAN 2', 'kepsek@man.com', NULL, '$2y$12$k9.iXKMKgg8sBOSbuusxheHlO9WdnpZWwyfUmqjqDrKCnP05Xrkuq', 2, NULL, '2026-06-06 03:04:09', '2026-06-06 03:04:09'),
(3, 'Pegawai MAN 2', 'pegawai@man.com', NULL, '$2y$12$F18dVT1otIrfRYAeFqUYReXpJlKZOIX9g5Zqfk6tx3Ti88tH.sS/2', 3, NULL, '2026-06-06 03:04:10', '2026-06-06 03:04:10'),
(5, 'Handoyo', 'handoyo@gmail.com', NULL, '$2y$12$qH6hMppVSpQv/P/dBGZvOeVa9QGFKOXdHReSPsI5iFqxMXgn9ovcC', 2, NULL, '2026-06-06 03:15:02', '2026-06-06 18:44:17'),
(6, 'Tuti Lestari', 'tuti@gmail.com', NULL, '$2y$12$WJdk4XtRYI8gWf2tmgF.Yuy4eFg6KFLUrn4B1eMpDTAJjDBoRT4Xq', 3, NULL, '2026-06-06 16:20:47', '2026-06-06 18:44:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jabatans_kode_jabatan_unique` (`kode_jabatan`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporans_id_pegawai_foreign` (`id_pegawai`),
  ADD KEY `laporans_id_jabatan_foreign` (`id_jabatan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawais_nip_unique` (`nip`),
  ADD KEY `pegawais_user_id_foreign` (`user_id`),
  ADD KEY `pegawais_jabatan_id_foreign` (`jabatan_id`);

--
-- Indexes for table `pensiuns`
--
ALTER TABLE `pensiuns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pensiuns_id_user_foreign` (`id_user`);

--
-- Indexes for table `riwayat_pendidikans`
--
ALTER TABLE `riwayat_pendidikans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pensiuns`
--
ALTER TABLE `pensiuns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `riwayat_pendidikans`
--
ALTER TABLE `riwayat_pendidikans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporans`
--
ALTER TABLE `laporans`
  ADD CONSTRAINT `laporans_id_jabatan_foreign` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatans` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `laporans_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawais` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD CONSTRAINT `pegawais_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pegawais_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pensiuns`
--
ALTER TABLE `pensiuns`
  ADD CONSTRAINT `pensiuns_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
