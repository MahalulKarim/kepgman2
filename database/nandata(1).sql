-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Jul 2026 pada 01.54
-- Versi server: 10.11.18-MariaDB-cll-lve-log
-- Versi PHP: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `desapusp_nandata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-admin@gmail.com|127.0.0.1', 'i:1;', 1782325350),
('laravel-cache-admin@gmail.com|127.0.0.1:timer', 'i:1782325350;', 1782325350),
('laravel-cache-admin@man.com|140.213.139.85', 'i:1;', 1784227894),
('laravel-cache-admin@man.com|140.213.139.85:timer', 'i:1784227894;', 1784227894),
('laravel-cache-admin@sims.com|127.0.0.1', 'i:1;', 1782306483),
('laravel-cache-admin@sims.com|127.0.0.1:timer', 'i:1782306483;', 1782306483),
('laravel-cache-ngabas@gmail.com|112.215.169.194', 'i:1;', 1783993337),
('laravel-cache-ngabas@gmail.com|112.215.169.194:timer', 'i:1783993337;', 1783993337),
('laravel-cache-warsam2@gmail.com|103.28.112.247', 'i:1;', 1784127242),
('laravel-cache-warsam2@gmail.com|103.28.112.247:timer', 'i:1784127242;', 1784127242),
('laravel-cache-warsam2@gmail.com|103.91.149.49', 'i:1;', 1784126008),
('laravel-cache-warsam2@gmail.com|103.91.149.49:timer', 'i:1784126008;', 1784126008);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_jabatan` varchar(20) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `departemen` varchar(100) DEFAULT NULL,
  `level_jabatan` enum('kepala sekolah','wakil kepala sekolah','guru','staff TU') NOT NULL,
  `gaji_pokok` double NOT NULL DEFAULT 0,
  `tunjangan` double NOT NULL DEFAULT 0,
  `jobdesk` text DEFAULT NULL,
  `status_jabatan` enum('aktif','non-aktif') NOT NULL DEFAULT 'aktif',
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
(7, 'WKEP1', 'Wakil Kepala Sekolah', 'Pimpinan 2', 'wakil kepala sekolah', 3000000, 1499999, 'Mawakilkan Kepala Sekolah', 'aktif', '2026-06-06 16:33:14', '2026-06-06 16:43:46'),
(8, 'GRM-01', 'Guru Mapel', 'Man 2', 'guru', 3000000, 1000000, NULL, 'aktif', NULL, NULL),
(9, 'GRK-01', 'Guru Kelas', 'Man 2', 'guru', 3500000, 1200000, NULL, 'aktif', NULL, NULL),
(10, 'GRB-01', 'Guru Bk', 'Man 2', 'guru', 3000000, 1000000, NULL, 'aktif', NULL, NULL),
(11, 'PST-01', 'Pustakawan', 'Perpustakaan', 'staff TU', 3200000, 100000, NULL, 'aktif', NULL, NULL),
(12, 'LBR-01', 'Laboran', 'LAB', 'guru', 3000000, 1000000, NULL, 'aktif', NULL, NULL),
(13, 'KAM-01', 'Keamanan', 'Keamanan', 'guru', 0, 0, NULL, 'aktif', NULL, NULL),
(14, 'KEB-01', 'Kebersihan', 'Kebersihan', 'guru', 2500000, 700000, NULL, 'aktif', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text DEFAULT NULL,
  `status` enum('pending','disetujui','ditolak') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `user_id`, `tanggal`, `jam_mulai`, `jam_selesai`, `nama_kegiatan`, `deskripsi`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(6, 20, '2026-06-30', '06:19:00', '07:19:00', 'Memimpin rutinan doa pagi hari sebelum masuk pelajaran', 'Memimpin rutinan doa pagi hari sebelum masuk pelajaran', NULL, 'pending', '2026-06-30 15:20:53', '2026-06-30 15:20:53'),
(7, 55, '2026-07-01', '07:30:00', '09:00:00', 'Layanan Bimbingan Klasikal (di kelas) Kelas XI', 'Masuk ke kelas XI untuk memberikan materi bimbingan karir, menjelaskan tips memilih jurusan kuliah atau dunia kerja setelah lulus sekolah, serta melakukan pemetaan minat bakat siswa.', NULL, 'pending', '2026-07-15 13:45:21', '2026-07-15 13:45:21'),
(8, 55, '2026-07-02', '09:30:00', '10:15:00', 'Konseling Individu Siswa (Di Ruang BK)', 'Melakukan sesi konseling tatap muka secara privat dengan salah satu siswa kelas X di ruang BK untuk membantu menyelesaikan kendala motivasi belajar dan memberikan solusi terkait adaptasi lingkungan sekolah.', NULL, 'pending', '2026-07-15 13:47:15', '2026-07-15 13:47:15'),
(9, 55, '2026-07-03', '10:00:00', '00:00:00', 'Penyusunan Materi dan Program BK', 'Menyusun modul bimbingan untuk bulan depan dan menyiapkan instrumen sosiometri siswa.', NULL, 'pending', '2026-07-15 13:50:26', '2026-07-15 13:50:26'),
(10, 55, '2026-07-04', '08:00:00', '09:30:00', 'Layanan Bimbingan Klasikal (di kelas) Kelas XII', 'Sosialisasi mengenai jalur masuk perguruan tinggi (SNBP/SNBT) dan strategi pemilihan program studi.', NULL, 'ditolak', '2026-07-15 13:51:34', '2026-07-16 07:52:23'),
(11, 55, '2026-07-05', '13:00:00', '15:00:00', 'Evaluasi Bulanan Kasus Siswa', 'Berkoordinasi dengan wali kelas dan guru mapel mengenai perkembangan perilaku dan kehadiran siswa tertentu.', NULL, 'disetujui', '2026-07-15 13:52:40', '2026-07-16 07:52:09'),
(12, 40, '2026-07-01', '07:30:00', '09:00:00', 'Mengajar Mapel Bahasa Arab Kelas X', 'Menyampaikan materi bab pertama tentang At-Ta\'aruf (Perkenalan). Menjelaskan penggunaan isim dhamir (kata ganti) serta mendampingi siswa mempraktikkan percakapan singkat di depan kelas.', NULL, 'pending', '2026-07-15 14:00:00', '2026-07-15 14:00:00'),
(13, 40, '2026-07-02', '09:30:00', '11:00:00', 'Mengajar Mapel Bahasa Arab Kelas XI', 'Menyampaikan materi tentang Al-Hiwayah (Hobi). Mengajarkan pelafalan mufrodat (kosakata) baru terkait jenis-jenis hobi dan memberikan tugas mengarang teks pendek.', NULL, 'pending', '2026-07-15 14:01:54', '2026-07-15 14:01:54'),
(14, 40, '2026-07-03', '08:00:00', '09:30:00', 'Pengambilan Nilai Istima\' (Mendengar) Kelas XII', 'Melaksanakan ujian lisan aspek Istima\' (mendengarkan) untuk materi An-Nasyathat Al-Yaumiyah (Aktivitas Sehari-hari) menggunakan media audio, dilanjutkan dengan rekapitulasi nilai siswa.', NULL, 'pending', '2026-07-15 14:03:03', '2026-07-15 14:03:03'),
(15, 62, '2026-07-01', '08:00:00', '11:30:00', 'Pengelolaan Dan Pencatatan Surat Masuk dan Surat Keluar', 'Menerima, menyortir, dan melakukan registrasi surat dinas masuk ke dalam buku agenda surat, serta mendistribusikan lembar disposisi dari Kepala Sekolah kepada unit kerja terkait.', NULL, 'pending', '2026-07-15 14:06:32', '2026-07-15 14:06:32'),
(16, 62, '2026-07-02', '09:00:00', '00:00:00', 'Penataan dan Pengarsipan Dokumen Kepegawaian', 'Melakukan pemeliharaan arsip fisik dengan menyusun berkas SK (Surat Keputusan) mutasi dan kenaikan pangkat guru ke dalam filling cabinet berdasarkan abjad agar mudah ditemukan saat dibutuhkan.', NULL, 'pending', '2026-07-15 14:07:34', '2026-07-15 14:07:34'),
(17, 62, '2026-07-03', '08:30:00', '11:30:00', 'Pemutakhiran Data Digital Kepegawaian dan Struktur Organisasi', 'Melakukan pembaruan profil data pribadi dan masa kerja pegawai kontrak baru pada sistem kepegawaian internal sekolah guna memastikan database administrasi tetap akurat.', NULL, 'pending', '2026-07-15 14:08:59', '2026-07-15 14:08:59'),
(18, 37, '2026-07-01', '07:30:00', '09:30:00', 'Mengajar Mapel Fisika Kelas X (Materi Pengukuran)', 'Menyampaikan materi dasar mengenai Besaran dan Satuan. Menjelaskan cara membaca alat ukur jangka sorong dan mikrometer sekrup, serta mendampingi siswa melakukan latihan soal konversi satuan.', NULL, 'pending', '2026-07-15 14:13:43', '2026-07-15 14:13:43'),
(19, 37, '2026-07-02', '10:00:00', '00:00:00', 'Praktikum Fisika Kelas XI di Laboratorium Fisika', 'Membimbing siswa kelas XI melakukan praktikum kelompok mengenai Hukum Hooke menggunakan pegas dan beban gantung, serta memandu mereka dalam melakukan pencatatan data untuk laporan praktikum.', NULL, 'pending', '2026-07-15 14:15:03', '2026-07-15 14:15:03'),
(20, 37, '2026-07-03', '08:00:00', '10:00:00', 'Koreksi Laporan Praktikum dan Rekap Nilai Tugas', 'Memeriksa dan menilai laporan hasil praktikum Hukum Hooke yang telah dikumpulkan oleh siswa kelas XI, serta menginput nilai tugas tersebut ke dalam buku nilai harian.', NULL, 'pending', '2026-07-15 14:16:43', '2026-07-15 14:16:43'),
(21, 42, '2026-07-01', '07:30:00', '09:30:00', 'Mengajar Mapel MTK Kelas X (Materi Persamaan Kuadrat)', 'Menyampaikan konsep dasar persamaan kuadrat, menjelaskan metode penyelesaian menggunakan rumus kuadrat (rumus ABC) dan pemfaktoran, serta membimbing siswa mengerjakan latihan soal langsung di papan tulis.', NULL, 'pending', '2026-07-15 14:19:07', '2026-07-15 14:19:07'),
(22, 42, '2026-07-02', '10:10:00', '00:00:00', 'mengajar mata pelajaran matekmatika kelas XI (materi trigonometri)', 'Menjelaskan rumus jumlah dan selisih dua sudut pada fungsi trigonometri (sinus dan cosinus). Memberikan contoh soal pembuktian identitas trigonometri dan memandu diskusi kelompok siswa untuk menyelesaikan soal tantangan.', NULL, 'pending', '2026-07-15 14:20:21', '2026-07-15 14:20:21'),
(23, 42, '2026-07-03', '08:00:00', '10:00:00', 'mengajar mata pelajaran matekmatika kelas XII (materi peluang)', 'Menyampaikan materi aturan perkalian, permutasi, dan kombinasi. Menggunakan alat peraga dadu dan kartu bridge untuk mensimulasikan peluang kejadian majemuk secara langsung di kelas agar siswa lebih mudah paham.', NULL, 'pending', '2026-07-15 14:21:29', '2026-07-15 14:21:29'),
(24, 56, '2026-07-01', '08:00:00', '09:30:00', 'mengajar mata pelajaran seni rupa kelas X (materi seni rupa 2 dimensi)', 'Menyampaikan konsep dasar unsur seni rupa (garis, bidang, warna, dan tekstur) serta memandu siswa memulai draf gambar perspektif menggunakan media pensil di buku gambar masing-masing.', NULL, 'pending', '2026-07-15 14:24:21', '2026-07-15 14:24:21'),
(25, 56, '2026-07-02', '10:00:00', '00:00:00', 'Praktik seni musik kelas XI (alat musik tradisonal/modern)', 'Membimbing siswa kelas XI secara berkelompok mempraktikkan teknik dasar memainkan alat musik (seperti pianika atau gitar) untuk membawakan lagu daerah dengan tempo dan nada yang selaras.', NULL, 'pending', '2026-07-15 14:26:16', '2026-07-15 14:26:16'),
(26, 56, '2026-07-03', '08:00:00', '10:00:00', 'Mengajar seni tari kelas XII (materi eksplorasi gerak tari krasi)', 'Memperagakan ragam gerak tari kreasi nusantara kepada siswa kelas XII, serta mendampingi mereka melakukan eksplorasi gerak dasar berpasangan sesuai dengan ketukan iringan musik instrumen.', NULL, 'pending', '2026-07-15 14:28:50', '2026-07-15 14:28:50'),
(27, 53, '2026-07-01', '08:00:00', '09:30:00', 'Mengajar mapel sosiologi kelas X (materi sosialisasi)', 'Menyampaikan konsep dasar sosialisasi dan pembentukan kepribadian. Menjelaskan peran media sosialisasi (keluarga, teman sebaya, sekolah, dan media massa) serta memimpin diskusi interaktif mengenai pengaruh gadget terhadap interaksi sosial remaja saat ini.', NULL, 'pending', '2026-07-15 14:35:03', '2026-07-15 14:35:03'),
(28, 53, '2026-07-02', '10:00:00', '00:00:00', 'Mengajar mapel sosiologi kelas XI (materi konflik sosial)', 'Membahas faktor-faktor penyebab konflik sosial di masyarakat dan bentuk-bentuk akomodasi konflik (seperti mediasi dan arbitrase). Siswa diminta menganalisis studi kasus konflik sederhana melalui diskusi kelompok.', NULL, 'pending', '2026-07-15 14:38:46', '2026-07-15 14:38:46'),
(29, 53, '2026-07-03', '08:00:00', '10:00:00', 'Pembimbingan penelitian sosial sederhana kelas XII', 'Membahas faktor-faktor penyebab konflik sosial di masyarakat dan bentuk-bentuk akomodasi konflik (seperti mediasi dan arbitrase). Siswa diminta menganalisis studi kasus konflik sederhana melalui diskusi kelompok.', NULL, 'pending', '2026-07-15 14:39:55', '2026-07-15 14:39:55'),
(30, 55, '2026-07-16', '10:00:00', '00:00:00', 'mengajar mata pelajaran matekmatika', 'mengajar matematika kelas 12', NULL, 'disetujui', '2026-07-16 07:58:13', '2026-07-16 08:08:50'),
(31, 68, '2026-07-17', '01:52:00', '01:52:00', 'cvcv', 'vcv', '1784227982_download_(16).jpg', 'pending', '2026-07-16 18:53:02', '2026-07-16 18:53:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporans`
--

CREATE TABLE `laporans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pegawai` bigint(20) UNSIGNED DEFAULT NULL,
  `id_jabatan` bigint(20) UNSIGNED DEFAULT NULL,
  `id_pendidikan` bigint(20) UNSIGNED DEFAULT NULL,
  `id_pensiun` bigint(20) UNSIGNED DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tgl_laporan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporans`
--

INSERT INTO `laporans` (`id`, `id_pegawai`, `id_jabatan`, `id_pendidikan`, `id_pensiun`, `catatan`, `tgl_laporan`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:46:36', '2026-06-06 17:46:36'),
(2, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:46:36', '2026-06-06 17:46:36'),
(3, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:46:36', '2026-06-06 17:46:36'),
(4, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:46:36', '2026-06-06 17:46:36'),
(5, NULL, NULL, NULL, 1, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:47:22', '2026-06-06 17:47:22'),
(6, NULL, NULL, NULL, 2, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:47:22', '2026-06-06 17:47:22'),
(7, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:53:13', '2026-06-06 17:53:13'),
(8, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:53:13', '2026-06-06 17:53:13'),
(9, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:53:13', '2026-06-06 17:53:13'),
(10, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:53:13', '2026-06-06 17:53:13'),
(11, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:03', '2026-06-06 17:59:03'),
(12, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:03', '2026-06-06 17:59:03'),
(13, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:03', '2026-06-06 17:59:03'),
(14, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:03', '2026-06-06 17:59:03'),
(15, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:21', '2026-06-06 17:59:21'),
(16, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:21', '2026-06-06 17:59:21'),
(17, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:21', '2026-06-06 17:59:21'),
(18, NULL, NULL, NULL, NULL, 'Laporan dicetak secara sistem.', '2026-06-07', '2026-06-06 17:59:21', '2026-06-06 17:59:21'),
(19, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:03:23', '2026-06-06 18:03:23'),
(20, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:03:23', '2026-06-06 18:03:23'),
(21, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:03:23', '2026-06-06 18:03:23'),
(22, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:03:23', '2026-06-06 18:03:23'),
(23, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:04:23', '2026-06-06 18:04:23'),
(24, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:04:23', '2026-06-06 18:04:23'),
(25, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:04:23', '2026-06-06 18:04:23'),
(26, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:04:23', '2026-06-06 18:04:23'),
(27, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:06:11', '2026-06-06 18:06:11'),
(28, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:06:11', '2026-06-06 18:06:11'),
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
(41, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:07:14', '2026-06-06 18:07:14'),
(42, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:08:28', '2026-06-06 18:08:28'),
(43, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:08:28', '2026-06-06 18:08:28'),
(44, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:08:28', '2026-06-06 18:08:28'),
(45, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:08:28', '2026-06-06 18:08:28'),
(46, NULL, NULL, NULL, NULL, 'oke', '2026-06-07', '2026-06-06 18:13:36', '2026-06-06 18:13:36'),
(47, NULL, NULL, NULL, NULL, 'oke', '2026-06-07', '2026-06-06 18:13:36', '2026-06-06 18:13:36'),
(48, NULL, NULL, NULL, NULL, 'oke', '2026-06-07', '2026-06-06 18:13:36', '2026-06-06 18:13:36'),
(49, NULL, NULL, NULL, NULL, 'oke', '2026-06-07', '2026-06-06 18:13:36', '2026-06-06 18:13:36'),
(50, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:14:54', '2026-06-06 18:14:54'),
(51, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 18:14:54', '2026-06-06 18:14:54'),
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
(64, NULL, 7, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-07', '2026-06-06 19:07:16', '2026-06-06 19:07:16'),
(65, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-21', '2026-06-21 06:30:46', '2026-06-21 06:30:46'),
(66, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-21', '2026-06-21 06:30:46', '2026-06-21 06:30:46'),
(67, NULL, NULL, NULL, NULL, 'Pegawai ini telah menginput 1 kegiatan harian. (1 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-06-21', '2026-06-21 07:43:19', '2026-06-21 07:43:19'),
(68, NULL, NULL, NULL, NULL, 'Pegawai ini telah menginput 1 kegiatan harian. (1 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-06-21', '2026-06-21 07:45:19', '2026-06-21 07:45:19'),
(69, NULL, NULL, NULL, NULL, 'Pegawai ini telah menginput 1 kegiatan harian. (1 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-06-21', '2026-06-21 07:45:56', '2026-06-21 07:45:56'),
(70, NULL, NULL, NULL, NULL, 'Pegawai ini telah menginput 1 kegiatan harian. (1 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-06-21', '2026-06-21 07:47:25', '2026-06-21 07:47:25'),
(71, NULL, NULL, NULL, 1, 'Laporan diekspor oleh sistem.', '2026-06-21', '2026-06-21 08:27:52', '2026-06-21 08:27:52'),
(72, NULL, NULL, NULL, 3, 'Laporan diekspor oleh sistem.', '2026-06-21', '2026-06-21 08:27:52', '2026-06-21 08:27:52'),
(73, NULL, NULL, NULL, 1, 'Laporan diekspor oleh sistem.', '2026-06-21', '2026-06-21 08:28:17', '2026-06-21 08:28:17'),
(74, NULL, NULL, NULL, 3, 'Laporan diekspor oleh sistem.', '2026-06-21', '2026-06-21 08:28:17', '2026-06-21 08:28:17'),
(75, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:33:18', '2026-06-24 17:33:18'),
(76, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:33:18', '2026-06-24 17:33:18'),
(77, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:33:18', '2026-06-24 17:33:18'),
(78, NULL, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:35:35', '2026-06-24 17:35:35'),
(79, NULL, NULL, NULL, NULL, 'Pegawai ini telah menginput 1 kegiatan harian. (1 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:35:35', '2026-06-24 17:35:35'),
(80, NULL, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:35:35', '2026-06-24 17:35:35'),
(81, NULL, NULL, 2, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:35:56', '2026-06-24 17:35:56'),
(82, NULL, NULL, 4, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:35:56', '2026-06-24 17:35:56'),
(83, NULL, NULL, 6, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:35:56', '2026-06-24 17:35:56'),
(84, NULL, NULL, 7, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:35:56', '2026-06-24 17:35:56'),
(85, NULL, 1, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:36:10', '2026-06-24 17:36:10'),
(86, NULL, 2, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:36:10', '2026-06-24 17:36:10'),
(87, NULL, 4, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:36:10', '2026-06-24 17:36:10'),
(88, NULL, 6, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:36:10', '2026-06-24 17:36:10'),
(89, NULL, 7, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:36:10', '2026-06-24 17:36:10'),
(90, NULL, 8, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:36:10', '2026-06-24 17:36:10'),
(91, NULL, 9, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:36:10', '2026-06-24 17:36:10'),
(92, NULL, 10, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:36:10', '2026-06-24 17:36:10'),
(93, NULL, 11, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:36:10', '2026-06-24 17:36:10'),
(94, NULL, 12, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:36:10', '2026-06-24 17:36:10'),
(95, NULL, 13, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:36:10', '2026-06-24 17:36:10'),
(96, NULL, 14, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:36:10', '2026-06-24 17:36:10'),
(97, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:36:24', '2026-06-24 17:36:24'),
(98, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:36:24', '2026-06-24 17:36:24'),
(99, NULL, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-06-25', '2026-06-24 17:36:24', '2026-06-24 17:36:24'),
(100, 12, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(101, 13, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(102, 14, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(103, 15, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(104, 16, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(105, 17, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(106, 18, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(107, 19, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(108, 20, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(109, 21, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(110, 22, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(111, 23, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(112, 24, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(113, 25, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(114, 26, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(115, 27, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(116, 28, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(117, 29, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(118, 30, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(119, 31, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(120, 32, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(121, 33, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(122, 34, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(123, 35, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(124, 36, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(125, 37, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(126, 38, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(127, 39, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(128, 40, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(129, 41, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(130, 42, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(131, 43, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(132, 44, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(133, 45, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(134, 46, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(135, 47, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(136, 48, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(137, 49, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(138, 50, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(139, 51, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(140, 52, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(141, 53, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(142, 54, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(143, 55, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(144, 56, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(145, 57, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(146, 58, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(147, 59, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(148, 60, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(149, 61, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:26', '2026-07-15 12:58:26'),
(150, NULL, 1, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:41', '2026-07-15 12:58:41'),
(151, NULL, 2, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:41', '2026-07-15 12:58:41'),
(152, NULL, 4, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:41', '2026-07-15 12:58:41'),
(153, NULL, 6, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:41', '2026-07-15 12:58:41'),
(154, NULL, 7, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:41', '2026-07-15 12:58:41'),
(155, NULL, 8, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:41', '2026-07-15 12:58:41'),
(156, NULL, 9, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:41', '2026-07-15 12:58:41'),
(157, NULL, 10, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:41', '2026-07-15 12:58:41'),
(158, NULL, 11, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:41', '2026-07-15 12:58:41'),
(159, NULL, 12, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:41', '2026-07-15 12:58:41'),
(160, NULL, 13, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:41', '2026-07-15 12:58:41'),
(161, NULL, 14, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:41', '2026-07-15 12:58:41'),
(162, NULL, NULL, 6, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(163, NULL, NULL, 7, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(164, NULL, NULL, 8, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(165, NULL, NULL, 9, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(166, NULL, NULL, 10, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(167, NULL, NULL, 11, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(168, NULL, NULL, 12, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(169, NULL, NULL, 13, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(170, NULL, NULL, 14, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(171, NULL, NULL, 15, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(172, NULL, NULL, 16, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(173, NULL, NULL, 17, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(174, NULL, NULL, 18, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(175, NULL, NULL, 19, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(176, NULL, NULL, 20, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(177, NULL, NULL, 21, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(178, NULL, NULL, 22, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(179, NULL, NULL, 23, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(180, NULL, NULL, 24, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(181, NULL, NULL, 25, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(182, NULL, NULL, 26, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(183, NULL, NULL, 27, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(184, NULL, NULL, 28, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(185, NULL, NULL, 29, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(186, NULL, NULL, 30, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(187, NULL, NULL, 31, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(188, NULL, NULL, 32, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(189, NULL, NULL, 33, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(190, NULL, NULL, 34, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(191, NULL, NULL, 35, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(192, NULL, NULL, 36, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(193, NULL, NULL, 37, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(194, NULL, NULL, 38, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(195, NULL, NULL, 39, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(196, NULL, NULL, 40, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(197, NULL, NULL, 41, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(198, NULL, NULL, 42, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(199, NULL, NULL, 43, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(200, NULL, NULL, 44, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(201, NULL, NULL, 45, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(202, NULL, NULL, 46, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(203, NULL, NULL, 47, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(204, NULL, NULL, 48, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(205, NULL, NULL, 49, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(206, NULL, NULL, 50, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(207, NULL, NULL, 51, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(208, NULL, NULL, 52, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(209, NULL, NULL, 53, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(210, NULL, NULL, 54, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(211, NULL, NULL, 55, NULL, 'Laporan diekspor oleh sistem.', '2026-07-15', '2026-07-15 12:58:59', '2026-07-15 12:58:59'),
(212, 12, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(213, 13, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(214, 14, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(215, 15, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(216, 16, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(217, 17, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(218, 18, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(219, 19, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(220, 20, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(221, 21, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(222, 22, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(223, 23, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(224, 24, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(225, 25, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(226, 26, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(227, 27, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(228, 28, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(229, 29, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(230, 30, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(231, 31, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(232, 32, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(233, 33, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(234, 34, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(235, 35, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(236, 36, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(237, 37, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(238, 38, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(239, 39, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(240, 40, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(241, 41, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(242, 42, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(243, 43, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(244, 44, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(245, 45, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(246, 46, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(247, 47, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(248, 48, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(249, 49, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(250, 50, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(251, 51, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(252, 52, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(253, 53, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(254, 54, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(255, 55, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(256, 56, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(257, 57, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(258, 58, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:04', '2026-07-16 07:55:04'),
(259, 59, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:05', '2026-07-16 07:55:05'),
(260, 60, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:05', '2026-07-16 07:55:05'),
(261, 61, NULL, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:05', '2026-07-16 07:55:05'),
(262, NULL, 1, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:24', '2026-07-16 07:55:24'),
(263, NULL, 2, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:24', '2026-07-16 07:55:24'),
(264, NULL, 4, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:24', '2026-07-16 07:55:24'),
(265, NULL, 6, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:24', '2026-07-16 07:55:24'),
(266, NULL, 7, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:24', '2026-07-16 07:55:24'),
(267, NULL, 8, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:24', '2026-07-16 07:55:24'),
(268, NULL, 9, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:24', '2026-07-16 07:55:24'),
(269, NULL, 10, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:24', '2026-07-16 07:55:24'),
(270, NULL, 11, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:24', '2026-07-16 07:55:24'),
(271, NULL, 12, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:24', '2026-07-16 07:55:24'),
(272, NULL, 13, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:24', '2026-07-16 07:55:24'),
(273, NULL, 14, NULL, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:24', '2026-07-16 07:55:24'),
(274, NULL, NULL, 6, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(275, NULL, NULL, 7, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(276, NULL, NULL, 8, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(277, NULL, NULL, 9, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(278, NULL, NULL, 10, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(279, NULL, NULL, 11, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(280, NULL, NULL, 12, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(281, NULL, NULL, 13, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(282, NULL, NULL, 14, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(283, NULL, NULL, 15, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(284, NULL, NULL, 16, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(285, NULL, NULL, 17, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(286, NULL, NULL, 18, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(287, NULL, NULL, 19, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(288, NULL, NULL, 20, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(289, NULL, NULL, 21, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(290, NULL, NULL, 22, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(291, NULL, NULL, 23, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(292, NULL, NULL, 24, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(293, NULL, NULL, 25, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(294, NULL, NULL, 26, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(295, NULL, NULL, 27, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(296, NULL, NULL, 28, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(297, NULL, NULL, 29, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(298, NULL, NULL, 30, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(299, NULL, NULL, 31, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(300, NULL, NULL, 32, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(301, NULL, NULL, 33, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(302, NULL, NULL, 34, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(303, NULL, NULL, 35, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(304, NULL, NULL, 36, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(305, NULL, NULL, 37, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(306, NULL, NULL, 38, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(307, NULL, NULL, 39, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(308, NULL, NULL, 40, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(309, NULL, NULL, 41, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(310, NULL, NULL, 42, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(311, NULL, NULL, 43, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(312, NULL, NULL, 44, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(313, NULL, NULL, 45, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(314, NULL, NULL, 46, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(315, NULL, NULL, 47, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(316, NULL, NULL, 48, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(317, NULL, NULL, 49, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(318, NULL, NULL, 50, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(319, NULL, NULL, 51, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(320, NULL, NULL, 52, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(321, NULL, NULL, 53, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(322, NULL, NULL, 54, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(323, NULL, NULL, 55, NULL, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:38', '2026-07-16 07:55:38'),
(324, NULL, NULL, NULL, 8, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(325, NULL, NULL, NULL, 9, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(326, NULL, NULL, NULL, 10, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(327, NULL, NULL, NULL, 11, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(328, NULL, NULL, NULL, 12, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(329, NULL, NULL, NULL, 13, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(330, NULL, NULL, NULL, 14, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(331, NULL, NULL, NULL, 15, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(332, NULL, NULL, NULL, 16, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(333, NULL, NULL, NULL, 17, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(334, NULL, NULL, NULL, 18, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(335, NULL, NULL, NULL, 19, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(336, NULL, NULL, NULL, 20, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(337, NULL, NULL, NULL, 21, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(338, NULL, NULL, NULL, 22, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(339, NULL, NULL, NULL, 23, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(340, NULL, NULL, NULL, 24, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(341, NULL, NULL, NULL, 25, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(342, NULL, NULL, NULL, 26, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(343, NULL, NULL, NULL, 27, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(344, NULL, NULL, NULL, 28, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(345, NULL, NULL, NULL, 29, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(346, NULL, NULL, NULL, 30, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(347, NULL, NULL, NULL, 31, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:51', '2026-07-16 07:55:51'),
(348, NULL, NULL, NULL, 32, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(349, NULL, NULL, NULL, 33, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(350, NULL, NULL, NULL, 34, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(351, NULL, NULL, NULL, 35, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(352, NULL, NULL, NULL, 36, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(353, NULL, NULL, NULL, 37, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(354, NULL, NULL, NULL, 38, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(355, NULL, NULL, NULL, 39, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(356, NULL, NULL, NULL, 40, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(357, NULL, NULL, NULL, 41, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(358, NULL, NULL, NULL, 42, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(359, NULL, NULL, NULL, 43, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(360, NULL, NULL, NULL, 44, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(361, NULL, NULL, NULL, 45, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(362, NULL, NULL, NULL, 46, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(363, NULL, NULL, NULL, 47, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(364, NULL, NULL, NULL, 48, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(365, NULL, NULL, NULL, 49, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(366, NULL, NULL, NULL, 50, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(367, NULL, NULL, NULL, 51, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(368, NULL, NULL, NULL, 52, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(369, NULL, NULL, NULL, 53, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(370, NULL, NULL, NULL, 54, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(371, NULL, NULL, NULL, 55, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(372, NULL, NULL, NULL, 56, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(373, NULL, NULL, NULL, 57, 'Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:55:52', '2026-07-16 07:55:52'),
(374, 12, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(375, 13, NULL, NULL, NULL, 'Pegawai ini telah menginput 1 kegiatan harian. (0 Disetujui, 1 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(376, 14, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(377, 15, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(378, 16, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(379, 17, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(380, 18, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(381, 19, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(382, 20, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(383, 21, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(384, 22, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(385, 23, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(386, 24, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(387, 25, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(388, 26, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(389, 27, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(390, 28, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(391, 29, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(392, 30, NULL, NULL, NULL, 'Pegawai ini telah menginput 3 kegiatan harian. (0 Disetujui, 3 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(393, 31, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02');
INSERT INTO `laporans` (`id`, `id_pegawai`, `id_jabatan`, `id_pendidikan`, `id_pensiun`, `catatan`, `tgl_laporan`, `created_at`, `updated_at`) VALUES
(394, 32, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(395, 33, NULL, NULL, NULL, 'Pegawai ini telah menginput 3 kegiatan harian. (0 Disetujui, 3 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(396, 34, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(397, 35, NULL, NULL, NULL, 'Pegawai ini telah menginput 3 kegiatan harian. (0 Disetujui, 3 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(398, 36, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(399, 37, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(400, 38, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(401, 39, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(402, 40, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(403, 41, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(404, 42, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(405, 43, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(406, 44, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(407, 45, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(408, 46, NULL, NULL, NULL, 'Pegawai ini telah menginput 3 kegiatan harian. (0 Disetujui, 3 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(409, 47, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(410, 48, NULL, NULL, NULL, 'Pegawai ini telah menginput 5 kegiatan harian. (1 Disetujui, 3 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(411, 49, NULL, NULL, NULL, 'Pegawai ini telah menginput 3 kegiatan harian. (0 Disetujui, 3 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(412, 50, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(413, 51, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(414, 52, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(415, 53, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(416, 54, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(417, 55, NULL, NULL, NULL, 'Pegawai ini telah menginput 3 kegiatan harian. (0 Disetujui, 3 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(418, 56, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(419, 57, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(420, 58, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(421, 59, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(422, 60, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02'),
(423, 61, NULL, NULL, NULL, 'Pegawai ini telah menginput 0 kegiatan harian. (0 Disetujui, 0 Pending). \nCatatan Tambahan Admin: Laporan diekspor oleh sistem.', '2026-07-16', '2026-07-16 07:56:02', '2026-07-16 07:56:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
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
(7, '2026_06_06_235041_create_pensiuns_table', 3),
(8, '2026_06_21_130047_create_kegiatans_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nuptk` varchar(225) DEFAULT NULL,
  `nama` varchar(150) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Khonghucu') NOT NULL,
  `alamat` text NOT NULL,
  `foto` text DEFAULT NULL,
  `no_telp` varchar(15) NOT NULL,
  `status_pegawai` enum('PNS','NON-PNS','GTT','GTY','ASN','PPPK') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_sertifikasi` enum('sertifikasi','belum_sertifikasi') DEFAULT NULL,
  `nomor_sertifikasi` varchar(59) DEFAULT NULL,
  `serdik_no` varchar(59) DEFAULT NULL,
  `bidang_studi` varchar(225) DEFAULT NULL,
  `prodi_terakhir` varchar(225) DEFAULT NULL,
  `mapel_ampu` varchar(225) DEFAULT NULL,
  `beban_ajar` int(11) DEFAULT NULL,
  `tugas_tambahan` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawais`
--

INSERT INTO `pegawais` (`id`, `user_id`, `jabatan_id`, `nip`, `nuptk`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `alamat`, `foto`, `no_telp`, `status_pegawai`, `created_at`, `updated_at`, `status_sertifikasi`, `nomor_sertifikasi`, `serdik_no`, `bidang_studi`, `prodi_terakhir`, `mapel_ampu`, `beban_ajar`, `tugas_tambahan`) VALUES
(12, 19, 1, '196707081993031006', '196707081993031006', 'Drs WARSAM M.Pd', 'Banyumas', '1967-07-08', 'L', 'Islam', 'Gondang RT. 17 RW. 04 Watumalang, Wonosobo', '1784007738_WhatsApp_Image_2026-07-13_at_15.00.12.jpeg', '08121573099', 'PNS', '2026-06-30 13:06:31', '2026-07-14 05:58:01', 'belum_sertifikasi', NULL, NULL, 'Magister Pendidikan', 'S2/Magister', NULL, 7, 'Guru'),
(13, 20, 10, '196903101989122001', '196903101989122001', 'Dra. Mu\'tamidah', 'Banjarnegara', '2000-03-14', 'P', 'Islam', 'Munggah Bawah RT. 06/11 Kalibeber Mojotengah Wonosobo', '1784008051_MU\'TAMIDAH.JPG', '081327589070', 'PNS', '2026-06-30 13:09:08', '2026-07-14 06:03:56', 'sertifikasi', NULL, NULL, NULL, 'Ilmu Fikih', 'Fikih', 7, NULL),
(14, 21, 6, '196603301992032002', '5662744646300012', 'Tri Maya Atmi Rahayu, S.Pd.', 'Wonosobo', '1966-03-30', 'P', 'Islam', 'Bugangan, RT/01/IV Kalianget Wonosobo', '1784008638_TRI_MAYA_ATMI_RAHAYU.JPG', '081327035566', 'PNS', '2026-07-14 05:57:18', '2026-07-14 05:57:18', 'sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Fiqih', 7, NULL),
(15, 22, 6, '196608181993032001', '7150744647300013', 'Titin Sumarni, S.Pd.', 'Wonosobo', '1996-08-18', 'P', 'Islam', 'Jawar RT.01/03 Bumirejo Mojotengah Wonosobo', '1784009012_TITIN_SUMARNI.JPG', '085326946065', 'PNS', '2026-07-14 06:03:32', '2026-07-14 06:03:32', 'sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi B.Indonesia', 7, NULL),
(16, 23, 6, '196808251993031002', '2157746648200013', 'Fatah Yasin, S.Pd.', 'Wonosobo', '1968-08-25', 'L', 'Islam', 'Kalibeber RT.05/13 Mojotengah, Wonosobo', '1784011660_FATAH_YASIN.JPG', '085385276345', 'PNS', '2026-07-14 06:47:40', '2026-07-14 06:47:40', 'sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi B.Inggris', 7, NULL),
(17, 24, 10, '196509131994032001', '8245743644300043', 'Dra. Suprahmiyati', 'Wonosobo', '1965-09-13', 'P', 'Islam', 'Selokromo, RT.01/07 Leksono, Wonosobo', '1784011935_SUPRAHMIYATI.JPG', '085113372195', 'PNS', '2026-07-14 06:52:15', '2026-07-14 06:52:15', 'sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi Bimbingan dan Konseling', 7, NULL),
(18, 25, 6, '197109091998032001', '2241749652300003', 'Sri Haryati, S.Pd.', 'Wonosobo', '1971-09-09', 'P', 'Islam', 'Weronsari, RT.04/04 Jalantoro, Wonosobo', '1784012239_SRI_HARYATI.JPG', '082325698444', 'PNS', '2026-07-14 06:57:19', '2026-07-14 06:57:19', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi Biologi', 7, NULL),
(19, 26, 6, '197701212003121004', '1453755655200002', 'Sudiyanto, S.Ag, M.S.I', 'Tegal', '1977-01-21', 'L', 'Islam', 'Jambean RT.01/09 Kalibeber, Mojotengah, Wonosobo', NULL, '08112615031', 'PNS', '2026-07-14 07:03:29', '2026-07-14 07:03:29', 'sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi Al-Qur\'an Hadist', 7, NULL),
(20, 27, 6, '197109152005012002', '2247749651300023', 'Dwi Handajani S.Pd.', 'Semarang', '1971-09-15', 'P', 'Islam', 'Ngaglik, RT.04/04 Pancurwening, Wonosobo', '1784012839_DWI_HANDAJANI.JPG', '081226320735', 'PNS', '2026-07-14 07:07:19', '2026-07-14 18:26:45', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi Kimia', 7, NULL),
(21, 28, 6, '198206302005011005', '5962760661200002', 'Rofingul Khusnu Karim S.Pd.', 'Wonosobo', '1982-06-20', 'L', 'Islam', 'Kalierang, RT.03/04 Semerto, Wonosobo', '1784013015_ROFINGUL_KHUSNU_KARIM.JPG', '081326856385', 'PNS', '2026-07-14 07:10:15', '2026-07-14 18:27:29', 'sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi Matematika', 7, NULL),
(22, 29, 6, '196803172005011001', NULL, 'Pardi, S.Pd.', 'Ngawi', '1968-03-17', 'L', 'Islam', 'Kp.Sariagung RT.04/10 Wonosobo', '1784013194_PARDI.JPG', '087738391648', 'PNS', '2026-07-14 07:13:14', '2026-07-14 07:13:14', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi PPKN', 7, NULL),
(23, 30, 6, '197301232000031003', '4455751653200002', 'Yusuf Hardiyono, S.Ag., M.S.I', 'Banjarnegara', '1973-01-23', 'L', 'Islam', 'Bojanegara, RT.06/02 Sigaluh, Banjarnegara', '1784013917_YUSUF_HADIYONO.JPG', '082221516100', 'PNS', '2026-07-14 07:25:17', '2026-07-14 18:46:38', 'sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Sejarah Kebudayaan Islam', 7, NULL),
(24, 31, 6, '197312062005012001', '6538751653300083', 'Nur Azizah Perawati, S.Ag., M.S.I.', 'Temanggung', '1970-12-06', 'P', 'Islam', 'Perum Wonosari Indah RT.01/04 Wonosobo', '1784016948_NUR_AZIZAH_PERAWATI.JPG', '085227339516', 'PNS', '2026-07-14 08:15:48', '2026-07-14 18:46:10', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Pada MAN 2 Wonosoboi', 7, NULL),
(25, 32, 6, '197502232005012002', '6555753655300002', 'Ratna Nurul Fauziah, S.E., M.M', 'Wonosobo', '1975-02-23', 'P', 'Islam', 'Betengsari RT.03/12 Wonosobo', '1784017089_RATNA_NURUL_FAUZIAH.JPG', '081226320735', 'PNS', '2026-07-14 08:18:09', '2026-07-14 18:47:05', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi Ekonomi', 7, NULL),
(26, 33, 6, '197006202003122001', '8952748650300012', 'Nur Eka Retnaningsih, S.Pd.', 'Wonosobo', '1970-06-20', 'P', 'Islam', 'Munggangsari RT.02/11 Kepil, Wonosobo', '1784017260_NUR_EKA_RETNANINGSIH.JPG', '082221516100', 'PNS', '2026-07-14 08:21:00', '2026-07-14 18:45:45', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi Sejarah', 7, NULL),
(27, 34, 6, '197206172005012005', '4949750653200002', 'Hanief Nur Widhianti, S.Ag', 'magelang', '1972-06-17', 'P', 'Islam', 'Rowopeni Gang Handayani, Wonosobo', '1784017428_HANIEF_NUR_WIDHIANTI.JPG', '081393033956', 'PNS', '2026-07-14 08:23:48', '2026-07-14 18:45:19', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi B.Arab', 7, NULL),
(28, 35, 6, '198012292005012002', '9561758660300003', 'Palupi Sulistyorini, S.Pd.', 'Wonosobo', '1980-12-29', 'P', 'Islam', 'Tieng RT.01/04 Kejajar, Wonosobo', '1784017586_PALUPI_SULISTYORINI.JPG', '082136200934', 'PNS', '2026-07-14 08:26:26', '2026-07-14 18:44:50', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi Geografi', 7, NULL),
(29, 36, 6, '197406242006042027', '0956752653300012', 'Laeli Nugraheni Herawati, S.Pd.', 'Wonosobo', '1974-06-24', 'P', 'Islam', 'Tosarirejo RT.08/06 Wonosobo', '1784017775_LAELI_NUGRAHENI_HERAWATI.JPG', '081328038001', 'PNS', '2026-07-14 08:29:35', '2026-07-14 18:44:21', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi Kimia', 7, NULL),
(30, 37, 6, '197603082005012005', '8640754655210082', 'Alifiyah Hidayatun, S.Pd.,M.Pd.', 'Wonosobo', '1976-03-08', 'P', 'Islam', 'Kalierang RT.02/04 Selomerto, Wonosobo', NULL, '081328925380', 'PNS', '2026-07-14 08:36:49', '2026-07-14 18:43:50', 'sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi Fisika', 7, NULL),
(31, 38, 6, '198007312005011001', '3063758660110033', 'Setiyo, S.Pd.', 'Wonosobo', '1980-07-31', 'L', 'Islam', 'Bangon, Sojokerto, Leksono, Wonosobo', '1784018343_SETIYO.JPG', '082135454745', 'PNS', '2026-07-14 08:39:03', '2026-07-14 18:43:20', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi Pendidikan Jasmani', 7, NULL),
(32, 39, 6, '197902092006042014', '7541757658300002', 'Inawati, S.Si', 'Wonosobo', '1979-09-02', 'P', 'Islam', 'Kauman Selatan No. 148 RT. 07/13 Wonosobo', '1784041371_INAWATI.JPG', '085229355626', 'PNS', '2026-07-14 15:02:51', '2026-07-14 18:42:44', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Madya Bidang Studi Biologi', 7, NULL),
(33, 40, 6, '197603282007011019', '6660754655200002', 'Adrodin Irawan, S.Ag., M.Pd', 'Semarang', '1976-03-28', 'L', 'Islam', 'Munggang Bawah RT.02/11 Kalibeber Mojotengah Wonosobo', '1784042366_ADRODIN_IRAWAN.JPG', '081327176326', 'PNS', '2026-07-14 15:19:26', '2026-07-14 18:42:18', 'sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Muda Bidang Studi  Bahasa Arab', 7, NULL),
(34, 41, 6, '197507232007101001', '4055753655200003', 'Turoekhan, S.Ag', 'Kudus', '1975-07-23', 'L', 'Islam', 'Bumen Bumirejo Mojotengah Wonosobo', '1784042978_TUROEKHAN.JPG', '085227690698', 'PNS', '2026-07-14 15:29:38', '2026-07-14 18:41:49', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Muda Bidang Studi Bahasa Arab', 7, NULL),
(35, 42, 6, '198106042007102003', '4936759660300012', 'Dewi Retnowati, S.Pd', 'Sragen', '1981-06-04', 'P', 'Islam', 'Perumahan Purnamandala RT.07/05 Wonosobo', '1784043169_DEWI_RENOWATI.JPG', '085227248608', 'PNS', '2026-07-14 15:32:49', '2026-07-14 18:41:14', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Muda Bidang Studi Matematika', 7, NULL),
(36, 43, 6, '198201102007102004', '5442760660300002', 'Dwiyanti Theresiani, S.Pd', 'Wonosobo', '1982-01-10', 'P', 'Islam', 'Tegalsari RT.02/02 Garung Wonosobo', '1784043352_DWIYANTI_THERESIANI.JPG', '08121546182', 'PNS', '2026-07-14 15:35:52', '2026-07-14 18:40:39', 'sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Muda Bidang Studi Ekonomi', 7, NULL),
(37, 44, 6, '198001162007101001', '5448758660200002', 'Nunung Indriyatmaka, S.Pd', 'Sleman', '1980-01-16', 'L', 'Islam', 'Sempol, RT.01/09 Kalikajar, Wonosobo', '1784120008_nunung_indriyatmaka.jpeg', '081578795345', 'PNS', '2026-07-14 15:42:27', '2026-07-15 12:53:28', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Muda Bidang Studi Bahasa Indonesia', 7, NULL),
(38, 45, 6, '197111062007101001', '3438749652200003', 'Subandi, S.Pd.', 'Wonosobo', '1971-11-06', 'L', 'Islam', 'Selokromo, RT.01/07 Leksono, Wonosobo', '1784043937_SUBANDI.JPG', '085228370761', 'PNS', '2026-07-14 15:45:37', '2026-07-14 18:39:43', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Muda Bidang Studi  Bahasa Daerah', 7, NULL),
(39, 46, 6, '198002082007101001', '4540758660200002', 'Sibyan Hidayatullah, S.Pd.I.', 'Wonosobo', '1980-02-08', 'L', 'Islam', 'Mergosari RT.01/04 Sukoharjo, Wonosobo', '1784044137_SIBYAN_HIDAYATULLAH.JPG', '081327436977', 'PNS', '2026-07-14 15:48:57', '2026-07-14 18:39:17', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Muda Bidang Studi Fiqih7', 7, NULL),
(40, 47, 6, '198305302009122006', '2862761662300062', 'Supadmi, S.Si', 'Purworejo', '1983-05-30', 'P', 'Islam', 'Desa Tepus Wetan RT.02/04, Kutoarjo, Purworejo', '1784044362_SUPADMI.JPG', '085240641603', 'PNS', '2026-07-14 15:52:42', '2026-07-14 18:38:43', 'sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Muda Bidang Studi  Biologi', 7, NULL),
(41, 48, 6, '196905222007012021', '6854747649210082', 'Nur Komariyah, S.T.', 'Temanggung', '1969-05-22', 'P', 'Islam', 'Krasak RT.04/04, Mojotengah, Wonosobo', '1784044524_NUR_KOMARIYAH.JPG', '081329058145', 'PNS', '2026-07-14 15:55:24', '2026-07-14 18:38:15', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Muda Bidang Studi Kimia', 7, NULL),
(42, 49, 6, '197409142007012023', '1246752663300003', 'Khusna Arifah, S.Ag', 'Wonosobo', '1974-09-14', 'P', 'Islam', 'Mekarsari RT.04/13 Kalibeber, Mojotengah, Wonosobo', '1784044826_KHUSNA_ARIFAH.JPG', '081328071580', 'PNS', '2026-07-14 16:00:26', '2026-07-14 18:37:47', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Muda Bidang Studi  Akidah Akhlaq', 7, NULL),
(43, 50, 6, '197009042007011027', '9236748651200003', 'Muchamad Chabib, S.Pd.I', 'Wonosobo', '1970-09-04', 'L', 'Islam', 'Siwuran, RT.03/01, Garung, Wonosobo', '1784047327_MUCHAMAD_CHABIB.JPG', '085229422410', 'PNS', '2026-07-14 16:42:07', '2026-07-14 18:37:14', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Muda', 7, NULL),
(44, 51, 6, '197003042007012031', '2636748650300092', 'Diroyatul Mufidah, S.Ag', 'Banyumas', '1970-03-04', 'P', 'Islam', 'Wilayu, RT.02/01 Selomerto, Wonosobo', '1784047528_DIROYATUL_MUFIDAH.JPG', '085879953284', 'PNS', '2026-07-14 16:45:28', '2026-07-14 18:36:44', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'guru ahli muda', 7, NULL),
(45, 52, 6, '198210232023211011', '3355760661200003', 'M. Taufiq Windaryanto, M.Pd.', 'Wonosobo', '1982-10-23', 'L', 'Islam', 'Ngarenan, RT.01/05 Ropoh, Kepil, Wonosobo', '1784047741_M._TAUFIK_WINDARYANTO.JPG', '081328652396', 'PPPK', '2026-07-14 16:49:01', '2026-07-14 18:36:19', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Pertama Bidang Studi Sejarah Kebudayaan Islam', 7, NULL),
(46, 53, 6, '197409142023212005', '7246752653300003', 'Eko Noor Hidayati, S.Sos', 'Blora', '1974-09-14', 'P', 'Islam', 'Tieng, Krajan RT.01/07 Kejajar, Wonosobo', '1784047915_EKO_NOOR_HIDAYATI.JPG', '082322048352', 'PPPK', '2026-07-14 16:51:55', '2026-07-14 18:35:47', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Pertama Bidang Studi Sosiologi', 7, NULL),
(47, 54, 6, '198008272023211009', '1159758659200033', 'Ma\'waladib, S.H.I.', 'Wonosobo', '1980-08-27', 'L', 'Islam', 'Kalilawang RT.05/03 Garung, Wonosobo', '1784048141_MA\'WAL_ADIB.JPG', '085226428934', 'PPPK', '2026-07-14 16:55:41', '2026-07-14 18:35:18', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Pertama Bidang Studi Fiqih', 7, NULL),
(48, 55, 6, '198812162023211015', '20307095188002', 'Adik Suwito, S.Pd.', 'Wonosobo', '1988-12-16', 'L', 'Islam', 'Selokromo, RT.01/07 Leksono, Wonosobo', '1784119980_adik_suwito.jpeg', '082227759433', 'PPPK', '2026-07-14 16:59:24', '2026-07-15 12:53:00', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Pertama Bidang Studi BK', 7, NULL),
(49, 56, 6, '198801022023211012', '20307095188003', 'Dwi Haryadi, S.Pd.', 'Banjarnegara', '1988-01-02', 'L', 'Islam', 'Dieng Kulon RT.01/01 Batur, Banjarnegara', '1784119946_dwi_haryadi.jpeg', '085803516342', 'PPPK', '2026-07-14 17:10:55', '2026-07-15 12:52:26', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Pertama Bidang Studi Seni Budaya', 7, NULL),
(50, 57, 6, '197809022025211009', '5234756659200003', 'Andy Septiono, S.Pd.', 'Wonosobo', '1978-09-02', 'L', 'Islam', 'Kemiri RT.04/01 Sukorejo, Mojotengah, Wonosobo', '1784049347_ANDY_SEPTIONO.JPG', '082243359225', 'GTT', '2026-07-14 17:15:47', '2026-07-14 18:33:54', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Pertama', 7, NULL),
(51, 58, 6, '196705262025211003', '20307095167001', 'Mahfudz, S.Ag.', 'Wonosobo', '1967-05-26', 'L', 'Islam', 'Mekarsari, RT.06/13 Kalibeber, Mojotengah, Wonosobo', '1784119920_mahfudz.jpeg', '081327734660', 'PNS', '2026-07-14 17:18:23', '2026-07-15 12:52:00', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Pertama', 7, NULL),
(52, 59, 6, '199201222025211009', '20307095192001', 'Taat Rifani, S.Pd.I.', 'Wonosobo', '1992-01-22', 'L', 'Islam', 'Kalitulang RT.20/05 Gondang, Watumalang, Wonosobo', '1784049712_TAAT_RIFANI.JPG', '085727873880', 'GTT', '2026-07-14 17:21:52', '2026-07-14 18:32:39', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Pertama', 7, NULL),
(53, 60, 6, '199503272025211011', '20307095195002', 'Moh. Akmal Hikmawan, S.Pd.', 'Wonosobo', '1995-03-27', 'L', 'Islam', 'Munggang Bawah RT.02/11 Kalibeber, Mojotengah, Wonosobo', '1784119901_moh._akmal.jpeg', '087729731399', 'GTT', '2026-07-14 17:30:30', '2026-07-15 12:51:41', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Pertama', 7, NULL),
(54, 61, 6, '199411162025212016', '20307095194002', 'Nur Muftikhatul Khasanah, S.Pd.', 'Wonosobo', '1994-11-16', 'P', 'Islam', 'Pasunten RT.03/03 Lipursari, Leksono, Wonosobo', '1784119881_nur_muftikhatul.jpeg', '085728928119', 'GTT', '2026-07-14 17:34:36', '2026-07-15 12:51:21', 'sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Pertama', 7, NULL),
(55, 62, 4, '198303172025211018', '9649761663200002', 'Ahmad Fuat', 'Wonosobo', '1983-03-17', 'L', 'Islam', 'Krasak, Mojotengah, Wonosobo', '1784050777_AHMAD_FUAD.JPG', '082138260221', 'GTT', '2026-07-14 17:39:37', '2026-07-14 18:30:57', 'belum_sertifikasi', NULL, NULL, NULL, NULL, '-', 7, 'Pengadministrasi Perkantoran (Jabatan Pelaksana pada urusan TU)'),
(56, 63, 4, '198308182025212013', '2150761664300003', 'Ida Kurniawati', 'Wonosobo', '1983-08-18', 'P', 'Islam', 'Jawar RT.01/01 Mojotengah, Wonosobo', '1784051080_IDA_KURNIAWATI.JPG', '08532997534', 'GTT', '2026-07-14 17:44:40', '2026-07-14 18:30:11', 'belum_sertifikasi', NULL, NULL, NULL, NULL, '-', 7, 'Pengadministrasi Perkantoran (Jabatan Pelaksana pada urusan TU)'),
(57, 64, 6, '199103042024211019', '20307095191001', 'Ngabidin, S.Pd.', 'Wonosobo', '1991-03-04', 'L', 'Islam', 'Villa Akatara C.17 RT.01/07 Andongsili, Mojotengah, Wonosobo', '1784051740_NGABIDIN.JPG', '085727268121', 'PPPK', '2026-07-14 17:55:40', '2026-07-14 18:29:35', 'sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Pertama Bidang Studi Matematika', 7, NULL),
(58, 65, 6, '198310052024212022', '3334761663210113', 'Siti Badri Hasanah, S.Pd.', 'Wonosobo', '1983-10-05', 'P', 'Islam', 'Blawong RT.04/03 Ngalian, Wadaslintang, Wonosobo', '1784119831_siti_badri_hasanah.jpeg', '089510809990', 'PPPK', '2026-07-14 18:00:58', '2026-07-15 12:50:31', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Pertama Bidang Studi BK', 7, NULL),
(59, 66, 6, '199005262023211006', '20307083190002', 'Burhan, Lc', 'Wonosobo', '1990-05-26', 'L', 'Islam', 'Pangempon Kidul RT.02/02 Sumberdalem, Kertek, Wonosobo', '1784119810_burhan.jpeg', '082324788342', 'PPPK', '2026-07-14 18:11:32', '2026-07-15 12:50:10', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Pertama Bidang Studi Ilmu Tafsir', 7, NULL),
(60, 67, 6, '197905312007012022', '8863757659200022', 'Bartono, S,Pd.Ing.', 'Banjarnegara', '1979-05-31', 'L', 'Islam', 'Bandingan RT.01/07 Sigaluh, Banjarnegara', '1784053233_BARTONO.JPG', '085291233341', 'PNS', '2026-07-14 18:20:33', '2026-07-14 18:28:23', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Muda Bidang Studi  Bahasa Inggris', 7, NULL),
(61, 68, 6, '199310232019031010', '20307095193004', 'Hangga Kusuma, S.Si.', 'Kudus', '1993-10-23', 'L', 'Islam', 'Jati Wetan RT.07/02 Jati, Kudus', '1784053552_HANGGA_KUSUMA.JPG', '085727131535', 'PNS', '2026-07-14 18:25:52', '2026-07-14 18:28:01', 'belum_sertifikasi', NULL, NULL, NULL, NULL, 'Guru Ahli Pertama Bidang Studi Pendidikan Jasmani', 7, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pensiuns`
--

CREATE TABLE `pensiuns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `tmt_cpns` date DEFAULT NULL,
  `tmt_pangkat` date DEFAULT NULL,
  `tmt_golongan` date DEFAULT NULL,
  `golongan` varchar(225) DEFAULT NULL,
  `tmt_jabatan` date DEFAULT NULL,
  `tanggal_pensiun` date NOT NULL,
  `jenis_pensiun` enum('Batas Usia','Dini','Janda / Duda','Sakit') DEFAULT NULL,
  `masa_kerja` varchar(50) NOT NULL,
  `total_tunjangan` double NOT NULL DEFAULT 0,
  `status_pembayaran` enum('pending','proses','selesai') NOT NULL DEFAULT 'pending',
  `berkas` text DEFAULT NULL,
  `status` enum('Belum Verifikasi','Sudah Verifikasi') DEFAULT NULL,
  `keterangan_berkas` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pensiuns`
--

INSERT INTO `pensiuns` (`id`, `id_user`, `tmt_cpns`, `tmt_pangkat`, `tmt_golongan`, `golongan`, `tmt_jabatan`, `tanggal_pensiun`, `jenis_pensiun`, `masa_kerja`, `total_tunjangan`, `status_pembayaran`, `berkas`, `status`, `keterangan_berkas`, `created_at`, `updated_at`) VALUES
(8, 20, '1989-12-01', '2022-04-01', '2022-04-01', 'Pembina Tingkat I, IV/b', '2022-04-01', '2060-03-14', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-06-30 13:31:20', '2026-07-15 05:01:01'),
(9, 19, '1993-03-01', '2019-10-01', '2019-10-01', 'Pembina Tingkat I, IV/b', '2024-07-01', '2027-07-08', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:02:47', '2026-07-15 05:02:47'),
(10, 21, '1989-03-01', '2022-04-01', '2022-04-01', 'Pembina Tingkat I, IV/b', '2022-04-01', '2026-03-30', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:04:00', '2026-07-15 05:04:00'),
(11, 22, '1993-03-01', '2022-04-01', '2022-04-01', 'Pembina Tingkat I, IV/b', '2022-04-01', '2056-08-18', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:05:19', '2026-07-15 05:05:19'),
(12, 23, '1993-03-01', '2022-04-01', '2022-04-01', 'Pembina Tingkat I, IV/b', '2022-04-01', '2028-08-25', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:06:19', '2026-07-15 05:06:19'),
(13, 24, '1994-03-01', '2022-04-01', '2022-04-01', 'Pembina Tingkat I, IV/b', '2022-04-01', '2025-09-13', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:07:45', '2026-07-15 05:07:45'),
(14, 25, '1998-03-01', '2023-10-01', '2023-10-01', 'Pembina Tingkat I, IV/b', '2008-10-01', '2031-09-09', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:10:05', '2026-07-15 05:10:05'),
(15, 26, '2003-12-01', '2023-10-01', '2023-10-01', 'Pembina Tingkat I, IV/b', '2014-04-01', '2037-01-21', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:13:41', '2026-07-15 05:13:41'),
(16, 27, '2005-01-01', '2023-10-01', '2023-10-01', 'Pembina Tingkat I, IV/b', '2014-04-01', '2031-09-15', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:14:34', '2026-07-15 05:14:34'),
(17, 28, '2005-01-01', '2023-10-01', '2023-10-01', 'Pembina Tingkat I, IV/b', '2014-04-01', '2042-06-20', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:15:35', '2026-07-15 05:15:35'),
(18, 29, '2005-01-01', '2024-06-01', '2024-06-01', 'Pembina Tingkat I, IV/b', '2022-04-01', '2028-03-17', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:16:21', '2026-07-15 05:16:21'),
(19, 30, '2000-03-01', '2024-06-01', '2024-06-01', 'Pembina Tingkat I, IV/b', '2021-09-01', '2033-01-23', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:16:59', '2026-07-15 05:16:59'),
(20, 31, '2005-01-01', '2024-06-01', '2024-06-01', 'Pembina Tingkat I, IV/b', '2022-04-01', '2030-12-06', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:17:36', '2026-07-15 05:17:36'),
(21, 32, '2005-01-01', '2024-06-01', '2024-06-01', 'Pembina Tingkat I, IV/b', '2021-09-01', '2035-02-23', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:18:18', '2026-07-15 05:18:18'),
(22, 33, '2003-12-01', '2022-04-01', '2022-04-01', 'PEMBINA, IV/A', '2022-04-01', '2030-06-20', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:19:28', '2026-07-15 05:19:28'),
(23, 34, '2005-01-01', '2021-10-01', '2021-10-01', 'PEMBINA, IV/A', '2021-10-01', '2032-06-17', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:20:04', '2026-07-15 05:20:04'),
(24, 35, '2005-01-01', '2021-10-01', '2021-10-01', 'PEMBINA, IV/A', '2021-10-01', '2040-12-29', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:20:41', '2026-07-15 05:20:41'),
(25, 36, '2006-04-01', '2021-10-01', '2021-10-01', 'PEMBINA, IV/A', '2021-09-01', '2034-06-24', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:21:23', '2026-07-15 05:21:23'),
(26, 37, '2005-01-01', '2021-10-01', '2021-10-01', 'PEMBINA, IV/A', '2021-09-01', '2036-03-08', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:23:23', '2026-07-15 05:23:23'),
(27, 38, '2005-01-01', '2022-04-01', '2022-04-01', 'PEMBINA, IV/A', '2022-03-01', '2040-07-31', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:24:00', '2026-07-15 05:24:00'),
(28, 39, '2006-04-01', '2021-10-01', '2021-10-01', 'PEMBINA, IV/A', '2021-09-01', '2039-09-02', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:25:17', '2026-07-15 05:25:17'),
(29, 40, '2007-01-01', '2022-04-01', '2022-04-01', 'PENATA TK I, III/D', '2022-04-01', '2036-03-28', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:27:57', '2026-07-15 05:33:35'),
(30, 41, '2007-10-01', '2022-04-01', '2022-04-01', 'PENATA TK I, III/D', '2022-04-01', '2035-07-23', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:29:50', '2026-07-15 05:33:23'),
(31, 42, '2007-10-01', '2021-10-01', '2021-10-01', 'PENATA TK I, III/D', '2021-10-01', '2041-06-04', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:30:26', '2026-07-15 05:33:10'),
(32, 43, '2007-10-01', '2021-10-01', '2021-10-01', 'PENATA TK I, III/D', '2022-10-01', '2042-01-10', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:31:18', '2026-07-15 05:32:55'),
(33, 44, '2007-10-01', '2022-04-01', '2021-10-01', 'PENATA TK I, III/D', '2022-04-01', '2040-01-16', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:32:24', '2026-07-15 05:32:24'),
(34, 45, '2007-10-01', '2021-10-01', '2021-10-01', 'PENATA TK I, III/D', '2021-09-01', '2031-11-06', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:34:42', '2026-07-15 05:34:42'),
(35, 46, '2007-10-01', '2021-10-01', '2021-10-01', 'PENATA TK I, III/D', '2021-10-01', '2040-02-08', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:35:24', '2026-07-15 05:35:24'),
(36, 47, '2009-12-01', '2024-06-01', '2021-10-01', 'PENATA TK I, III/D', '2021-04-01', '2043-05-30', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:36:23', '2026-07-15 05:36:23'),
(37, 48, '2007-01-01', '2024-06-01', '2021-10-01', 'PENATA TK I, III/D', '2021-10-01', '2029-05-22', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:37:26', '2026-07-15 05:37:26'),
(38, 49, '2007-01-01', '2024-06-01', '2021-10-01', 'PENATA TK I, III/D', '2021-10-01', '2034-09-14', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:37:54', '2026-07-15 05:37:54'),
(39, 50, '2007-01-01', '2024-06-01', '2021-10-01', 'PENATA TK I, III/D', '2022-04-01', '2030-09-04', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:38:29', '2026-07-15 05:38:29'),
(40, 51, '2007-01-01', '2024-06-01', '2021-10-01', 'PENATA TK I, III/D', '2022-04-01', '2030-03-04', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 05:39:13', '2026-07-15 05:39:13'),
(41, 52, '2023-08-01', '2023-08-01', '2023-08-01', 'IX', '2023-08-01', '2042-10-23', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:29:09', '2026-07-15 06:29:09'),
(42, 53, '2024-02-01', '2023-08-01', '2023-08-01', 'IX', '2024-02-01', '2034-09-14', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:30:22', '2026-07-15 06:30:22'),
(43, 54, '2024-02-01', '2023-08-01', '2023-08-01', 'IX', '2024-02-01', '2040-08-27', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:31:19', '2026-07-15 06:31:19'),
(44, 55, '2023-08-01', '2023-08-01', '2023-08-01', 'IX', '2023-08-01', '2048-12-16', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:32:04', '2026-07-15 06:32:04'),
(45, 56, '2023-08-01', '2023-08-01', '2023-08-01', 'IX', '2023-08-01', '2048-01-02', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:32:42', '2026-07-15 06:32:42'),
(46, 57, '2025-03-01', '2025-03-01', '2023-08-01', 'IX', '2025-03-01', '2038-09-02', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:34:46', '2026-07-15 06:34:46'),
(47, 58, '2025-03-01', '2025-03-01', '2023-08-01', 'IX', '2025-03-01', '2027-05-26', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:35:31', '2026-07-15 06:35:31'),
(48, 59, '2025-03-01', '2025-03-01', '2023-08-01', 'IX', '2025-03-01', '2052-01-22', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:36:02', '2026-07-15 06:36:02'),
(49, 60, '2025-03-01', '2025-03-01', '2023-08-01', 'IX', '2025-03-01', '2055-03-27', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:37:23', '2026-07-15 06:37:23'),
(50, 61, '2025-03-01', '2025-03-01', '2023-08-01', 'IX', '2025-03-01', '2054-11-16', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:38:05', '2026-07-15 06:38:05'),
(51, 62, '2025-03-01', '2025-03-01', '2025-03-01', 'V', '2025-03-01', '2043-03-17', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:39:09', '2026-07-15 06:39:09'),
(52, 63, '2025-03-01', '2025-03-01', '2025-03-01', 'V', '2025-03-01', '2043-08-18', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:39:38', '2026-07-15 06:39:38'),
(53, 64, '2024-11-01', '2024-03-01', '2024-03-01', 'IV', '2024-11-01', '2051-03-04', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:40:35', '2026-07-15 06:40:35'),
(54, 65, '2024-11-01', '2024-03-01', '2024-03-01', 'IV', '2024-11-01', '2043-10-05', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:41:07', '2026-07-15 06:41:07'),
(55, 66, '2024-02-01', '2023-08-01', '2024-03-01', 'IV', '2024-02-01', '2050-05-26', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:42:01', '2026-07-15 06:42:01'),
(56, 67, '2007-10-01', '2024-06-01', '2022-04-01', 'PENATA TK I, III/D', '2021-10-01', '2039-05-31', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:44:21', '2026-07-15 06:44:21'),
(57, 68, '2019-03-01', '2024-08-01', '2024-08-01', 'PENATA MUDA TK I/III D', '2023-07-01', '2053-10-23', 'Batas Usia', '60', 0, 'pending', NULL, NULL, NULL, '2026-07-15 06:45:38', '2026-07-15 06:45:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pendidikans`
--

CREATE TABLE `riwayat_pendidikans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `jenjang` varchar(50) NOT NULL,
  `nama_institusi` varchar(150) NOT NULL,
  `gelar` varchar(50) DEFAULT NULL,
  `id_pelatihan` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_pelatihan` varchar(150) DEFAULT NULL,
  `tahun_lulus` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayat_pendidikans`
--

INSERT INTO `riwayat_pendidikans` (`id`, `id_user`, `jenjang`, `nama_institusi`, `gelar`, `id_pelatihan`, `nama_pelatihan`, `tahun_lulus`, `created_at`, `updated_at`) VALUES
(6, 20, 'S1/Sarjana', 'Universitas Islam Indonesia Yogyakarta', 'Dra', NULL, '-', 1992, '2026-06-13 15:53:20', '2026-07-15 13:13:11'),
(7, 19, 'S2/Magister', 'UNIVERSITAS SAINS AL-QURAN', 'M.Pd.', NULL, '-', 2021, '2026-06-13 17:14:16', '2026-07-15 13:09:52'),
(8, 24, 'S1/Sarjana', 'IKIP Semarang', 'Dra', NULL, '-', 1990, '2026-07-15 00:46:50', '2026-07-15 13:09:29'),
(9, 21, 'S1/Sarjana', 'IKIP Semarang', 'S.Pd.', NULL, '-', 2008, '2026-07-15 00:47:31', '2026-07-15 13:08:25'),
(10, 22, 'S1/Sarjana', 'IKIP Semarang', 'S.Pd.', NULL, '-', 2002, '2026-07-15 00:48:23', '2026-07-15 13:08:04'),
(11, 23, 'S1/Sarjana', 'Universitas Muhammadiyah Purworejo', 'S.Pd.', NULL, 'Diklat Penjenjangan Lain-lain', 2008, '2026-07-15 00:49:26', '2026-07-15 13:06:43'),
(12, 25, 'S1/Sarjana', 'Universitas Muhammadiyah Surakarta', 'S.Pd.', NULL, '-', 1996, '2026-07-15 00:50:00', '2026-07-15 13:06:24'),
(13, 26, 'S2/Magister', 'IAIN Walisongo', 'S.Ag., M.S.I', NULL, '-', 2007, '2026-07-15 00:50:40', '2026-07-15 13:07:41'),
(14, 27, 'S1/Sarjana', 'IKIP Semarang', 'S.Pd.', NULL, '-', 1997, '2026-07-15 00:52:15', '2026-07-15 13:06:05'),
(15, 28, 'S1/Sarjana', 'IKIP Semarang', 'S.Pd.', NULL, 'Prajabatan', 2004, '2026-07-15 00:52:44', '2026-07-15 13:05:33'),
(16, 29, 'S1/Sarjana', 'Universitas Sebelas Maret', 'S.Pd.', NULL, '-', 1993, '2026-07-15 00:53:40', '2026-07-15 13:01:34'),
(17, 30, 'S2/Magister', 'IAIN Semarang', 'S.Ag., M.S.I', NULL, 'Penjenjangan Lain-lain', 2011, '2026-07-15 00:54:21', '2026-07-15 13:02:03'),
(18, 31, 'S1/Sarjana', 'IIQ Jawa Tengah', 'S.Ag., M.S.I', NULL, '-', 2009, '2026-07-15 00:54:52', '2026-07-15 13:02:29'),
(19, 32, 'S1/Sarjana', 'Universitas Terbuka', 'S.E., M.M', NULL, '-', 1999, '2026-07-15 00:55:19', '2026-07-15 13:02:56'),
(20, 33, 'S1/Sarjana', 'IKIP Yogyakarta', 'S.Pd.', NULL, '-', 1994, '2026-07-15 00:55:55', '2026-07-15 13:04:02'),
(21, 34, 'S1/Sarjana', 'IAIN Sunan Kalijaga', 'S.Ag', NULL, '-', 1998, '2026-07-15 00:56:37', '2026-07-15 13:04:20'),
(22, 35, 'S1/Sarjana', 'IKIP Semarang', 'S.Pd.', NULL, '-', 2004, '2026-07-15 00:56:58', '2026-07-15 13:04:48'),
(23, 36, 'S1/Sarjana', 'IKIP Semarang', 'S.Pd.', NULL, '-', 1997, '2026-07-15 00:57:21', '2026-07-15 13:00:58'),
(24, 37, 'S2/Magister', 'Universitas Muhammadiyah Prof Dr Hamka', 'S.Pd.,M.Pd.', NULL, 'Prajabatan', 2016, '2026-07-15 00:58:10', '2026-07-15 13:00:20'),
(25, 38, 'S1/Sarjana', 'IKIP Semarang', 'S.Pd.', NULL, '-', 2004, '2026-07-15 01:02:25', '2026-07-15 01:02:25'),
(26, 39, 'S1/Sarjana', 'Universitas Jendral Sudirman', 'S.Si', NULL, '-', 2002, '2026-07-15 01:03:20', '2026-07-15 01:03:20'),
(27, 40, 'S2/Magister', 'UNIVERSITAS SAINS AL-QURAN', 'S.Ag., M.Pd', NULL, 'Diklat Penjenjangan Lain-lain', 2017, '2026-07-15 01:04:11', '2026-07-15 01:04:11'),
(28, 41, 'S1/Sarjana', 'IAIN Walisongo', 'S.Ag', NULL, '-', 2000, '2026-07-15 01:04:47', '2026-07-15 01:04:47'),
(29, 42, 'S1/Sarjana', 'IKIP Semarang', 'S.Pd', NULL, '-', 2003, '2026-07-15 01:05:17', '2026-07-15 01:05:17'),
(30, 43, 'S1/Sarjana', 'Universitas Sebelas Maret', 'S.Pd', NULL, 'Diklat Penjenjangan Lain-lain', 2003, '2026-07-15 01:06:02', '2026-07-15 01:06:02'),
(31, 44, 'S1/Sarjana', 'Universitas Ahmad Dahlan', 'S.Pd', NULL, '-', 2005, '2026-07-15 01:06:39', '2026-07-15 01:06:39'),
(32, 45, 'S1/Sarjana', 'UVBN', 'S.Pd.', NULL, '-', 2007, '2026-07-15 01:07:17', '2026-07-15 01:07:17'),
(33, 46, 'S2/Magister', 'STIE Widya Iwaha', 'S.Pd.I.', NULL, '-', 2015, '2026-07-15 01:07:54', '2026-07-15 01:08:06'),
(34, 47, 'S2/Magister', 'IKIP Semarang', 'S.Si', NULL, 'Prajabatan', 2017, '2026-07-15 01:08:42', '2026-07-15 01:08:42'),
(35, 48, 'S1/Sarjana', 'ITN Malang', 'S.T.', NULL, '-', 1995, '2026-07-15 01:09:22', '2026-07-15 01:09:22'),
(36, 49, 'S1/Sarjana', 'IAIN Walisongo', 'S.Ag', NULL, '-', 1998, '2026-07-15 01:09:53', '2026-07-15 01:09:53'),
(37, 50, 'S1/Sarjana', 'UNIVERSITAS SAINS AL-QURAN', 'S.Pd.i', NULL, '-', 2006, '2026-07-15 01:10:33', '2026-07-15 01:10:33'),
(38, 51, 'S1/Sarjana', 'IAIN Walisongo', 'S.Ag', NULL, '-', 1996, '2026-07-15 01:11:03', '2026-07-15 01:11:03'),
(39, 52, 'S1/Sarjana', 'IAIN Walisongo', 'M.Pd.', NULL, '-', 2016, '2026-07-15 01:11:47', '2026-07-15 01:11:47'),
(40, 53, 'S1/Sarjana', 'Universitas Jendral Sudirman', 'S.Sos', NULL, '-', 2011, '2026-07-15 01:12:29', '2026-07-15 01:12:29'),
(41, 54, 'S1/Sarjana', 'IAIN Sunan Kalijaga', 'S.H.I', NULL, '-', 2011, '2026-07-15 01:14:24', '2026-07-15 01:14:24'),
(42, 55, 'S1/Sarjana', 'Universitas Ahmad Dahlan', 'S.Pd.', NULL, '-', 2013, '2026-07-15 01:15:16', '2026-07-15 01:15:16'),
(43, 56, 'S1/Sarjana', 'IKIP Semarang', 'S.Pd.', NULL, '-', 2015, '2026-07-15 01:16:51', '2026-07-15 01:16:51'),
(44, 57, 'S1/Sarjana', '-', 'S.Pd.', NULL, '-', NULL, '2026-07-15 01:18:37', '2026-07-15 01:18:37'),
(45, 58, 'S1/Sarjana', '-', 'S.Ag.', NULL, '-', NULL, '2026-07-15 01:19:05', '2026-07-15 01:19:05'),
(46, 59, 'S1/Sarjana', '-', 'S.Pd.I', NULL, '-', NULL, '2026-07-15 01:19:32', '2026-07-15 01:19:32'),
(47, 60, 'S1/Sarjana', '-', 'S.Pd.', NULL, '-', NULL, '2026-07-15 01:20:18', '2026-07-15 01:20:18'),
(48, 61, 'S1/Sarjana', '-', 'S.Pd.', NULL, '-', NULL, '2026-07-15 01:21:36', '2026-07-15 01:21:36'),
(49, 62, 'SLTA/SMA Sederajat', '-', '-', NULL, '-', NULL, '2026-07-15 01:22:27', '2026-07-15 01:22:27'),
(50, 63, 'SLTA/SMA Sederajat', '-', '-', NULL, '-', NULL, '2026-07-15 01:22:55', '2026-07-15 01:22:55'),
(51, 64, 'S1/Sarjana', 'IAIN Walisongo', 'S.Pd.', NULL, '-', 2013, '2026-07-15 01:23:32', '2026-07-15 01:23:32'),
(52, 65, 'DII', 'STAIN Salatiga', 'S.Pd', NULL, '-', 2004, '2026-07-15 01:24:20', '2026-07-15 01:24:20'),
(53, 66, 'S1/Sarjana', 'Universitas Al-Azhar', 'Lc', NULL, '-', 2014, '2026-07-15 01:25:10', '2026-07-15 01:25:10'),
(54, 67, 'S1/Sarjana', 'Universitas Terbuka', 'S.Pd. Ing.', NULL, '-', 2010, '2026-07-15 01:25:51', '2026-07-15 01:25:51'),
(55, 68, 'S2/Magister', 'Universitas Sebelas Maret', 'S.Si.', NULL, '-', 2017, '2026-07-15 01:28:19', '2026-07-15 01:28:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5LMxUHM5Zlk7Jbm9UnvhMoNGeKuMVol6jLVeNs9Z', NULL, '159.65.176.184', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJycGl1N2V5Zm5wTG5QTHd4Y1BuTHVnVURMREhiTzB6MmxCN0pKeVo2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuc2lzdGVta2VwZWdhd2FpYW5tYW4yLm1rZGV2d2ViYXBwcy5teS5pZCIsInJvdXRlIjoiZ2VuZXJhdGVkOjprallhR1hTVXBNWXZrYVZoIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1784187402),
('5yPwXF9RTjgs2MSjG0qzo6SQB3kZvRnQQLU1aPuc', NULL, '159.65.176.184', 'Mozilla/5.0 (X11; Linux x86_64; rv:142.0) Gecko/20100101 Firefox/142.0', 'eyJfdG9rZW4iOiIxa3YyaW12M2Z1RWJzVEYyNkYza2FsQVlwWThMUmtMVWUyRVNkQzJVIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3d3dy5zaXN0ZW1rZXBlZ2F3YWlhbm1hbjIubWtkZXZ3ZWJhcHBzLm15LmlkIiwicm91dGUiOiJnZW5lcmF0ZWQ6OmtqWWFHWFNVcE1ZdmthVmgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1784187400),
('afeVJ77o1WgsxEmznaGRRBHWMEKl12tKTih1HyJF', NULL, '140.213.169.165', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148', 'eyJfdG9rZW4iOiJOeHV5MjBuYk9GUjJFTjJ4M2I4a0g2TWVmZnNtQWx3WUMxdm04U2lQIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9zaXN0ZW1rZXBlZ2F3YWlhbm1hbjIubWtkZXZ3ZWJhcHBzLm15LmlkXC9hZG1pblwvZGFzaGJvYXJkIiwicm91dGUiOiJhZG1pbi5kYXNoYm9hcmQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1784191256),
('CQf9cRYM2WuWSP9teoMkQoWHrGKNxSCGfi4l6QMY', 1, '180.254.30.131', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJMbzI1N0dTSkFKMjRVU0R1VzhUUUxqdzh1TGpUTnJDSnhseVRVWDZMIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cHM6XC9cL3Npc3RlbWtlcGVnYXdhaWFubWFuMi5ta2RldndlYmFwcHMubXkuaWRcL2FkbWluXC9rZWdpYXRhbiIsInJvdXRlIjoiYWRtaW4ua2VnaWF0YW4uaW5kZXgifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsImF1dGgiOnsicGFzc3dvcmRfY29uZmlybWVkX2F0IjoxNzg0MTg5MjgzfX0=', 1784189691),
('Cww1gHxF7vNDCmPdd8JITQLLhJ1AQqfx46nfEyfE', 1, '140.213.139.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJnbXBSWjAzcDZJRlU3Z2JsTGZuYlczY1g4eE5IRk9xV2FrdjJUZHBpIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9zaXN0ZW1rZXBlZ2F3YWlhbm1hbjIubWtkZXZ3ZWJhcHBzLm15LmlkXC9hZG1pblwva2VnaWF0YW4iLCJyb3V0ZSI6ImFkbWluLmtlZ2lhdGFuLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsImF1dGgiOnsicGFzc3dvcmRfY29uZmlybWVkX2F0IjoxNzg0MjI3ODQ0fX0=', 1784227992),
('gpM6H7dD2ZKzf6b76jaEmlOpV0NcpngeGVKMtUjO', 68, '140.213.139.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJwQUduc0tZV1gzYmliWVdKZ3ZDU1VhQzU1SWxJMVBkRjg1SlliaW15IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9zaXN0ZW1rZXBlZ2F3YWlhbm1hbjIubWtkZXZ3ZWJhcHBzLm15LmlkIiwicm91dGUiOiJnZW5lcmF0ZWQ6OncycDNzN01UV1A2dHVnZlIifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6NjgsImF1dGgiOnsicGFzc3dvcmRfY29uZmlybWVkX2F0IjoxNzg0MjI3OTUzfX0=', 1784227953),
('j53I22lxLxIrPoU4rTcjmr7jK2XfCVBlhFBWLNxT', 68, '140.213.139.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJVSGhRT2NaVVJ2SVliaW1QZnNKZVlmOTUwQ0g3YmliaWNPaU0wU2w4IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9zaXN0ZW1rZXBlZ2F3YWlhbm1hbjIubWtkZXZ3ZWJhcHBzLm15LmlkXC9wZWdhd2FpXC9kYXNoYm9hcmQiLCJyb3V0ZSI6InBlZ2F3YWkuZGFzaGJvYXJkIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjY4LCJhdXRoIjp7InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI6MTc4NDIyNzk1M319', 1784228026),
('M2eMSylsd1v5TJDYyT7hjPePNUVy0gdK5YaYR7t3', NULL, '140.213.167.209', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148', 'eyJfdG9rZW4iOiJJRkZzdXhLakxVSjY5dVpGaFFtSDRDTmhDRHBKdWJTb1h6QjkxNHZjIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9zaXN0ZW1rZXBlZ2F3YWlhbm1hbjIubWtkZXZ3ZWJhcHBzLm15LmlkXC9hZG1pblwvZGFzaGJvYXJkIiwicm91dGUiOiJhZG1pbi5kYXNoYm9hcmQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1784191231),
('rlV3vZR9pJX6XT5eTTz8l830jwOxeDDyRvUP0jdE', NULL, '182.2.42.22', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJaMmZjVE9VTDVyY0ZiQ0V4RUFCaGY5UGZCRW1CcnhsTGFKYWVxeFhMIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9zaXN0ZW1rZXBlZ2F3YWlhbm1hbjIubWtkZXZ3ZWJhcHBzLm15LmlkIiwicm91dGUiOiJnZW5lcmF0ZWQ6OmtqWWFHWFNVcE1ZdmthVmgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1784188664),
('RQ22uygZuSJPBMF6M48lyNYqnx03CqiWBmcnTxY2', NULL, '140.213.169.165', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148', 'eyJfdG9rZW4iOiJQZmtyR0JTNU1RZGhBa1hnSmlyZkdhbWNNRk5EOXJmeGluaEcyTU1JIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9zaXN0ZW1rZXBlZ2F3YWlhbm1hbjIubWtkZXZ3ZWJhcHBzLm15LmlkXC9rZXBzZWtcL2Rhc2hib2FyZCIsInJvdXRlIjoia2Vwc2VrLmRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1784191255),
('TUKW7yt5N7SP4pJGTuKZ18xZWf1OAbin6B8fLwxI', NULL, '140.213.169.165', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148', 'eyJfdG9rZW4iOiJyMWlMSjRSRWV0R2x6dDkwU0sxa0drOEJPTGtBUmt4eFhpS1hhVU91IiwiX2ZsYXNoIjp7Im5ldyI6W10sIm9sZCI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cHM6XC9cL3Npc3RlbWtlcGVnYXdhaWFubWFuMi5ta2RldndlYmFwcHMubXkuaWRcL2xvZ2luIiwicm91dGUiOiJsb2dpbiJ9fQ==', 1784191227),
('VJ8M2fCC9lOdPIzaHe16d29tluobtUdmp1gUO6qQ', NULL, '140.213.169.165', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148', 'eyJfdG9rZW4iOiJUTlRUaFpTWDd1aXdxTUtWOHJ3dlM3dmZCSjhMUkV2b2hyajlIYzlGIiwiX2ZsYXNoIjp7Im5ldyI6W10sIm9sZCI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cHM6XC9cL3Npc3RlbWtlcGVnYXdhaWFubWFuMi5ta2RldndlYmFwcHMubXkuaWRcL2xvZ2luIiwicm91dGUiOiJsb2dpbiJ9fQ==', 1784191259),
('Zkr2my88J6Tc1Xy8WsiocCdNtme0QLLKGHhnuVbv', NULL, '140.213.167.209', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148', 'eyJfdG9rZW4iOiJ1Q2U2M3ZOQVhvTzF1THJTQzBCYXFldHhiOWFSNzVSMmRLeXM2bmcxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9zaXN0ZW1rZXBlZ2F3YWlhbm1hbjIubWtkZXZ3ZWJhcHBzLm15LmlkXC9rZXBzZWtcL2Rhc2hib2FyZCIsInJvdXRlIjoia2Vwc2VrLmRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1784191194);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 3 COMMENT '1: Admin, 2: Kepsek, 3: Pegawai',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin MAN 2', 'admin@man.com', NULL, '$2y$12$gnuf7U5uKNUnhVDbKxEldObIWllxYw8MDKw8C0zcpYDX.8vntwsxC', 1, NULL, '2026-06-06 03:04:09', '2026-06-06 03:04:09'),
(3, 'Pegawai MAN 2', 'pegawai@man.com', NULL, '$2y$12$F18dVT1otIrfRYAeFqUYReXpJlKZOIX9g5Zqfk6tx3Ti88tH.sS/2', 3, NULL, '2026-06-06 03:04:10', '2026-06-06 03:04:10'),
(19, 'Drs WARSAM M.Pd', 'warsam@gmail.com', NULL, '$2y$12$Poq1a4U9ulbmARC.xBu9TerS35Jc0kCYlRwQl0VlIs0fxtlTwByNy', 2, NULL, '2026-06-30 13:06:31', '2026-07-14 05:58:01'),
(20, 'Dra. Mu\'tamidah', 'mutamidah@gmail.com', NULL, '$2y$12$sne5qGV2KMgzr15e1U6jJOA6lm4Gir0Jd7WVLy1v.9Gxkf7fRrVay', 3, NULL, '2026-06-30 13:09:08', '2026-07-14 06:03:56'),
(21, 'Tri Maya Atmi Rahayu, S.Pd.', 'trimayaatmirahayu@gmail.com', NULL, '$2y$12$f4ExdodB12/y.HC3h8ta.OmqzjYit4yTDm58GQ2Be0wPwiitnNmre', 3, NULL, '2026-07-14 05:57:18', '2026-07-14 05:57:18'),
(22, 'Titin Sumarni, S.Pd.', 'titinsumarni@gmail.com', NULL, '$2y$12$0eDomlosYvcAcB9Lt2ZV8uyO9rLXO9Kc3G7vX6oSD42Ch3YIHOqO.', 3, NULL, '2026-07-14 06:03:32', '2026-07-14 06:03:32'),
(23, 'Fatah Yasin, S.Pd.', 'fatahyasin@gmail.com', NULL, '$2y$12$SG4qCuD/5UtcB.HPdXvire6Y6XmqvaB3b47jdbbwQisEvxdTAZWc.', 3, NULL, '2026-07-14 06:47:40', '2026-07-14 06:47:40'),
(24, 'Dra. Suprahmiyati', 'suprahmiyati@gmail.com', NULL, '$2y$12$xeHrPrL.qTDLyEX20AVeWOENKK1cPeWs/0Y1hP5GAfjvhRRaBFIvK', 3, NULL, '2026-07-14 06:52:15', '2026-07-14 06:52:15'),
(25, 'Sri Haryati, S.Pd.', 'sriharyati@gmail.com', NULL, '$2y$12$AHpvpG/izh3kCX.DV797W.EmzOq7n.VbPCuIqiUO/Vc0.84wYpopW', 3, NULL, '2026-07-14 06:57:19', '2026-07-14 06:57:19'),
(26, 'Sudiyanto, S.Ag, M.S.I', 'sudiyanto@gmail.com', NULL, '$2y$12$w2WDkzj1R2i05fGs/RLmWuhakkGfmuAnMSokQVMWI6RmW2GEf0pia', 3, NULL, '2026-07-14 07:03:29', '2026-07-14 07:03:29'),
(27, 'Dwi Handajani S.Pd.', 'dwihandajani@gmail.com', NULL, '$2y$12$eZFn76BCsdhsUjt9pMHAI.dm2DgDlu.Gv73RYDp8EzuTQdiozqiAu', 3, NULL, '2026-07-14 07:07:19', '2026-07-14 18:26:48'),
(28, 'Rofingul Khusnu Karim S.Pd.', 'rofingulkhusnukarim@gmail.com', NULL, '$2y$12$QyC7dmqfZ496/zEIIZ8qU.YUoF08Fcrz1RSz4ed6.icNadWs2Toza', 3, NULL, '2026-07-14 07:10:15', '2026-07-14 18:27:29'),
(29, 'Pardi, S.Pd.', 'pardi@gmail.com', NULL, '$2y$12$KALdwqkO6SjlwWa8dbl79.tX4EN5Wl/4Y8FV1PE.dkDNDxCa9jk.W', 3, NULL, '2026-07-14 07:13:14', '2026-07-14 07:13:14'),
(30, 'Yusuf Hardiyono, S.Ag., M.S.I', 'yusufhardiyono@gmail.com', NULL, '$2y$12$E5lxPjosSho.5XM7BlnFjOLfqbJ7MdJ1ii7aWIwcsFmV2A6r5xM4a', 3, NULL, '2026-07-14 07:25:17', '2026-07-14 18:46:38'),
(31, 'Nur Azizah Perawati, S.Ag., M.S.I.', 'nurazizahperawati@gmail.com', NULL, '$2y$12$TIbSF6TArBgFYN..Q/WJDejyV8ImcW4vLdK02g44OD2iyQS7wkLSS', 3, NULL, '2026-07-14 08:15:48', '2026-07-14 18:46:10'),
(32, 'Ratna Nurul Fauziah, S.E., M.M', 'ratnanurulfauziah@gmail.com', NULL, '$2y$12$e9PB.JL9XTn5.0/URO2.u.St8YN5B.0XxcnFJWb/swKs/EMwQOnCu', 3, NULL, '2026-07-14 08:18:09', '2026-07-14 18:47:05'),
(33, 'Nur Eka Retnaningsih, S.Pd.', 'nurekaretnaningsih@gmail.com', NULL, '$2y$12$olfgtiiTKXRifE4WzRsyF.Fsj97b3ZfnF.Y9M.CDgVHHZnAucWqhy', 3, NULL, '2026-07-14 08:21:00', '2026-07-14 18:45:45'),
(34, 'Hanief Nur Widhianti, S.Ag', 'haniefnurwidhianti@gmail.com', NULL, '$2y$12$18BLJCZlnJbmcm7IJ7a.uu7K6kuCz9TR39X.7eKFLmysi3K3XmOP2', 3, NULL, '2026-07-14 08:23:48', '2026-07-14 18:45:19'),
(35, 'Palupi Sulistyorini, S.Pd.', 'palupisulistyorini@gmail.com', NULL, '$2y$12$oX.3ZXultoQMYmNLjOeoSeso430edym7Wbg5LaIq6U.0FWu47gRrK', 3, NULL, '2026-07-14 08:26:26', '2026-07-14 18:44:50'),
(36, 'Laeli Nugraheni Herawati, S.Pd.', 'laelinugraheniherawati@gmail.com', NULL, '$2y$12$mCf6H/GCbZbHjpvUvmeLMuRembYOM0phRlOkc8LfT8ikdPs1/Z/sO', 3, NULL, '2026-07-14 08:29:35', '2026-07-14 18:44:21'),
(37, 'Alifiyah Hidayatun, S.Pd.,M.Pd.', 'alifiyahhidayatun@gmail.com', NULL, '$2y$12$aKVXsCpACQY7Q/Y84YAv6eZX0wihb4dx5OUw5wzLCT.kKSDeFjNQa', 3, NULL, '2026-07-14 08:36:49', '2026-07-14 18:43:50'),
(38, 'Setiyo, S.Pd.', 'setiyo@gmail.com', NULL, '$2y$12$x906Xh.JpZLtrd8B38xh7ekIP5W4IcU9oeHPqIGADdliCZecDSk3C', 3, NULL, '2026-07-14 08:39:03', '2026-07-14 18:43:20'),
(39, 'Inawati, S.Si', 'inawati@gmail.com', NULL, '$2y$12$kobGUhly7NDZd1cL9KLaF.GhmSyunP1G566t4ZrqOlWkrWuFQbEu6', 3, NULL, '2026-07-14 15:02:51', '2026-07-14 18:42:44'),
(40, 'Adrodin Irawan, S.Ag., M.Pd', 'adrodinirawan@gmail.com', NULL, '$2y$12$WZi9EWnlZLVl31GmY2gYau3pagvUBBHJAiQm8AW9f8FWVKLTOmPra', 3, NULL, '2026-07-14 15:19:26', '2026-07-14 18:42:18'),
(41, 'Turoekhan, S.Ag', 'turoekhan@gmail.com', NULL, '$2y$12$CiqyurO/Z7JYQ0LyLaG79emdG0TEZhieahWeIjpY0qa8FoulCK2G2', 3, NULL, '2026-07-14 15:29:38', '2026-07-14 18:41:49'),
(42, 'Dewi Retnowati, S.Pd', 'dewiretnowati@gmail.com', NULL, '$2y$12$6M8SB2s/IIlhFWB.vlfFGO8OG8IMHjz0jajb8A2JGBl9KuNi1CSKa', 3, NULL, '2026-07-14 15:32:49', '2026-07-14 18:41:14'),
(43, 'Dwiyanti Theresiani, S.Pd', 'dwiyantitheresiani@gmail.com', NULL, '$2y$12$JRNISuHrJxbudbb4FZyFXu2I1W6MYkihEgwqkfrHnWWZemxXh0K4O', 3, NULL, '2026-07-14 15:35:52', '2026-07-14 18:40:39'),
(44, 'Nunung Indriyatmaka, S.Pd', 'nunungindiyatmaka@gmail.com', NULL, '$2y$12$TLmdekBoWqJzdk3/vQx5PewkttHB/xSyjmY0T1Ty03HjZaxWxeWNG', 3, NULL, '2026-07-14 15:42:27', '2026-07-15 12:53:28'),
(45, 'Subandi, S.Pd.', 'subandi@gmail.com', NULL, '$2y$12$pKpcXbUW5ping2vEplJy/e9dTyeGsK5YEhIHehUrrY0MfUpcPYtai', 3, NULL, '2026-07-14 15:45:37', '2026-07-14 18:39:43'),
(46, 'Sibyan Hidayatullah, S.Pd.I.', 'sibyanhidayatullah@gmail.com', NULL, '$2y$12$8M.7d0ysGzRhvvgGVo7.ZOjc7HOG2HsW7YaS85gVVJiNL2AUErzn6', 3, NULL, '2026-07-14 15:48:57', '2026-07-14 18:39:17'),
(47, 'Supadmi, S.Si', 'supadmi@gmail.com', NULL, '$2y$12$I.j.qmlZkbEWyKWafLfL2usfbuKrA3Iptk8U56U8vgLImRoUddAQy', 3, NULL, '2026-07-14 15:52:42', '2026-07-14 18:38:43'),
(48, 'Nur Komariyah, S.T.', 'nurkomariyah@gmail.com', NULL, '$2y$12$x0RHtD4h6fnh2tBR4IfBsOmvivDeLr7MymQ/n3mEBP45xovm3Qn62', 3, NULL, '2026-07-14 15:55:24', '2026-07-14 18:38:15'),
(49, 'Khusna Arifah, S.Ag', 'khusnaarifah@gmail.com', NULL, '$2y$12$seK.WXuo/yTVl9HDxqawBuTBU2LfOSsFSrGsmEIu3YMMY2ZX3Ozou', 3, NULL, '2026-07-14 16:00:26', '2026-07-14 18:37:47'),
(50, 'Muchamad Chabib, S.Pd.I', 'muchamadchabib@gmail.com', NULL, '$2y$12$gu42/tSwlXhbdMGUPYjiE.AVD83ueBkmC2oBxpNqfvpEQXSbfrxg2', 3, NULL, '2026-07-14 16:42:07', '2026-07-14 18:37:14'),
(51, 'Diroyatul Mufidah, S.Ag', 'diroyatulmufidah@gmail.com', NULL, '$2y$12$gHfCRI0LautYyiBcoX/gsO4i9xoB95uB59.43ozc/RMYdU4vw/IMC', 3, NULL, '2026-07-14 16:45:28', '2026-07-14 18:36:44'),
(52, 'M. Taufiq Windaryanto, M.Pd.', 'mtaufiqwindaryanto@gmail.com', NULL, '$2y$12$l/cnHixyQ7KbVPVAIlDfpe6QrQSVQem7S3AQMTuXtVJv33MQaFe7O', 3, NULL, '2026-07-14 16:49:01', '2026-07-14 18:36:19'),
(53, 'Eko Noor Hidayati, S.Sos', 'ekonoorhidayati@gmail.com', NULL, '$2y$12$Nfciyb3pRm4JZfu5.ZwFyut66399C8XT9MTzR/hTnCU96dUBWr1ea', 3, NULL, '2026-07-14 16:51:55', '2026-07-14 18:35:47'),
(54, 'Ma\'waladib, S.H.I.', 'mawaladib@gmail.com', NULL, '$2y$12$7c3NA2VidUIZJ2sIf4J1r.p63BpLlyUy66hNnQAycN6AG.z1UlyN2', 3, NULL, '2026-07-14 16:55:41', '2026-07-14 18:35:18'),
(55, 'Adik Suwito, S.Pd.', 'adiksuwito@gmail.com', NULL, '$2y$12$dTwgCep2S9kz.KnjWAb6xuaEZj71l8CRM.VCJN6AdX0ikCLVKgyNm', 3, NULL, '2026-07-14 16:59:24', '2026-07-15 12:53:00'),
(56, 'Dwi Haryadi, S.Pd.', 'dwiharyadi@gmail.com', NULL, '$2y$12$NZEtxNXSuT6q9mNxpEO41OEB81RFph/6Try4GuoAyt6x32oBSeYUm', 3, NULL, '2026-07-14 17:10:55', '2026-07-15 12:52:26'),
(57, 'Andy Septiono, S.Pd.', 'andyseptiono@gmail.com', NULL, '$2y$12$jvX99L0t7t/MHYjYt7wuouLp/g/QmYNrdGc4RiTMQYvngqJXzbt4S', 3, NULL, '2026-07-14 17:15:47', '2026-07-14 18:33:54'),
(58, 'Mahfudz, S.Ag.', 'mahfudz@gmail.com', NULL, '$2y$12$QV.In3ea2rLz4qeFz5cl5.ImbNME7.4Uiub9RQKftLijSEDJOQKqu', 3, NULL, '2026-07-14 17:18:23', '2026-07-15 12:52:00'),
(59, 'Taat Rifani, S.Pd.I.', 'taatrifani@gmail.com', NULL, '$2y$12$suVPlmc3tmCsmWi3WdJMN.oqMzWDKecbZZIXphNBPx/ZnnjdoGdNO', 3, NULL, '2026-07-14 17:21:52', '2026-07-14 18:32:39'),
(60, 'Moh. Akmal Hikmawan, S.Pd.', 'mohakmalhikmawan@gmail.com', NULL, '$2y$12$RnH/9bQQ7eu2J5Q4RUhuSuY8Yiaz9.UdN0cLtXz/6RvAeCdA4OefC', 3, NULL, '2026-07-14 17:30:30', '2026-07-15 12:51:41'),
(61, 'Nur Muftikhatul Khasanah, S.Pd.', 'nurmuftikhatulkhasanah@gmail.com', NULL, '$2y$12$Gl3nMJO1eQBrdfCCvTutKulcuUvp71N3GhIGb1wPXwDhnSUbBPA5.', 3, NULL, '2026-07-14 17:34:36', '2026-07-15 12:51:21'),
(62, 'Ahmad Fuat', 'ahmadfuat@gmail.com', NULL, '$2y$12$BNmsYExZVt3ahoCE6GcwNeQ4afn2agZr/dPakm0qEhDamKdKZavN.', 3, NULL, '2026-07-14 17:39:37', '2026-07-14 18:30:57'),
(63, 'Ida Kurniawati', 'idakurniawati@gmail.com', NULL, '$2y$12$2wzu5PSM5tIaa3jLxxjhNO6zXZmX9EEyHmKl20oqL/pCb/5i0xBSi', 3, NULL, '2026-07-14 17:44:40', '2026-07-14 18:30:11'),
(64, 'Ngabidin, S.Pd.', 'ngabidin@gmail.com', NULL, '$2y$12$P40a6WwPE9OXQV7xmSw6zOQjY1hrRE3mjUzLujH188iJjFh4dHMte', 3, NULL, '2026-07-14 17:55:40', '2026-07-14 18:29:35'),
(65, 'Siti Badri Hasanah, S.Pd.', 'sitibadrihasanah@gmail.com', NULL, '$2y$12$HHSQ1FgxniD4nAvw3UyI7.eslnAuPb9LA3rHOg9QBDjcPn2UGGR6e', 3, NULL, '2026-07-14 18:00:58', '2026-07-15 12:50:31'),
(66, 'Burhan, Lc', 'burhan@gmail.com', NULL, '$2y$12$X/jFtshC1p4T.PQbh8ru8OoMw047WtvFZ2xB466P753LOzNy19ClW', 3, NULL, '2026-07-14 18:11:32', '2026-07-15 12:50:10'),
(67, 'Bartono, S,Pd.Ing.', 'bartono@gmail.com', NULL, '$2y$12$2/juJz2F/Rp/WVNIfRD/TOrTKOhseDi2v8W4UzTIWjFe.9c4jaaui', 3, NULL, '2026-07-14 18:20:33', '2026-07-14 18:28:23'),
(68, 'Hangga Kusuma, S.Si.', 'hanggakusuma@gmail.com', NULL, '$2y$12$0hEjsz95dOXMpZH6bIJsmOcshHMNetcf/SDti7HUvq0EOLEuKS00u', 3, NULL, '2026-07-14 18:25:52', '2026-07-16 18:52:00');

--
-- Indeks untuk tabel yang dibuang
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
-- Indeks untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatans_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `pensiuns`
--
ALTER TABLE `pensiuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pendidikans`
--
ALTER TABLE `riwayat_pendidikans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD CONSTRAINT `kegiatans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
