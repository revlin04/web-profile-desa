-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2025 at 01:31 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emails` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locations` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `text`, `nama_perusahaan`, `phone`, `emails`, `locations`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Potensi', 'Marengan Daya', '', 'desamarengandaya@gmail.com', 'Jl.Yos Sudarso-Marengan Daya, Sumenep', 'Industri Rumah Tangga Kerupuk Pattola Desa ini dikenal dengan produksi kerupuk pattola, yang menjadi salah satu sumber penghasilan bagi warga setempat.', '20250206040502.jpg', NULL, '2025-02-05 21:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `author`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, '20250205050516.jpg', 'Ali Hafidz Syahbana', 'Kades Marengan Daya Sumenep Akui Proyek Irigasi P3-TGAI 2024 Amburadul', '<p>Pembangunan program <strong>percepatan peningkatan tataguna air irigasi</strong> (P3-TGAI) Tahun Anggaran 2024 yang berlokasi di Desa <a href=\"https://madura.tribunnews.com/tag/marengan\">Marengan</a> Daya, Kecamatan Kota <a href=\"https://madura.tribunnews.com/tag/sumenep\">Sumenep</a> sudah rampung.</p><p>Namun, pekerjaan program dari Kementerian Pekerjaan Umum dan Perumahan Rakyat Direktorat Jenderal Sumber Daya Air Balai Besar Wilayah Sungai Berantas yang dikerjakan oleh P3A Suku Maju tampaknya tak diawasi.</p><p><br>Pantauan <a href=\"https://madura.tribunnews.com/tag/tribunmaduracom\">TribunMadura.com</a> di lokasi, pekerjaan proyek irigasi tersebut &nbsp;dibiarkan amburadul dan tidak akan bertahan lama.</p><p>Tampak jelas fisik dari pembangunan proyek irigasi itu bergelombang dan air dari sawah tergenang tidak mengalir.</p><p>Tidak hanya itu saja, sisa material dari proyek P3-TGAI Tahun 2024 dengan anggaran Rp 195 juta itu dibiarkan tergeletak sembarangan dan mengganggu aktivitas pengendara.</p><p>Dikonfirmasi Kepala Desa (Kades) <a href=\"https://madura.tribunnews.com/tag/marengan\">Marengan</a> Daya Untung Sugiono membenarkan dan mengakuinya jika pekerjaan pembangunan proyek P3-TGAI tersebut amburadul.</p><p>Proyek tersebut lanjutnya, dikerjakan secara swakelola masyarakat setempat yang harus berdekatan dengan lokasi pertanian warga.</p><p>&nbsp;</p><p>\"Iya memang posisinya saluran tersebut tidak berjalan dan coba dicocokkan kok tetap tidak rata. Tidak lurus,\" kata Untung Sugioni mengakuinya pada Rabu (22/1/2025).</p><p>Terkait sisa materila berupa tumpukan batu yang dibiarkan tergeletak sembarangan dan mengancam keselematan pengendara lanjutnya, pihaknya sudah menyampaikan pada yang mengerjakan agar segera dipindah.</p><p>\"Saya sudah sampaikan pada yang mengerjakan supaya segera dipindah ke tempat lain,\" terangnya.</p><p><br><br>&nbsp;</p>', '2025-01-22 06:04:57', '2025-02-04 22:05:16'),
(2, '20250205050841.jpg', 'Nuri Handayatika', 'Pasar Marengan Tetap Ramai Ditengah Gempuran Pasar Modern', '<p>KBRN, Sumenep : Pasar tradisional masih digandrungi oleh sebagian besar masyarakat Indonesia, tidak terkecuali di Kabupaten Sumenep, Madura, Jawa Timur. Selain lebih merakyat, dari sisi harga pasar tradisional lebih terjangkau dibanding pasar modern.</p><p>Tak heran, jika pasar tradisional masih eksis ditengah kepungan pasar modern yang dilengkapi fasilitas yang lebih baik. Salah satunya, Pasar Marengan, Desa Marengan Daya, Kecamatan Kalianget, Sumenep.</p><p>Saat ini, ada empat pasar modern yang jaraknya tidak berjauhan dengan Pasar Marengan. Tapi, pasar tradisional ini tidak kalah bersaing terutama dari sisi pelanggan yang datang. Seperti pasar lainnya, Pasar Marengan menyediakan bahan pokok sehari - hari seperti beras, ikan, sayur bahkan kue - kue tradisional pun ada disini.</p><p>Pasar ini bukan hanya dikunjungi oleh masyarakat sekitar tapi masyarakat di luar Desa Marengan banyak yang berbelanja kebutuhan pokok di pasar ini, seperti ikan laut, kepiting, udang dll yang harganya cenderung lebih murah dan fresh di bandingkan pasar tradisional yang lainnya.</p><p>&nbsp;</p><p>Dan masih seperti pasar - pasar lainnya, pengunjung pasar ini masih dipadati oleh kaum ras terkuat di bumi yaitu emak - emak jarang sekali terlihat generasi Z yang datang ke pasar untuk sekedar melihat atau berbelanja. Gimana kalo kalian suka datang ke pasar gak? Dan biasanya barang apa yang suka di beli? Yuk support pedagang pasar tradisional agar dagangannya tetap eksis di tengah gempuran pasar kekinian.</p>', '2024-06-24 01:48:57', '2025-02-04 22:08:41'),
(3, '20250205050916.jpg', 'Admin', 'BKM \'Estu\' Desa Marengan Daya Berikan Bansos Bagi Warga Miskin dan Lansia', '<p>Media Center, Rabu ( 27/04 ) Badan Keswadayaan Masyarakat (BKM) Estu Desa Marengan Daya Kecamatan Kota Kabupaten Sumenep memberikan Bantuan Sosial (Bansos) bagi warga miskin dan Lanjut Usia (Lansia).</p><p>Perwakilan Koordinator BKM Estu, Agus Salim, berharap melalui bantuan sosial tersebut bisa bermanfaat bagi para penerima. Karenanya pihaknya juga berharap dukungan serta doa agar usaha yang dijalankan BKM Estu berkembang terus, sehingga semakin memberikan manfaat bagi banyak orang khususnya warga yang kurang mampu.&nbsp;</p><p>\"Dengan dukungan serta doa dari bapak ibu sekalian diharapkan kegiatan ini bisa berlangsung tiap tahun dan penerimanya lebih banyak setiap tahunnya,\" ujarnya, Rabu (27/04/2022).</p><p>Menurutnya, jika kegiatan bantuan sosial tersebut diperoleh dari dana alokasi jasa Unit Pengelola Keuangan (UPK) tahun 2020 dan 2021.</p><p>Dijelaskan Agus, jumlah penerima bantuan sosial tersebut sebanyak 35 orang, terdiri dari 30 orang kaum duafa terutama para janda dan 5 orang lainnya merupakan bentuk pemberian penghargaan bagi anggota Kelompok Swadaya Masyarakat (KSM) yang memanfaatkan pinjaman.&nbsp;</p><p>\"Kami berikan sebagai penghargaan bagi anggota KSM yang pembayaran pinjamannya tiap bulan lancar dan ini diambil secara bergiliran,\" terangnya.</p><p>&nbsp;</p><p>Sementara Kepala Desa Marengan Daya, Untung Sugiono, menyampaikan terima kasih kepada para relawan BKM, UPK beserta perangkat lainnya atas upayanya sebagai relawan, sehingga mampu memberikan bantuan kepada warga khususnya yang kurang mampu,\" ungkapnya.&nbsp;</p><p>Karena itu, pihaknya sangat mengapresiasi atas kegiatan tersebut dan berharap ke depan semoga pemanfaat dana bergulir di UPK semakin banyak, sehingga jasa yang dihasilkan juga lebih besar lagi.</p><p>\"Semoga tahun depan bisa menambah lagi penerima bantuan, karena memang masih banyak warga Marengan Daya yang membutuhkan bantuan yang perlu mendapat sentuhan seperti ini,\" tambahnya. ( Ren, Fer )</p>', '2022-04-27 04:11:57', '2025-02-04 22:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint UNSIGNED NOT NULL,
  `header` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `header`, `text`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, '1', 'TP PKK DESA', 'PKK adalah organisasi kemsyarakatan yang bertujuan untuk memberdayakan perempuan.\r\n          PKK mempunyai sejumlah fungsi yang mencakup : Menghimpun, menggerakkan, dan membina potensi masyarakat agar\r\n          terlaksananya program-program pokok PKK, Merencanakan, melaksanakan, memantau, mengevaluasi pelaksanaan 10\r\n          program pokok PKK sesuai dengan kebutuhan masyarakat, Memberikan pembinaan yang meliputi penyuluhan,\r\n          pelatihan, bimbingan teknis dan pendampingan kepada TP PKK.', '20211222162149.png', NULL, NULL),
(2, '2', 'Bumdes & Karang Taruna', 'Karang Taruna didirikan dengan tujuan memberikan pembinaan dan pemberdayaan kepada para\r\n          remaja, misalnya dalam bidang keorganisasian, ekonomi, olahraga, advokasi, keagamaan dan kesenian.\r\n          Badan Usaha Milik Desa (BUMDes) adalah badan usaha yang dimiliki dan dikelola oleh pemerintah desa. BUMDes\r\n          merupakan salah satu program pemerintah untuk meningkatkan kesejahteraan masyarakat desa.\r\n          BUMDes dibentuk untuk mengelola aset, jasa pelayanan, dan usaha lainnya. BUMDes dapat menjadi sumber\r\n          pendapatan asli desa (PAD) dan meningkatkan perekonomian desa', '20220103082526.jpg', NULL, NULL),
(3, '3', 'Lembaga Kesenian', 'Lembaga Kesenian merupakan wadah atau tempat yang bertujuan untuk belajar dan menambah wawasan mereka akan kesenian. Contohnya di desa Marengan Daya terdapat komunitas tong - tong. Musik Tong-Tong adalah salah satu kebudayaan Madura yang mencerminkan karakteristik masyarakat Madura yang sesungguhnya. Musik Tong-Tong tidak hanya memberikan keindahan bunyi, tetapi juga memberikan ajaran leluhur tentang nilai-nilai seni\r\n', '20212345678918.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `image`, `name`, `created_at`, `updated_at`) VALUES
(1, '20250210032727.jpg', 'Posyandu desa adalah pusat kesehatan masyarakat yang berlokasi di desa dan dikelola oleh masyarakat setempat', NULL, '2025-02-09 20:27:27'),
(2, '20250210032304.jpg', 'UMKM adalah usaha atau bisnis yang dilakukan oleh individu atau kelompok menjadikan pondasi sebagai sektor perekonomian masyarakat', NULL, '2025-02-09 20:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `name`, `title`, `created_at`, `updated_at`) VALUES
(1, '20250205040201.jpg', 'Pasar Marengan', 'Pasar', NULL, '2025-02-14 20:37:13'),
(2, '20250205040534.jpg', 'SDN Marengan I', 'Sekolah', NULL, '2025-02-04 21:05:34'),
(3, '20250215032833.jpeg', 'SDN Marengan Daya III', 'Sekolah', NULL, '2025-02-14 20:28:33'),
(4, '20250215033038.jpg', 'TK - Paud Qurrota A\'yun', 'Sekolah', '2025-02-14 20:30:38', '2025-02-14 20:30:38'),
(5, '20250215033305.jpg', 'TK - Paud Kartini', 'Sekolah', '2025-02-14 20:33:05', '2025-02-14 20:33:05'),
(6, '20250215033454.jpg', 'SMPN Negeri 5 Sumenep', 'Sekolah', '2025-02-14 20:34:54', '2025-02-14 20:34:54'),
(8, '20250215033658.jpg', 'Balai Marengan Daya', 'Balai', '2025-02-14 20:36:58', '2025-02-14 20:36:58'),
(9, '20250217013200.jpg', 'Bandara Trunojoyo Sumenep', 'Bandara', '2025-02-16 18:32:00', '2025-02-16 18:32:00'),
(10, '20250217014020.jpg', 'Masjid Al - Aziz', 'Masjid', '2025-02-16 18:40:20', '2025-02-16 18:40:20'),
(11, '20250217015024.jpg', 'Masjid Al - Mukhlisin', 'Masjid', '2025-02-16 18:50:24', '2025-02-16 18:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `title`, `text`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Marengan Daya', 'Desa Marengan Daya, Kec. Kota Sumenep, Kab. Sumenep', '20211219021012.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_12_15_115150_create_sessions_table', 1),
(7, '2021_12_15_135521_create_homes_table', 1),
(8, '2021_12_15_144155_create_blogs_table', 1),
(9, '2021_12_16_031146_create_galleries_table', 1),
(10, '2021_12_18_004437_create_portfolios_table', 1),
(11, '2021_12_18_085954_create_misis_table', 1),
(12, '2021_12_20_062605_create_customers_table', 1),
(13, '2021_12_20_073351_create_abouts_table', 1),
(14, '2021_12_22_161739_create_cards_table', 1),
(15, '2022_01_15_003325_create_videos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `misis`
--

CREATE TABLE `misis` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tentang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `misis`
--

INSERT INTO `misis` (`id`, `image`, `text`, `deskripsi`, `tentang`, `created_at`, `updated_at`) VALUES
(1, '20250210051415.jpg', 'Wilayah', 'Desa Marengan Daya merupakan salah satu desa yang ada di Kecamatan Kota Sumenep Kabupaten Sumenep dengan luas wilayah 108 meter persegi.Sebelah utara berbatasan dengan Parsanga, sebelah selatan berbatasan dengan Desa Marengan Laok, sebelah barat berbatasan dengan Desa Pabian, dan sebelah timur berbatasan dengan Desa Kalimo\'ok.', 'Kode Pos : 69417\r\nProvinsi : Jawa Timur\r\nKabupaten : Sumenep\r\n\r\n', NULL, '2025-02-09 22:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_at` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `image`, `name`, `title`, `created_at`, `update_at`) VALUES
(1, '20250210010922.jpg', 'Sejarah', 'Marengan Daya adalah sebuah desa yang terletak di Kecamatan Kota Sumenep,                   Kabupaten Sumenep, Provinsi Jawa Timur. Secara geografis, sebelum memasuki Desa Marengan daya, desa                   ini berada di wilayah pesisir dan dilintasi oleh Kali Marengan, sebuah sungai yang memiliki peran                   penting dalam sejarah perdagangan di Sumenep.                   Di era kolonial, Kali Marengan menjadi pintu keluar-masuk perdagangan.                    Di sepanjang sungai terdapat kantor-kantor hingga asisten residen (pusat pemerintahan).                    Banyak sekali perahu-perahu besar yang melintas di Kali Marengan.                    Saat ini, Kali Marengan menjadi lebih dangkal dan ukurannya semakin kecil akibat reklamasi sungai.', '28-02-2025', ''),
(2, '20250210011300.jpg', 'Visi & Misi', 'VISI : MELAYANI MASYARAKAT KHUSUSNYA DESA MARENGAN DAYA DENGAN SEBAIK-BAIKNYA\nMISI :\n1. MEMAJUKAN DESA DALAM MISI PEMBANGUNAN\n2. MEMAKMURKAN MASYARAKAT DESA MARENGAN DAYA', '28-02-2025', ''),
(3, '20250210011508.jpg', 'Struktur Organisasi & Tata Pemerintahan Desa Marengan Daya', '1.	Kepala Desa bertugas menyelenggarakan Pemerintahan Desa, melaksanakan pembangunan, pembinaan kemasyarakatan, dan pemberdayaan masyarakat.\n2.	Sekretaris Desa bertugas membantu Kepala Desa dalam bidang administrasi pemerintahan.\n3.	Kepala urusan keuangan memiliki fungsi seperti melaksanakan urusan keuangan seperti pengurusan administrasi keuangan, administrasi sumber- sumber pendapatan dan pengeluaran, verifikasi administrasi keuangan, dan administrasi penghasilan Kepala Desa, Perangkat Desa, BPD, dan lembaga pemerintahan desa lainnya.\n 4. Kepala urusan perencanaan memiliki fungsi mengkoordinasikan urusan perencanaan seperti menyusun rencana anggaran pendapatan dan belanja desa, menginventarisir data-data dalam rangka pembangunan, melakukan monitoring dan evaluasi program, serta penyusunan laporan.\n5.Kepala Urusan Tata Usaha dan Umum pada Dinas Komunikasi dan Informatika (Kominfo) bertugas mengelola administrasi, kepegawaian, keuangan, dan aset untuk mendukung kelancaran operasional dinas', '28-02-2025', ''),
(4, '20212345678928.jpg', 'Profil Kepala Desa', '', '28-02-2025', '');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5z2v5E9EhePXgULAuSog2Si06RBlVJ79wzCzedNg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGhsTlJVR3lsemppZmlONHlmZTRWQzl2cjhWNjhBRVQ1dTZoTTBqYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWxlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740531553),
('a9IUt9xJhWoQ5tvzaH0BGdTSZTmydC9gh0Fy7r4y', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRmxkR0xaQk1FMFg3Q3dFcWhBSEY0eloyRjY5aDNRbVVmeW8xZGUwNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1740661060),
('GPUGTeL8Xgoox9NeVGD9gpUyVsZG5G2zlf2H3bcW', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibFRuQnlkRXdsT3hvbWJCU3g1OFNTOVh0VFRyYzc0ZHhpbERQN3poeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkTDN3N2pvLlpLeHFPNHRUNGVsTlhtZXpOc1kzTHdoOFJLN01TS251blF6OS9TNE1wVTJSVEciO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJEwzdzdqby5aS3hxTzR0VDRlbE5YbWV6TnNZM0x3aDhSSzdNU0tudW5RejkvUzRNcFUyUlRHIjt9', 1740494161);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin@gmail.com', NULL, '$2y$10$L3w7jo.ZKxqO4tT4elNXmezNsY3Lwh8RK7MSKnunQz9/S4MpU2RTG', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-14 07:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint UNSIGNED NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video`, `name`, `title`, `link`, `created_at`, `updated_at`) VALUES
(4, '20250219012533.mp4', 'Bandara Trunojoyo Sumenep', 'Profil Bandara', 'https://youtu.be/uI4F2dVrRlk', '2025-02-18 18:25:33', '2025-02-18 18:25:33'),
(5, '20250219012723.mp4', 'Pelantikan Perangkat Desa Marengan Daya', 'Pelantikan', 'https://youtu.be/2TgCWBWsDDs', '2025-02-18 18:27:23', '2025-02-18 18:27:23'),
(6, '20250219013027.mp4', 'Upacara HUT RI 79 bersama Kosti', 'SDN Marengan Daya I', 'https://youtu.be/DvpNNg9WB2Y', '2025-02-18 18:30:27', '2025-02-18 18:30:27'),
(7, '20250219013400.mp4', 'Karya Bakti Membersihkan Sungai', 'Karya Bakti Bersama Kodim', 'https://youtu.be/tbe8iT2UpRE', '2025-02-18 18:34:00', '2025-02-18 18:34:00'),
(8, '20250219013514.mp4', 'Mengenal Lingkungan Sekolah', 'TK Qurrota A\'yun', 'https://youtu.be/W9KrdQ-Ygqc', '2025-02-18 18:35:14', '2025-02-18 18:35:14'),
(9, '20250219135439.mp4', 'Profil Desa', 'Marengan Daya', 'https://youtu.be/zUTfuJkOjOw?si=IMT_TtHdg2Fltihh', '2025-02-19 06:54:39', '2025-02-19 06:54:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misis`
--
ALTER TABLE `misis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
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
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `misis`
--
ALTER TABLE `misis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
